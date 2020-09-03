<?php


namespace com\labstry\lms_core;


class ValidateRegistration
{
    public function validate($user_arr){
        $error_code = array();
        if(empty($user_arr)){
            $error_code[] = 'no_data_submitted';
        }

        ($errors = $this->validateUsernameStrength($user_arr['username'])) ?
            $error_code['username'] = $errors : null;

        ($errors = $this->validatePasswordStrength($user_arr['password'])) ?
            $error_code['password'] = $errors : null;

    }

    function validateUsernameStrength($username){
        $error = array();
        if(empty($username)){
            $error[] = 'username_empty';
        }
        else if(strlen($username) < 4){
            $error[] = 'username_too_short';
        }
        return $error;
    }

    function validatePasswordStrength($password){
        $error = array();
        if(empty($password)){
            $error[] = 'password_empty';
        }

        // Roll our own password strength test
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $error[] =  'illegal_password';
        }
        return $error;
    }
}