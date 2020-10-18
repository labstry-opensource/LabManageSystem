<?php

include_once dirname(__FILE__) . '/functions.php';
include_once ROOT_DIR . '/src/Router.php';

/*
 * Note that you should have page struct like this so that my router can handle the redirect.
 * /page
 * ----/en
 * --------/intro-item-1
 * --------/intro-2
 * --------/....
 * ----/zh-hk
 * ----/.....
*/

/* We scan all language subdirectories under 'page' and setup our regex.
 * We are doing so to allow it to redirect when new language is created.
*/

$avail_langs = array_map('basename', glob(ROOT_DIR . '/page/*', GLOB_ONLYDIR));


$lang_join = '(' . implode('|', $avail_langs) . ')';

$router = new Router();

function get_campaign_template_dir($language = 'en', $page_name = null){
    return dirname(__FILE__ ) . '/page/' . $language. '/'. (!empty($page_name) ? $page_name : '') . '/index.php';
}

function get_campaign_template($lang, $page_slug_name, $page_slug, $parent_slug){
    //Before we include the file, let's check whether we could get variables from the database

    if(!file_exists(get_campaign_template_dir($lang, $page_slug_name))){
       return false;
    }
    global $connection;
    $pages = new \com\labstry\lms_core\Pages($connection);
    $field = array();
    $content = array();
    if($pages->checkHasPageBySlug($lang, $parent_slug, $page_slug)){
        $page_prop = $pages->getPagePropBySlug($lang, $parent_slug, $page_slug);
        $field = $page_prop['custom_fields'];
        $content = $page_prop['content'];
    }
    include_once get_campaign_template_dir($lang, $page_slug_name);
    die;
}

function get_default_template($page_stack, $page_var){
    $field = $page_var['custom_fields'];
    $content = $page_var['content'];
    include_once dirname(__FILE__) . '/views/page-default.php';
}

$router->route(BASE_PATH . '/', function () {
    global $uri_split;
    header('Location: '. BASE_PATH .'/en/' . (isset($uri_split[1]) ? '?' . $uri_split[1] : null));
});


/* We originally set up this path by listing all locales available.
 * i.e. (/en|zh-hk|zh-tw....)/
 * BUT MAN, we are lazy. Instead, we use our imploded locale scanning string to create a regex and
 * let it handles the rest.
 */

$router->route(BASE_PATH . "/{$lang_join}/", function($language){
    include ROOT_DIR . "/page/{$language}/index.php";
});

$router->route(BASE_PATH . "/{$lang_join}/([\w/-]+?)/", function ($language, $page){
    global $connection;

    $dir_page_arr = explode('/' , $page);
    $page_slug = $dir_page_arr[count($dir_page_arr)-1];
    $page_parent_slug = (count($dir_page_arr) === 1) ? '/' : $dir_page_arr[count($dir_page_arr) - 2];

    if(!get_campaign_template($language, $page, $page_slug, $page_parent_slug )){
        $pages = new \com\labstry\lms_core\Pages($connection);
        if($pages->checkHasPageBySlug($language, $page_parent_slug, $page_slug)){
            $page_arr = $pages->getPagePropBySlug($page_slug);
            get_default_template($page, $page_arr);
            die;
        }
    }
    http_response_code(404);
});

$router->route(BASE_PATH . '/([\w/-]+?)', function($path){
    //Add forward slash
    global $uri_split;
    header('Location: '. BASE_PATH .'/en/' . $path . '/' . (isset($uri_split[1]) ? '?' . $uri_split[1] : null));
    exit;
});

$uri_split = explode('?', $_SERVER['REQUEST_URI']);
Router::execute($uri_split[0]);

//http_response_code(404);

