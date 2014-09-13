<?php

if(!isset($_GET['uid']) or !isset($_GET['sid']) or !isset($_GET['lin']))
    die("gib alle parameter an");

$uid = $_GET['uid'];
$sid = $_GET['sid'];
$lin = $_GET['lin'];

$dbConection = mysql_connect("localhost", "root")
or die ("Keine verbindung zum DB Server.");

mysql_select_db("hack")
or die ("Die Datenbank existiert nicht.");

if($lin == 1){
    $sql = "INSERT INTO `hack`.`login` (`uID`, `sID`) VALUES ('".$uid."', '".$sid."');";
    mysql_query($sql);
} else {
    $sql = "DELETE FROM `hack`.`login` WHERE uID = ".$uid.";";
    mysql_query($sql);
}
echo 'ok';
?>