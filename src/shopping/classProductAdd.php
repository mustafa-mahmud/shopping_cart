<?php

namespace cart\shopping;

class classProductAdd {

    public $proInfo = "";
    public $conn = "";
    public $signUpId = "";

    public function __construct($data = "") {
        $this->conn = $data;
    }

    public function producAdd($data = "") {
        $this->signUpId = $_SESSION["logInfo"]["singUpId"];
        $show = "SELECT * FROM `userproductsave` WHERE `singUpId`='$this->signUpId'";
        $query2 = $this->conn->prepare($show);
        try {
            $query2->execute();
            $dbData = $query2->fetchAll(\PDO::FETCH_ASSOC);
            if ($query2->rowCount($dbData) < 10) {
                if ((count($data["data"]) + $query2->rowCount($dbData)) < 11) {
                    //success;
                    for ($i = 0; $i < count($data["data"]); $i++) {
                        $img = $data["data"][$i];
                        $name = $data["data2"][$i];
                        $price = $data["data3"][$i];
                        $quantity = $data["data4"][$i];
                        $total = $data["data5"][$i];
                        $sql = "INSERT INTO `userproductsave`(`singUpId`, `userProductName`, `userProductImg`, `userProductPrice`, `userProductQuantity`, `userProductTotal`, `userProductCreated`) VALUES ('$this->signUpId','$name','$img','$price','$quantity','$total',now())";
                        $query = $this->conn->prepare($sql);
                        try {
                            $query->execute();
                            if ($query->rowCount() > 0) {
                                echo "insert successfully! check your profile.";
                            }
                        } catch (\PDOException $ex) {
                            echo "sorry something went to wrong, try letter!";
                        }
                    }
                }
                else {
                    $numb = 10;
                    echo "sorry you already saved " . $query2->rowCount($dbData) . " products you will be able for " . ($numb - $query2->rowCount($dbData)) . " more !";
                }
            }
            else {
                echo "sorry you already saved 10 products, please buy !";
            }
        } catch (\PDOException $ex) {
            echo $ex->getMessage() . "try letter!";
        }
    }

    public function allProductsShow() {
        $this->signUpId = $_SESSION["logInfo"]["singUpId"];
        $show = "SELECT * FROM `userproductsave` WHERE `singUpId`='$this->signUpId' ORDER BY `userProductCreated`";
        $query = $this->conn->prepare($show);
        try {
            $query->execute();
            $list = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ($query->rowCount($list) > 0) {
                print_r(json_encode($list));
            }
            else {
                echo "you did not save any product yet !";
            }
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function productUpdate($data = "") {
        $this->signUpId = $_SESSION["logInfo"]["singUpId"];
        $strLen = gettype($data[0]);
        $dated = $data[0][0];
        $arr = [];
        $arr2 = [];
        $pickData = "SELECT userProductName FROM `userproductsave` WHERE `userProductCreated` = '$dated'";
        $query2 = $this->conn->prepare($pickData);
        $query2->execute();
        $list = $query2->fetchAll(\PDO::FETCH_ASSOC);
        if (count($list) !== count($data) && $strLen === "array") {//delete + edit row......
            foreach ($data as $rows) {
                array_push($arr, $rows[1]);
            }
            foreach ($list as $rows2) {
                array_push($arr2, $rows2["userProductName"]);
            }
            for ($k = 0; $k < count($arr2); $k++) {
                if (array_search($arr2[$k], $arr) === false) {
                    $del = "DELETE FROM `userproductsave` WHERE `userProductName`='$arr2[$k]' and `userProductCreated`='$dated' and `singUpId`='$this->signUpId'";
                    $queryDel = $this->conn->prepare($del);
                    $queryDel->execute();
                    try {
                        if ($queryDel->rowCount() > 0) {
                            echo "successfully to delete";
                        }
                    } catch (\PDOException $ex) {
                        echo "OOPSS" . $ex->getMessage();
                    }
                }
            }
        }
        else if (count($list) !== count($data) && $strLen === "string") {//delete full row.....
            $dataDel = chop($data[0], "full");
            $del = "DELETE FROM `userproductsave` WHERE `userProductCreated`='$dataDel' and `singUpId`='$this->signUpId'";
            $queryDel = $this->conn->prepare($del);
            $queryDel->execute();
            try {
                if ($queryDel->rowCount() > 0) {
                    echo "successfully to delete";
                }
            } catch (\PDOException $ex) {
                echo "OOPSS" . $ex->getMessage();
            }
        }
        else {
            if (count($data) > 0) {
                for ($i = 0; $i < count($data); $i++) {//only edit.......
                    $dated = $data[$i][0];
                    $proName = $data[$i][1];
                    $quan = $data[$i][2];
                    $price = $data[$i][3];
                    $queryUpdate = "UPDATE `userproductsave` SET `userProductQuantity`='$quan',`userProductTotal`='$price' WHERE `singUpId`='$this->signUpId' and `userProductName`='$proName' and `userProductCreated`='$dated'";
                    $query = $this->conn->prepare($queryUpdate);
                    $query->execute();
                    try {
                        if ($query->rowCount() > 0) {
                            echo "products updated successfully !";
                        }
                    } catch (\PDOException $ex) {
                        echo $ex->getMessage();
                    }
                }
            }
        }
    }

    public function searchProdcuts($data = "") {
        $id = $_SESSION["logInfo"]["singUpId"];
        $arr = [];
        for ($i = 0; $i < count($data); $i++) {
            $searchPro = "SELECT `userProductName` FROM `userproductsave` WHERE `singUpId`='$id' and `userProductName`='$data[$i]'";
            $querySearchPro = $this->conn->prepare($searchPro);
            $querySearchPro->execute();
            $list = $querySearchPro->fetchAll(\PDO::FETCH_ASSOC);
            if ($querySearchPro->rowCount($list) > 0) {
                array_push($arr, $data[$i]);
            }
        }
        return $arr;
    }

}
