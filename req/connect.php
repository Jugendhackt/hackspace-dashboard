<?php 
$db = mysqli_connect("localhost", "root", "", "hack");
if (!$db) {
	die("Fehler beim Herstllen einer Verbindung zum MySQL-Server: ".mysqli_connect_error());
}
?>