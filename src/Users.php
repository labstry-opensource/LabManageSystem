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