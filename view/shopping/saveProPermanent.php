<?php

session_start();
error_reporting(E_ALL);
include '../../vendor/autoload.php';

use cart\shopping\classProductAdd;
use cart\shopping\dbConnected;

$obj = new dbConnected();
$obj2 = new classProductAdd($obj->dbConn);

if (isset($_GET) && !empty($_GET)) {//saveProPermanent.js
    $obj2->producAdd($_GET);
}
if (isset($_POST["show"]) && !empty($_POST["show"])) {//product.js + editProduct.js
    $obj2->allProductsShow();
}
if (isset($_POST["proDuct"]) && !empty($_POST["proDuct"])) {//editProduct.js
    $obj2->productUpdate($_POST["proDuct"]);
}
if(isset($_POST["proCk"]) && !empty($_POST["proCk"])){//saveProPermanent.js (ck product saved uniqutity)
    $msg=$obj2->searchProdcuts($_POST["proCk"]);
    if(count($msg)>0){
        echo join(",",$msg);
    }
}
