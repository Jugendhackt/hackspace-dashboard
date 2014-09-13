<?php
include "connect.php";
if ($_SERVER['QUERY_STRING'] == "get_map") {
	$sql = "SELECT * FROM `space`;";
	$i = 0;
	echo '{"map":[';
		$result = @mysql_query($sql);
		while ($row = @mysql_fetch_assoc($result)) {
			if ($i != 0) {
				echo ",";
			}
			$i++;
			echo "{";
			echo '"sID":' . $row['sID'] . ',';
			echo '"name":"' . $row['name'] . '",';
			echo '"latitude":' . $row['latitude'] . ',';
			echo '"longditude":' . $row['longditude'];
			echo "}";
		}
		
	echo "]}";
}
?>