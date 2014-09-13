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
<script src="req/inc.js"></script>
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
					<script>												// JavaScript für Drop-Down
						$(document).ready(function() {
							$('#list').click(function() {
								$('.down').slideToggle('3000');
							});
						}); 

					</script>											<!-- Ausblenden von den Untermenus -->
					<style type="text/css">							
						.panel-body {
							display: none;
						}

						.list-group:hover > .panel-body {
							display: block;
						}
					</style>													
					<li>

					<div class="panel panel-danger">
						<div class="list-group panel-danger">
							<div class="panel-heading panel-danger">
						 	<h3 class="panel-title" id="list">
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
</body>
</html>