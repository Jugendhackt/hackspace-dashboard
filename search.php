<?php 
// Serach.php
$q = $_GET['q'];

$link = mysql_connect("localhost", "root", "");
if (!$link) {
	die("Fehler beim Herstllen einer Verbindung zum MySQL-Server: ".mysqli_connect_error());
}

$db_selected = mysql_select_db('hack', $link);
if (!$db_selected) {
    die ('Kann keine Verbindung zur Datenbank herstellen: ' . mysql_error());
}
	echo $q;
		$hackerspaces = array();

		$hackerspacesQuery = mysql_query("SELECT * FROM space WHERE name LIKE '%" . $q .  "%' ");
				while ($hackerSpace = mysql_fetch_row($hackerspacesQuery)) {							
			$users = array();
			$usersLoginQuery = mysql_query("SELECT * FROM login WHERE sID LIKE '".$hackerSpace[0]."' ");
			while ($userLogin = mysql_fetch_row($usersLoginQuery)) {
				$userQuery = mysql_query("SELECT * FROM user WHERE uID LIKE '".$userLogin[0]."' ");
				$user = mysql_fetch_row($userQuery);
				array_push($users, $user);
			}

			$hackerSpace['users'] = $users;
			array_push($hackerspaces, $hackerspace);
		}
		var_dump($hackerSpace);	

			foreach ($hackerspaces as $i => $hackerspace) {
		?>

		<div class="panel panel-<?php echo $color; ?>">

						<?php
							if(empty($hackerspace['users'][1])) {
								$color = "danger";
							} else {
								$color = "success";
							}
						?>

						<style type="text/css">
						#<?php echo  $hackerspace[1]; ?>:target {
							display: block;
						}
						</style>

						<div class="list-group panel-<?php echo $color; ?>">
							<div class="panel-heading panel-<?php echo $color; ?>">
						 	<a class="panel-title title" id="list" href="#<?php echo  $hackerspace[1]; ?>">
						    	<?php echo $hackerspace[1]; ?>
						  	</a>
						  	</div>
						  	<div class="panel-body" id="<?php echo  $hackerspace[1]; ?>">
						  		<?php 		
						  			foreach ($hackerspace['users'] as $i => $user) {
						  			?>
											<div class="list-group-item">
												<?php echo $user[1]; //name ?>
												<br />
												<a href="mailto:<?php $row3[2] ?>" >
													<?php echo $user[2] ?>
												</a>
												<br />
												<?php echo $user[3]; ?>
											</div>

										<?php
										}		// Ende der dritten While-Schleife
						  		?>
							</div>
						</div>
				</div>
				<?php } ?>

		<?php 
/*
$sql="SELECT * FROM space WHERE name = '".$q."'";
$result = mysqli_query($link,$sql); */

?>