<?php 

// MySQL Connection
include 'req/connect.php';
?>


	<?php 

		$hackerspaces = array();

		$hackerspacesQuery = mysql_query("SELECT * FROM space");
		while ($hackerSpace = mysql_fetch_row($hackerspacesQuery)) {							
			$users = array();
			$usersLoginQuery = mysql_query("SELECT * FROM login WHERE sID LIKE '".$hackerSpace[0]."' ");
			while ($userLogin = mysql_fetch_row($usersLoginQuery)) {
				$userQuery = mysql_query("SELECT * FROM user WHERE uID LIKE '".$userLogin[0]."' ");
				$user = mysql_fetch_row($userQuery);
				array_push($users, $user);
			}

			$hackerSpace['users'] = $users;
			array_push($hackerspaces, $hackerSpace);
		}

	?>

<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Bootstrap JavaScript -->
<script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Map CSS and JavaScript -->
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<!-- <script src="req/inc.js"></script> -->
<!-- Generanal -->
<link rel="stylesheet" type="text/css" href="css/style.css">

<title>HackSpace Dashboard</title>
</head>
<body onload="init()">
	<header>
		<nav class="navbar navbar-inverse  navbar-static-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
			     	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			      	</button>
			      	<a class="navbar-brand" href="index.php">HackSpace Dashboard</a>
				</div> 
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<!-- Side Bar -->

<!--
		foreach ($hackerspaces as $i => $hackerspace) {
			echo $hackerspace[1]; // name
			echo '<br />';

			foreach ($hackerspace['users'] as $i => $user) {
				echo '>> '.$user[1]; //name
				echo '<br>';
			}
		}
-->


	<div class="col-sm-3 col-md-2 sidebar"> <!-- HackSpace Stationen in Side Bar -->
    	<ul class="nav nav-sidebar">
    		<?php 
    			foreach ($hackerspaces as $i => $hackerspace) {
					?>   													
					<li>

					<div class="panel panel-danger">

						<?php
							if(empty($hackerspace['users'][1])) {
								$color = "danger";
							} else {
								$color = "success";
							}
						?>

						<div class="list-group panel-<?php echo $color; ?>">
							<div class="panel-heading panel-danger">
						 	<h3 class="panel-title title" id="list">
						    	<?php echo $hackerspace[1]; ?>
						  	</h3>
						  	</div>
						  	<div class="panel-body">
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
  					</li>

					<?php 
				}								// Ende ersten While-Schleife 
				?>
        </ul>
    </div>
    <section id="main">
		<div class="container">
			<article class="map">
				<div id="map">.</div>
			<article>
		</div>
	</section>
	<footer>
		
	</footer>
	<script> 
		function init() {
			var map = L.map('map').setView([52.530592, 13.413454], 13);

			L.tileLayer('http://tiles.odcdn.de/planet/{z}/{x}/{y}.png', {
				attribution : '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);
			
			var iconred = L.icon({
				iconUrl : 'img/flag.png',
				iconSize : [25, 38],
				iconAnchor : [1, 19],
				popupAnchor : [12, -15]
			});
			var icongreen = L.icon({
				iconUrl : 'img/flag2.png',
				iconSize : [25, 38],
				iconAnchor : [1, 19],
				popupAnchor : [12, -15]
			});
			
			<?php 
				foreach ($hackerspaces as $i => $hackerspace) {?>
					L.marker([<?php echo $hackerspace[2]; ?>, <?php echo $hackerspace[3]; ?>], {
						<?php
							if(empty($hackerspace['users'][1])) {
								$color = "iconred";
							} else {
								$color = "icongreen";
							}
						?>
						icon : <?php echo $color; ?>
					}).addTo(map).bindPopup('<?php echo $hackerspace[1]; ?>');
				<?php }

			?>

			/*L.marker([52.530592, 13.413454], {
				icon : ic?>
			}).addTo(map).bindPopup('A pretty CSS3 popup. <br> Easily customizable.');*/
		}
	</script>
</body>
</html>