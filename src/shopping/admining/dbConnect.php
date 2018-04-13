<?php
namespace admin\admining;

class dbConnect {
    public $adminConn;
    
    public function __construct() {
        $dsn="mysql:host=localhost;dbname=cartadmin";
        $username="root";
        $passwd="";
        $options=array(
            \PDO::ATTR_ERRMODE=>  \PDO::ERRMODE_EXCEPTION,  \PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8",
        );
        
        try {
            $this->adminConn=new \PDO($dsn, $username, $passwd, $options);
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
