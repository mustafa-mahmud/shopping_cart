<?php

namespace cart\shopping;

class editUser {

    public $conn = "";

    public function __construct($DB = "") {
        $this->conn = $DB;
    }

    public function userInfo($data = "") {
        if (strlen($data) > 0) {
            $id = $_SESSION["logInfo"]["singUpId"];
            $user = "SELECT * FROM `signup` WHERE `singUpId`='$id'";
            $userQuery = $this->conn->prepare($user);
            $userQuery->execute();
            $list = $userQuery->fetchAll(\PDO::FETCH_ASSOC);
            if ($userQuery->rowCount($list) > 0) {
                return $list;
            }
            else {
                echo "no Information";
            }
        }
    }
    
    public function productInfo($data=""){
        if(strlen($data)>0){
            $id = $_SESSION["logInfo"]["singUpId"];
            $productShow="SELECT * FROM `userproductsave` WHERE `singUpId`='$id'";
            $queryProduct=  $this->conn->prepare($productShow);
            $queryProduct->execute();
            $list=$queryProduct->fetchAll(\PDO::FETCH_ASSOC);
            if($queryProduct->rowCount($list)>0){
                return $list;
//                return json_encode($list);
//                print_r(json_encode($list));
            }
        }
    }

    public function passCk($data = "") {
        $id = $_SESSION["logInfo"]["singUpId"];
        $pass = "SELECT * FROM `signup` WHERE `singUpId`='$id' and `uPass`='$data'";
        $queryPass = $this->conn->prepare($pass);
        $queryPass->execute();
        if ($queryPass->rowCount() > 0) {
            echo "success";
        }
        else {
            echo "unsuccess";
        }
    }

    public function userUpdate($data = "", $data2 = "") {
        $id = $_SESSION["logInfo"]["singUpId"];
        $userEdit = trim($data);
        $passClass = trim($data2);
        $arr = ["uEditName", "uEditEmail", "world", "newPass"];
        $arr2 = ["uName", "uEmail", "uWorld", "uPass"];
        for ($i = 0; $i < count($arr); $i++) {
            if ($passClass === $arr[$i]) {
                $userEdit = "UPDATE `signup` SET `$arr2[$i]`='$userEdit' WHERE `singUpId`='$id' ";
                $queryUserUpadate = $this->conn->prepare($userEdit);
                $queryUserUpadate->execute();
                try {
                    if ($queryUserUpadate->rowCount() > 0) {
                        echo "updated successfully!";
                    }
                } catch (\PDOException $ex) {
                    echo $ex->getMessage();
                }
            }
        }
    }

    public function imgUpdate($data = "") {
        $id = $_SESSION["logInfo"]["singUpId"];
        $tempName = $data["showImg"]["tmp_name"];
        $imgName = uniqid(md5($data["showImg"]["name"])).$data["showImg"]["name"];
        $desFolder = "images/";
        $sucess = move_uploaded_file($tempName, $desFolder . $imgName);
        if ($sucess) {
            $imgDB="UPDATE `signup` SET `uImage`='$imgName' WHERE `singUpId`='$id'";
            $queryImg=  $this->conn->prepare($imgDB);
            $queryImg->execute();
            try {
                if($queryImg->rowCount()>0){
                    echo "updated successfully!";
                }
            } catch (\PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }
    
    public function imgCk($data=""){
        $id = $_SESSION["logInfo"]["singUpId"];
        $img="SELECT `uImage` FROM `signup` WHERE `singUpId`='$id'";
        $queryImg=  $this->conn->prepare($img);
        $queryImg->execute();
        $list=$queryImg->fetchAll(\PDO::FETCH_ASSOC);
        if($queryImg->rowCount()>0){
            foreach ($list as $rows){
                echo $rows["uImage"];
            }
        }
    }
    
    public function lastLoginUpdate($data=""){
        if(strlen($data)>0){
            $id = $_SESSION["logInfo"]["singUpId"];
            $lastLogin="UPDATE `signup` SET `lastLogin`=now() WHERE `singUpId`='$id'";
            $queryLogin=  $this->conn->prepare($lastLogin);
            $queryLogin->execute();
            try {
                if($queryLogin->rowCount()>0){
                    echo "success Last Login Updated";
                }
            } catch (\PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }
}
