<?php


namespace com\labstry\lms_core;

include_once ROOT_DIR . '/vendor/meedo/Meedo.php';
use Medoo\Medoo;


class Connection
{
    public $username;
    private $password;
    public $database_name;
    public $domain_name;
    public $connection;
    public $db_type;

    public function __construct($username, $password, $database_name, $domain_name, $type = 'mysql')
    {

        $this->username = $username;
        $this->password = $password;
        $this->database_name = $database_name;
        $this->domain_name = $domain_name;
        $this->db_type = $type;

    }

    public function connect(){
        $this->connection = new Medoo([
            'database_type' => $this->db_type,
            'database_name' => $this->database_name,
            'server' => $this->domain_name,
            'username' => $this->username,
            'password' => $this->password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
        ]);

        return $this->connection;
    }


}