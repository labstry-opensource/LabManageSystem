<?php


namespace com\labstry\lms_core;

class Users
{
    public $connection;
    public $error;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getUserById($userid){
        return $this->connection->select('*', [
            'id' => $userid
        ]);
    }

    function registerUser($user_arr){
        $validator = new ValidateRegistration();
        $error_code = $validator->validate($user_arr);

        if(!$error_code){
            $this->insert([
               'username' => $user_arr['username'],
               'password' => $user_arr['password'],
            ]);
        }

        return $error_code;
    }

    function hasUsername($username){
        return $this->connection->get('*', [
            'username' => $username
        ]);
    }

    function verifyPassword($username, $password){
        $db_password = $this->connection->select('password', [
            'username' => $username
        ]);
        return password_verify($password, $db_password);
    }

    function getUserRoles($userid){

    }

}