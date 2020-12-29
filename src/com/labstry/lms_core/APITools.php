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

    public function outputNoRightsToAccess(){
        $data['error'] = 'You don\'t have sufficient rights. Please login and try again.';
        $this->output($data);
    }

    public function multidimensionArrUnique($arr, $key){
        $temp_array = array();
        $i = 0;
        $key_array = array();
        foreach($arr as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function checkIdentification($accessible_roles){
        global $connection;
        if(empty($_SESSION['id'])){
            $data['data']['error']['id'] = 'Please login before continue.';
            $this->output($data);
        }
        $users = new Users($connection);

        //We put the algorithm inside the Users Class to simplify code understanding
        if(!$users->validateUserRole($_SESSION['id'], $accessible_roles)){
            $data['data']['error']['id'] = 'You don\'t have sufficient rights';
            $this->output($data);
        }

        return true;

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