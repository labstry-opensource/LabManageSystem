<?php

defined('ROOT_DIR') || define('ROOT_DIR', dirname(__FILE__));
defined('DIR') || define('DIR', dirname(__DIR__));
defined('BASE_PATH') || define('BASE_PATH', str_replace(DIR, '', ROOT_DIR));
defined('APP_PATH') || define('APP_PATH', $_SERVER['REQUEST_URI']);

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

function get_campaign_template($language = 'en', $campaign_name = null){
    return dirname(__FILE__ ) . '/page/' . $language. '/'. (!empty($campaign_name) ? $campaign_name : '') . '/index.php';
}

$router->route(BASE_PATH . '/([\w-]+?)', function($path){
    //Add forward slash
    header('Location: '. BASE_PATH .'/' . $path . '/');
    exit;
});

$router->route(BASE_PATH . '/', function ($path) {
    header('Location: '. BASE_PATH .'/en/');
});


/* We originally set up this path by listing all locales available.
 * i.e. (/en|zh-hk|zh-tw....)/
 * BUT MAN, we are lazy. Instead, we use our imploded locale scanning string to create a regex and
 * let it handles the rest.
 */

$router->route(BASE_PATH . "/" . $lang_join . "/", function($language){
    include ROOT_DIR . "/page/{$language}/home.php";
});

$router->route(BASE_PATH . '/(en|zh-hk)/([\w-]+?)/', function ($language, $page){
    if(file_exists(get_campaign_template($language, $page))){
        include get_campaign_template($language, $page);
    }
});


Router::execute(explode('?', $_SERVER['REQUEST_URI'])[0]);

http_response_code(404);

