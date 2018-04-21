<?php

namespace admin\admining;

class memberEditClass {
    
    public $conn="";
    
    public function __construct($data=""){
        $this->conn=$data;
    }
    
    public function allUserInfo($data=""){
        if($data==="member"){
            $allMember="SELECT * FROM `signup`";
            $query=$this->conn->prepare($allMember);
            $query->execute();
            $show=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $show;
        }
    }
    
    public function specificInfo($data=""){
        if($data>0){
            $sql="SELECT * FROM `signup` WHERE `singUpId`=$data";
            $query= $this->conn->prepare($sql);
            $query->execute();
            $show=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $show;
        }
    }
    
}
