<?php
/*
 * Hooks
 * This php is for adding functions to be shown in specific places (i.e. hooks)
 * All Hooks are put in the global attribute of $_ls_action_arr
 *
 * */

global $_lms_action_arr;
$_lms_action_arr = array();

/*
 * Register functions to be executed
 */

function enqueue_action($action_name, $func_name, $priority = 0, $num_para = 0){
    if(empty($action_name) || empty($func_name)) return false;
    global $_lms_action_arr;
    $_lms_action_arr[$action_name][$priority] = array(
        'name' => $func_name, 'num_para' => $num_para,
    );
    ksort($_lms_action_arr[$action_name]);
}

/*
 * Unregister the function.
 * All functions are removed if functions name not given
 */

function dequeue_action($action_name, $func_name = null){
    global $_lms_action_arr;
    if(empty($_lms_action_arr[$action_name])) return false;
    if($func_name === null){
        //Reset the whole action completely
        $_lms_action_arr[$action_name] = null;
    }else{
        foreach($_lms_action_arr[$action_name] as $priority => $item){

        }
        print_r($_lms_action_arr[$action_name]);
    }

    foreach($_lms_action_arr as $key => $item){
        if($func_name === null){
            $_lms_action_arr[] = null;
            ksort($_lms_action_arr[$action_name]);
            return true;
        }
        foreach ($item[$action_name] as $priority => $func) {
            if ($func['name'] === $func_name) {
                $item[$action_name][$priority] = null;
                ksort($_lms_action_arr[$action_name]);
                return true;
            }
        }
    }
    return false;
}

/*
 * Do an action by action hook name.
 * - Call user function by action name. All the action will be called at once.
 *
 */
function perform_action($action_name, ...$args){
    global $_lms_action_arr;
    if(!empty($_lms_action_arr[$action_name])){
        $func_names = $_lms_action_arr[$action_name];
        foreach($func_names as $func){
            call_user_func_array($func['name'], $args);
        }
    }

}