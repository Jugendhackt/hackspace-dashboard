<?php

if(!isset($_GET['uid']) or !isset($_GET['sid']) or !isset($_GET['lin']))
    die("gib alle parameter an");

$uid = $_GET['uid'];
$sid = $_GET['sid'];
$lin = $_GET['lin'];

$dbConection = mysql_connect("localhost", "user", "12hallo")
or die ("Keine verbindung zum DB Server.");

mysql_select_db("lolroflkopter")
or die ("Die Datenbank existiert nicht.");

?>