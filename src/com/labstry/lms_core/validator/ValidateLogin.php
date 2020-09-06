<?php


namespace com\labstry\lms_core\validator;

use com\labstry\lms_core;

class ValidateLogin
{
    public $connection;
    private $login_credentials;
    public function __construct($connection, $login_credentials)
    {
        $this->connection = $connection;
        $this->login_credentials = $login_credentials;
    }

    public function validateEmptyUsername(){
        return (empty($this->login_credentials['username']));
    }

    public function validateEmptyPassword(){
        return (empty($this->login_credentials['password']));
    }

    public function validateUsername(){
        $users = new lms_core\Users($this->connection);
        return ($users->hasUsername($this->login_credentials['username']));
    }

}