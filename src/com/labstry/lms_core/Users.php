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
        return $this->connection->select('lms_users', '*', [
            'id' => $userid
        ]);
    }

    function registerUser($user_arr){
        $validator = new ValidateRegistration();
        $error_code = $validator->validate($user_arr);

        if(!$error_code){
            $this->insert('users', [
               'username' => $user_arr['username'],
               'password' => $user_arr['password'],
            ]);
        }

        return $error_code;
    }

    function hasUsername($username)
    {
        return $this->connection->get('lms_users', '*', [
            'username' => $username
        ]);
    }

    function verifyPassword($username, $password)
    {
        $db_password = $this->connection->select('lms_users', 'password', [
            'username' => $username
        ]);
        return password_verify($password, $db_password);
    }

    function getUserRoles($userid)
    {
        return $this->connection->select('lms_users', 'roles', [
            'id[=]' => $userid,
        ]);
    }

}