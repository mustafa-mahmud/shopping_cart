<?php

session_start();
error_reporting(E_ALL);

include '../../vendor/autoload.php';

use cart\shopping\dbConnected;
use cart\shopping\editUser;
use admin\admining\dbConnect;
use admin\admining\productClass;

$DB = new dbConnected(); //user....
$obj = new editUser($DB->dbConn); //user...
$DB2 = new dbConnect(); //admin...
$obj2 = new productClass($DB2->adminConn); //admin

if (isset($_POST["login"]) && !empty($_POST["login"])) {//index.php > update last login cell in DB
    $obj->lastLoginUpdate($_POST["login"]);
}
if (isset($_POST["information"]) && !empty($_POST["information"])) {//information.php
    $userShow = $obj->userInfo($_POST["information"]);
    $productShow = $obj->productInfo($_POST["information"]);
    $arr = [$userShow, $productShow];
    print_r(json_encode($arr));
}
if (isset($_POST["general"]) && !empty($_POST["general"])) {//general.php
    $show = $obj->userInfo($_POST["general"]);
    print_r(json_encode($show));
}
if (isset($_POST["active"]) && !empty($_POST["active"])) {//=>indexProduct.php; get 'active' product data from DB and show in 'index.php'
    $obj2->getAllProduct("active");
    print_r($obj2->allActiveData);
}


