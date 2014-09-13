<?php

if(!isset($_GET['uid']) or !isset($_GET['sid']))
    die("gib alle parameter an");

$uid = $_GET['uid'];
$sid = $_GET['sid'];

$dbConection = mysql_connect("localhost", "root")
or die ("Keine verbindung zum DB Server.");

mysql_select_db("hack")
or die ("Die Datenbank existiert nicht.");


$sql = "SELECT * FROM `login` WHERE `uID` = ".mysql_real_escape_string($uid);
$erg = mysql_query($sql);
$row = @mysql_fetch_assoc($erg);

if($row['uID'] == 0){
    $sql = "INSERT INTO `hack`.`login` (`uID`, `sID`) VALUES ('".mysql_real_escape_string($uid)."', '".mysql_real_escape_string($sid)."');";
    mysql_query($sql);
    echo 'inloged ';
} else {
    $sql = "DELETE FROM `hack`.`login` WHERE uID = ".mysql_real_escape_string($uid).";";
    mysql_query($sql);
    echo 'outlogged';
}
?>
