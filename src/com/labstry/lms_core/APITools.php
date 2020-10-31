<?php


namespace com\labstry\lms_core;


class APITools
{
    public function output($data, $type = 'json')
    {
        switch ($type){
            case 'json':
                header('Content-Type: application/json');
                print_r(json_encode($data));
                exit;
        }

    }

    public function isAPIFileExistsInTheme($theme_name, $file_path_api)
    {
        return file_exists(ROOT_DIR . '/theme/' . $theme_name . '/api' . $file_path_api);
    }

    public function getThemeAPIDirectory($theme_name)
    {
        return ROOT_DIR . '/theme/' . $theme_name . '/api' ;
    }

    public function includeUserAPIFile($theme_name, $file_path)
    {
        include $this->getThemeAPIDirectory($theme_name) . str_replace('\\', '/', $file_path);
        die;
    }

    public function userDefinedAPISwitcher($theme, $path)
    {
        if($this->isAPIFileExistsInTheme($theme, $path)){
            //You get all the variables scoped here. You can't access my variable.
            //Create your own object if you need them.
            $this->includeUserAPIFile($theme, $path);
        }
    }
}