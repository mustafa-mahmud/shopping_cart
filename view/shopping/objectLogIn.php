<?php

session_start();
error_reporting(E_ALL);
include_once '../../vendor/autoload.php';

use cart\shopping\dbConnected;
use cart\shopping\classSign;

$object = new dbConnected();
$object2 = new classSign($object->dbConn);
if (isset($_POST) && !empty($_POST)) {
    $object2->selectAll();
    $object2->loginCk($_POST);
    print_r($object2);
}

