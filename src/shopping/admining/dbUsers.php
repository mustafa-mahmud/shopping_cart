<?php

namespace admin\admining;

class dbUsers {

    public $userDBConn = "";

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=cart";
        $username = "root";
        $passwd = "";
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8",
        );

        try {
            $this->userDBConn = new \PDO($dsn, $username, $passwd, $options);
            echo "success";
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
