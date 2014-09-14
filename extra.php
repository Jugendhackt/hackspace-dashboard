<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="html.css">
    <link rel="stylesheet" href="style.css">

    <!-- map -->
    <script src="req/inc.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

	<title>HackSpace Dashboard</title>
</head>
<body onload="init()">
	<nav style="width: 20%; float: left;">
	    <ul>
	        <li id="home">
	            <a href="#home">Home</a>
	        </li>
	        <li id = "ueber-uns">
	            <a href="#ueber-uns">Über uns</a>
	            <ul>
	                <li><a href="#">Wer wir sind</a></li>
	                <li><a href="#">Was wir machen</a></li>
	                <li><a href="#">Unsere Ziele</a></li>
	                <li><a href="#">Unser Team</a></li>
	            </ul>
	        </li>
	        <li id = "leistungen">
	            <a href="#leistungen">Leistungen</a>
	            <ul>
	                <li><a href="#">Webdesign</a></li>
	                <li><a href="#">Programmierung</a></li>
	                <li><a href="#">Online Marketing</a></li>
	                <li><a href="#">Suchmaschinenoptimierung</a></li>
	            </ul>
	        </li>
	    </ul>
	</nav>
    <section id="main">
		<div id="map" style="height: 500px; width: 75%; margin-right: 100%"></div>
	</section>
</body>
</html>