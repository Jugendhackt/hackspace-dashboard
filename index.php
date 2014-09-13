<?php 
include 'req/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="req/inc.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>HackSpace Dashboard</title>
</head>
<body onload="init()">
	<header>
		<nav class="navbar navbar-inverse  navbar-static-top" role="navigation">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
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

	<div class="col-sm-3 col-md-2 sidebar"> <!-- HackSpace Stationen in Side Bar -->
    	<ul class="nav nav-sidebar">
    		<?php 
    			
    			$result = mysql_query("SELECT * FROM space");
				if (!$result) {
				    echo 'Die MySQL-Abfrage ist fehlgeschlagen: ' . mysql_error();
				    exit;
				}

				$schleifenvariable = 1;
				while ($row = mysql_fetch_row($result)) {					// Abfrage von Space  echo $row[1];
					?>   
					<script>
						$(document).ready(function() {
							$('#list<?php echo ').click(function() {
								$('#down1').slideToggle('3000');
							});
						}); 

					</script>													
					<li>
						<div class="list-group">
						 	<a href="#" class="list-group-item active" id="list1">
						    	<?php echo $row[1]; ?>
						  	</a>
						  	<div id="down1">
						  		<?php 
						  			$result2 = mysql_query("SELECT * FROM login WHERE sID LIKE '".$row[0]."' ");
									if (!$result2) {
									    echo 'Die MySQL-Abfrage ist fehlgeschlagen: ' . mysql_error();
									    exit;
									}

									while ($row2 = mysql_fetch_row($result2)) {
										$result3 = mysql_query("SELECT * FROM user WHERE uID LIKE '".$row2[0]."' ");
										if (!$result3) {
										    echo 'Die MySQL-Abfrage ist fehlgeschlagen: ' . mysql_error();
										    exit;
										} while ($row3 = mysql_fetch_row($result3)) { ?>
											<div class="list-group-item">
												<?php echo $row3[1] ?>
												<br />
												<a href="mailto:<?php $row3[2] ?>" >
													<?php echo $row3[2] ?>
												</a>
												<br />
												<?php echo $row3[3]; ?>
											</div>

										<?php
										}
									}
						  		?>
							</div>
						</div>
  					</li>

					<?php 
				} 
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