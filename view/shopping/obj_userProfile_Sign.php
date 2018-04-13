<?php
error_reporting(E_ALL);
include '../../vendor/autoload.php';
use cart\shopping\dbConnected;
use cart\shopping\classSign;
$objDB=new dbConnected();
$objSign=new classSign($objDB->dbConn);
$objSign->selectAll();
$show=$objSign->allSelect;
print_r($show);


