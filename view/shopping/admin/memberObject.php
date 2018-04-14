<?php

include_once '../../../vendor/autoload.php';

use admin\admining\dbUsers;

$dbConn=new dbUsers();
//$dbConn->userDBConn;


if(isset($_POST["allData"]) && !empty($_POST["allData"])){
    print_r($_POST["allData"]);// |OK
}

