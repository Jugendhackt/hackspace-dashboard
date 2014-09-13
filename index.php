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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>HackSpace Dashboard</title>
</head>
<body>
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
    			/*$result = mysql_query("SELECT * FROM space");
				if (!$result) {
				    echo 'Die MySQL-Abfrage ist fehlgeschlagen: ' . mysql_error();
				    exit;
				}
				$row = mysql_fetch_row($result);

				echo $row[0]; // 42
				echo $row[1]; // der email Wert*/ 

				$abfrage = "SELECT * FROM space";
				$ergebnis = mysql_query($abfrage);
				while($row = mysql_fetch_object($ergebnis)) {
				   echo "$row->name <br>";
				  }

			?>
        	<li class="active"><a href="#">Overview</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
        </ul>
    </div>
    <section id="main">
		<div class="container">
			<article class="map">
				<small>Map...</small>
			<article>
		</div>
	</section>
	<footer>
		
	</footer>
</body>
</html>