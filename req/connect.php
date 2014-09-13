<?php 
$link = mysql_connect("localhost", "root", "");
if (!$link) {
	die("Fehler beim Herstllen einer Verbindung zum MySQL-Server: ".mysqli_connect_error());
}

$db_selected = mysql_select_db('hack', $link);
if (!$db_selected) {
    die ('Kann keine Verbindung zur Datenbank herstellen: ' . mysql_error());
}
?>