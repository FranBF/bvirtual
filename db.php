<?php

class DB extends \PDO
{
    public function __construct()
    {
        define('DBHOST', 'localhost');
        define('DBUSER', 'root');
        define('DBPASS', 'linuxlinux');
        define('DBNAME', 'bvirtual');
    }

    function connect()
    {
        try {
            $connection = new \PDO("mysql:host=" . DBHOST . ";port=3306;dbname=" . DBNAME, DBUSER, DBPASS);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}
