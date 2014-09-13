<?php
$link = mysql_connect('localhost', 'lolroflkopter', 'penis', $db);
if (!$link) {
    die('Die Verbindug zur Datenbank ist abgebrochen: ' . mysql_error());
}
echo 'Erfolgreich verbunden';
?>
