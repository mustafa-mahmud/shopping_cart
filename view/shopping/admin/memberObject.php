<?php

include_once '../../../vendor/autoload.php';

use admin\admining\dbUsers;
use admin\admining\memberEditClass;

$dbConn=new dbUsers();
$memberObj=new memberEditClass($dbConn->userDBConn);

//memberEdit.js
if(isset($_POST["allData"]) && !empty($_POST["allData"])){
    $memberInfo=$memberObj->allUserInfo($_POST["allData"]);
    $json= json_encode($memberInfo);
    print_r($json);
}
//userForm.js
if(isset($_POST["id"]) && !empty($_POST["id"])){// |OK
    $data=$memberObj->specificInfo($_POST["id"]);
    print_r(json_encode($data));
}