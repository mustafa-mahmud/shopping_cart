<?php

namespace cart\shopping;

class classSign {
    public $conn;
    public $data;
    public $ipGet;
    public $uinqueId;
    public $allSelect;
    public $emailOk;

    public function __construct($theDB = "") {
        $this->conn = $theDB;
    }

    public function insert($theData = "") {
        $this->data = $theData;
        $uName = $this->data["uName"];
        $uEmail = $this->data["uEmail"];
        $uWorld = $this->data["uWorld"];
        $uPass = $this->data["uPass"];
        $uGender = $this->data["uGender"];
        $confirm = 0; // signup confirmation by email.....
        $status = 1; // active user....
        $userIp = $this->ipGet;
        $lastLogin = 0; //when user login then this field auto input by time;
        $this->uinqueId = uniqid();

        $sql = "INSERT INTO `signup`(`uName`, `uEmail`, `uWorld`, `uPass`, `uGender`, `confirm`, `status`, `created`, `userIp`, `lastLogin`, `signUpUniqid`) VALUES ('$uName','$uEmail','$uWorld','$uPass','$uGender','$confirm','$status',now(),'$userIp','$lastLogin','$this->uinqueId')";
        $query = $this->conn->prepare($sql);
        try {
            $query->execute();
            if ($query->rowCount() > 0) {
                $subject = "Confirmation Report ";
                $mainMsg = "<a href='https://mahmudmustafa000.000webhostapp.com/shopping_cart/shopping_cart/view/shopping/index.php?id='$this->uinqueId>Please click on me for confirmation.</a>";
                $headers = "From: Shopping Cart <mustafamahmud000.gmail.com>";
                mail($uEmail, $subject, $mainMsg, $headers);
                echo "success all";
            }
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getIp() {
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        }
        elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        }
        else {
            $ip = $remote;
        }

        $this->ipGet = $ip;
    }

    public function selectAll() {
        $sqlSelect = "SELECT * FROM `signup`";
        $query = $this->conn->prepare($sqlSelect);
        try {
            $query->execute();
            $this->allSelect = $query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            echo "Select Failed" . $ex->getMessage();
        }
    }
    
    public function emailCk($data=""){
        foreach ($this->allSelect as $rows) {
            if($rows["uEmail"]===$data["uEmail"]){
                echo "email exists";
                return FALSE;
            }
        }
        $this->insert($data);
    }

    public function confirmId($data = "") {
        if (strlen($data) !== 0) {
            foreach ($this->allSelect as $rows) {
                if ($data === $rows["signUpUniqid"]) {
                    $sqlUpdate = "UPDATE `signup` SET `confirm`=1 WHERE `signUpUniqid`='$data'";
                    $query = $this->conn->prepare($sqlUpdate);
                    try {
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo "confirmed";
                        }
                    } catch (\PDOException $ex) {
                        echo "Sql Update Failed " . $ex->getMessage();
                    }
                }
            }
        }
    }

    public function loginCk($data = "") {
        $email = $data["logEmail"];
        $pass = $data["logPass"];
        foreach ($this->allSelect as $log) {
            if ($email === $log["uEmail"] && $pass === $log["uPass"]) {
                if ($log["confirm"] == 1) {
                    print_r($log);
                    $_SESSION["logInfo"] = $log;
                    $uniqId = $log["signUpUniqid"];
                    $sqlLogInUpdate = "UPDATE `signup` SET `lastLogin`=now() WHERE `signUpUniqid`='$uniqId'";
                    $query = $this->conn->prepare($sqlLogInUpdate);
                    $query->execute();
                }
                else {
                    echo "confrimation is pending. please check your email";
                }
            }
        }
    }

}
