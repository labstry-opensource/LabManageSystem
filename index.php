<?php

defined('ROOT_DIR') || define('ROOT_DIR', dirname(__FILE__));
defined('DIR') || define('DIR', dirname(__DIR__));
defined('BASE_PATH') || define('BASE_PATH', str_replace(DIR, '', ROOT_DIR));
defined('APP_PATH') || define('APP_PATH', $_SERVER['REQUEST_URI']);

include_once dirname(__FILE__) . '/src/Router.php';

$router = new Router();

function get_campaign_template($campaign_name = null){
    return dirname(__FILE__ ) . '/page/' . (!empty($campaign_name) ? $campaign_name : '') . '/index.php';
}


$router->route(BASE_PATH . '/', function () {
    header('Location: '. BASE_PATH .'/en/');
    exit;
});


$router->route(BASE_PATH . '/(en|zh-hk)/([\w-]+?)/', function ($language, $page){
    if(file_exists(get_campaign_template($page))){
        include get_campaign_template($page);
    }
});


Router::execute(explode('?', $_SERVER['REQUEST_URI'])[0]);

http_response_code(404);

