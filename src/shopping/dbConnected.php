<?php

namespace cart\shopping;

class dbConnected {

    public $dbConn;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=cart";
        $username = "root";
        $passwd = "";
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8",
        );
        try {
            $this->dbConn = new \PDO($dsn, $username, $passwd, $options);
        } catch (\PDOException $ex) {
            echo $ex->getCode() . $ex->getMessage();
        }
    }

}
