<?php

namespace admin\admining;

class memberEditClass {

    public $conn = "";

    public function __construct($data = "") {
        $this->conn = $data;
    }

    public function allUserInfo($data = "") {
        if ($data === "member") {
            $allMember = "SELECT * FROM `signup`";
            $query = $this->conn->prepare($allMember);
            $query->execute();
            $show = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $show;
        }
    }

    public function specificInfo($data = "") {
        if ($data > 0) {
            $sql = "SELECT * FROM `signup` WHERE `singUpId`=$data";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $show = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $show;
        }
    }

    public function userUpdate($data = "", $img = "") {
        $imgg = ($img["img"]["name"] !== "") ? strtolower($img["img"]["name"]) : strtolower($data["imgOld"]);
        //image upload .............
        if ($img["img"]["name"] !== "") {
            $tempFile = $img["img"]["tmp_name"];
            $name = $img["img"]["name"];
            $location = "../../../view/shopping/admin/images/";
            $nameLocation = $location . $name;
            move_uploaded_file($tempFile, $nameLocation);
        }
        $id = $data["uId"];
        $name = $data["name"];
        $email = $data["email"];
        $country = $data["country"];
        if ($data["gender"] === "male") {
            $gender = "men";
        }
        else if ($data["gender"] === "female") {
            $gender = "women";
        }
        else {
            $gender = $data["gender"];
        }
        $emailConfirmation = ($data["emailConfirmation"] === "Yes") ? 1 : 0;
        $status = ($data["status"] === "Active") ? 1 : 0;
        if ($data["newPass"] !== "") {
            $uPass = $data["newPass"];
            $sql = "UPDATE `signup` SET `uName`='$name',`uImage`='$imgg',`uEmail`='$email',`uWorld`='$country',`uPass`='$uPass',`uGender`='$gender',`confirm`='$emailConfirmation',`status`='$status' WHERE `singUpId`='$id'";
        }
        else {
            $sql = "UPDATE `signup` SET `uName`='$name',`uImage`='$imgg',`uEmail`='$email',`uWorld`='$country', `uGender`='$gender',`confirm`='$emailConfirmation',`status`='$status' WHERE `singUpId`='$id'";
        }
        $query = $this->conn->prepare($sql);
        try {
            $query->execute();
            if ($query->rowCount() > 0) {
                echo "Successfully updated!";
            }
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function delete($data=""){
        $sql="DELETE FROM `signup` WHERE `singUpId`='$data'";
        $query= $this->conn->prepare($sql);
        $query->execute();
        if($query->rowCount()>0){
            echo "deleted!";
        }else{
            echo "wronged!";
        }
    }

}
