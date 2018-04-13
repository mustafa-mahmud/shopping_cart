<?php

namespace admin\admining;

class productClass {

    public $conn = "";
    public $ck = "admin";
    public $allData = "";
    public $allActiveData = "";
    public $allInactiveData = "";
    public $delete = array("del" => array());
    public $update = array("up" => array());
    public $yesNo = array("yesNo" => array());
    public $delAllData = array("delAll" => array());
    public $updataAllData = array("upAllData" => array());

    public function __construct($data = "") {
        $this->conn = $data;
    }

    public function productInsert($data = "") {
        $name = $data["product"];
        $price = $data["price"];
        $status = ($data["ck"] === "true") ? "yes" : "no";
        $image = md5($data["saveImg"]["name"]) . uniqid() . $data["saveImg"]["name"];
        $tmpName = $data["saveImg"]["tmp_name"];
        $upload = "../../../view/shopping/admin/images/";
        //image upload to new location
        if (move_uploaded_file($tmpName, $upload . $image)) {//if success to upload
            $insert = "INSERT INTO `product`(`name`, `image`, `price`, `status`, `created`) VALUES ('$name','$image','$price','$status',now())";
            $query = $this->conn->prepare($insert);
            $query->execute();
            try {
                if ($query->rowCount() > 0) {
                    //show last inserted 'product'
                    $last = "SELECT * FROM `product`";
                    $query2 = $this->conn->prepare($last);
                    $show = $this->conn->lastInsertId();
                    $lastData = "SELECT * FROM `product` WHERE `productId`='$show'";
                    $query3 = $this->conn->prepare($lastData);
                    $query3->execute();
                    $showLast = $query3->fetchAll(\PDO::FETCH_ASSOC);
                    print_r(json_encode($showLast));
                }
            } catch (\PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        else {//if failed to upload
            echo "sorry your Image upload failed ! try another one";
        }
    }

    public function productCk($data = "") {
        $sql = "SELECT * FROM `product` WHERE `name`='$data'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $list = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($query->rowCount($list) > 0) {
            echo "Sorry already exists product!";
        }
        else {
            echo "add";
        }
    }

    public function getAllProduct($data = "") {//this data go for slider multiple li on index.php
        //all data;
        if ($data === "all") {
            $sql = "SELECT * FROM `product`";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $show = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($query->rowCount($show) > 0) {
                $this->allData = $show;
            }
        }
        //all Active data;
        if ($data === "active") {
            $sql2 = "SELECT * FROM `product` WHERE `status`='yes'";
            $query2 = $this->conn->prepare($sql2);
            $query2->execute();
            $show2 = $query2->fetchAll(\PDO::FETCH_ASSOC);
            if ($query2->rowCount($show2) > 0) {
                $this->allActiveData = $show2;
            }
        }
        //all Inactive data;
        if ($data === "inactive") {
            $sql3 = "SELECT * FROM `product` WHERE `status`='no'";
            $query3 = $this->conn->prepare($sql3);
            $query3->execute();
            $show3 = $query3->fetchAll(\PDO::FETCH_ASSOC);
            if ($query3->rowCount($show3) > 0) {
                $this->allInactiveData = $show3;
            }
        }
    }

    public function productUpdate($data = "") {//objectAll.php
        //only product - name,image,price update from =>admin/js/productEdit.js (productEdit.php)
        $DB = $data["DB"];
        $proName = $data["proNameEdit"];
        $price = $data["price"];
        $imgName = $data["name"];
        $imgTemp = $data["tmp_name"];
        $processImgName = md5(uniqid($imgName)) . $imgName;
        $sendFolder = "images/";
        $my_file = $sendFolder . $processImgName;
        date_default_timezone_set("Asia/Dhaka");
        $time = date("Y:m:d h:i:sa");
        $imgSuccess = "";
        if (strlen($imgName) > 0 && strlen($imgTemp) > 0) {
            $updateProduct = "UPDATE `product` SET `name`='$proName',`image`='$processImgName',`price`='$price',`update`='$time' WHERE `productId`='$DB'";
            $imgSuccess = "imgDone";
        }
        else {
            $updateProduct = "UPDATE `product` SET `name`='$proName',`price`='$price',`update`='$time' WHERE `productId`='$DB'";
        }
        $update = $this->conn->prepare($updateProduct);
        $update->execute();
        if ($update->rowCount() > 0) {
            if ($imgSuccess === "imgDone") {
                move_uploaded_file($imgTemp, $my_file);
            }
            $select = "SELECT * FROM `product` WHERE `productId`='$DB'";
            $query = $this->conn->prepare($select);
            $query->execute();
            $show = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($query->rowCount($show) > 0) {
                print_r(json_encode($show));
            }
        }
        else {
            echo "something wrong !";
        }
    }

    public function updateDelUp($data = "") {
        try {
            if (array_key_exists("del", $data)) {
                $del = count($data["del"]);
                for ($i = 0; $i < $del; $i++) {
                    $delId = $data["del"][$i];
                    $delete = "DELETE FROM `product` WHERE `productId`=$delId";
                    $queryDel = $this->conn->prepare($delete);
                    $queryDel->execute();
                }
            }
            if (array_key_exists("up", $data)) {
                $up = count($data["up"]);
                date_default_timezone_set("Asia/Dhaka");
                $times = date("Y:m:d h:i:sa");
                for ($j = 0; $j < $up; $j++) {
                    $upId = $data["up"][$j];
                    $upStatus = $data["status"][$j];
                    $update = "UPDATE `product` SET `status`='$upStatus',`update`='$times' WHERE `productId`='$upId'";
                    $queryUp = $this->conn->prepare($update);
                    $queryUp->execute();
                }
            }
            echo "success Del Up";
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
