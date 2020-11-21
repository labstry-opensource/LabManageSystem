<?php


namespace com\labstry\lms_core;

class Users
{
    public $connection;
    public $user_table_name = 'lms_users';
    public $error;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getUserById($userid)
    {
        return $this->connection->get($this->user_table_name, '*',  [
            'id' => $userid
        ]);
    }

    function getUserIDByUsername($username)
    {
        return $this->connection->get($this->user_table_name, 'id', [
            'username' => $username,
        ]);
    }

    function getUserByUsername($username){
        return $this->connection->get('lms_user', '*', [
            'username[=]' => $username
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
        return $this->connection->count( $this->user_table_name, '*', [
            'username' => $username
        ]);
    }

    function verifyPassword($username, $password)
    {
        if(empty($username)) return false;
        $db_password = $this->connection->get( $this->user_table_name, 'password', [
            'username' => $username
        ]);
        return password_verify($password, $db_password);
    }

    function getUserRoles($userid)
    {
        return $this->connection->select('lms_user', 'roles', [
            'id[=]' => $userid,
        ]);
    }

}