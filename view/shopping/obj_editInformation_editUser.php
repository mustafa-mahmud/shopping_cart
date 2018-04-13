<?php
session_start();
error_reporting(E_ALL);

include '../../vendor/autoload.php';

use cart\shopping\dbConnected;
use cart\shopping\editUser;
$DB=new dbConnected();
$obj=new editUser($DB->dbConn);
if(isset($_POST["user"]) && !empty($_POST["user"])){//editInformation.js
    $show=$obj->userInfo($_POST["user"]);
    print_r(json_encode($show));
}
if(isset($_POST["pass"]) && !empty($_POST["pass"])){//editInformation.js
    $obj->passCk($_POST["pass"]);
}
if(isset($_POST["editUser"]) && !empty($_POST["editUser"])){//editInformation.js
    $obj->userUpdate($_POST["editUser"],$_POST["pastInfo"]);
}
if(isset($_FILES) && !empty($_FILES)){//editInformation.js
    $obj->imgUpdate($_FILES);
    $obj->imgCk();
}
if(isset($_POST["img"]) && !empty($_POST["img"])){//editInformation.js
    $obj->imgCk($_POST["img"]);
}
if(isset($_POST["primetive"]) && !empty($_POST["primetive"])){//editInformation.js
    $obj->userInfo($_POST["primetive"]);
}

