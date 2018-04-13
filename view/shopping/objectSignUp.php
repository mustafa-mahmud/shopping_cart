<?php

session_start();
error_reporting(E_ALL);
include '../../vendor/autoload.php';

use cart\shopping\dbConnected;
use cart\shopping\classSign;

$object = new dbConnected();
$object2 = new classSign($object->dbConn);
//processing data of singUp form here............
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $object2->selectAll();
    $object2->confirmId($_POST["id"]);
}
else {
    if (isset($_POST) && !empty($_POST)) {
        $object2->getIp();
        $object2->selectAll();
        $object2->emailCk($_POST);
    }
}