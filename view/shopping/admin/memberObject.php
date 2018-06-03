<?php

include_once '../../../vendor/autoload.php';

use admin\admining\dbUsers;
use admin\admining\memberEditClass;

$dbConn = new dbUsers();
$memberObj = new memberEditClass($dbConn->userDBConn);

//memberEdit.js
if (isset($_POST["allData"]) && !empty($_POST["allData"])) {
    $memberInfo = $memberObj->allUserInfo($_POST["allData"]);
    $json = json_encode($memberInfo);
    print_r($json);
}
//userForm.js
if (isset($_POST["id"]) && !empty($_POST["id"])) {// |OK
    $data = $memberObj->specificInfo($_POST["id"]);
    print_r(json_encode($data));
}
//memberEditVerification.js
if(isset($_POST["ckFrm"]) && !empty($_POST["ckFrm"])){
    $memberObj->userUpdate($_POST,$_FILES);
}
//userForm.js
if(isset($_POST["del"]) && !empty($_POST["del"])){
    $num= filter_var($_POST["del"],FILTER_SANITIZE_NUMBER_INT);
    if(filter_var($num, FILTER_VALIDATE_INT)===0 || filter_var($num, FILTER_VALIDATE_INT)){
        $res=$memberObj->delete($num);
        echo $res;
    }else{
        echo "This is not number!";
    }
}