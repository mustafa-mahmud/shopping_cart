<?php

error_reporting(E_ALL);
include '../../../vendor/autoload.php';

use admin\admining\dbConnect;
use admin\admining\productClass;

$dbAdmin = new dbConnect(); //DB connection
$proClass = new productClass($dbAdmin->adminConn); //product insert
// =========== productAdd.js ===========
//=>productAdd.js; product name ck with DB
if (isset($_POST["proName"]) && !empty($_POST["proName"])) {
    $patt = "/^([\w\s])+$/";
    if (preg_match($patt, trim($_POST["proName"]))) {
        $proClass->productCk($_POST["proName"]);
    }
    else {
        echo "Only support a-z & 0-9";
    }
}
//=>productAdd.js; all input filed data from 'productAdd.php' send to DB for insert
if (isset($_FILES["saveImg"]) && !empty($_FILES["saveImg"])) {//ok , see Desktop productAdd.png
    $proClass->productInsert(array_merge($_POST, $_FILES));
}
//=>shopping/js/sliderLi.js; for all admin add data for slider multiple li
if (isset($_POST["sliderLi"]) && !empty($_POST["sliderLi"])) {
    $proClass->getAllProduct($_POST["sliderLi"]);
    print_r(json_encode($proClass->allActiveData));
}
//=>admin/js/productAdd.js; 'today add' and 'today dollars' information
if (isset($_POST["today"]) && !empty($_POST["today"])) {
    $today = date("Y-m-d");
    $len = 0;
    $dollars = 0;
    $arr = array();
    $proClass->getAllProduct($_POST["today"]);
    $allData = $proClass->allData;
    for ($i = 0; $i < count($allData); $i++) {
        if ($today === explode(" ", $allData[$i]["created"])[0]) {
            $len += 1;
            $dollars += $allData[$i]["price"];
        }
    }
    $todayInfo = [$len, $dollars];
    print_r(json_encode($todayInfo));
}

//================== productEdit.js ================
//=>admin/js/productEdit.js; product name ck;
if (isset($_POST["proNameEdit"]) && !isset($_POST["key"])) {
    $proClass->productCk($_POST["proNameEdit"]);
}

//=>admin/js/productEdit.js; get all DB product data for display;
if (isset($_POST["give"]) && !empty($_POST["give"])) {
    $proClass->getAllProduct($_POST["give"]);
    print_r(json_encode($proClass->allData));
}
//=>admin/js/productEdit.js; product edited to DB;
if (isset($_POST["key"]) && !empty($_POST["key"])) {//for image,name,price edited
    $arr = array_merge($_POST, $_FILES["proImageEdit"]);
    $proClass->productUpdate($arr);
}
//=>admin/js/productEdit.js; product 'delete' and 'update' to DB;
if(isset($_POST["update"]) && !empty($_POST["update"])){
    $proClass->updateDelUp($_POST["update"]);
}