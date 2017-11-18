<?php
require 'connection.php'; 

session_start();
unset($_SESSION["SUPERID"]);

session_destroy();
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/Layout.css" rel="stylesheet" type="text/css" />
<link href="css/Menu.css" rel="stylesheet" type="text/css" />
<style type="text/css">.StyleTextField{}</style>
<title>Prison Managment</title>
</head>

<body>
	<div class="StyleTextField" id="Holder">
		<div id="Header"></div>
		<div id="Navbar">
			<nav>
				<ul>
					<li><a href="LogIn.php" title="Login">Login</a></li>
					<li><a href="Register.php" title="Register">Register</a></li>
				</ul>
			</nav>
		</div>
	  <div id="Content">
			<div id="PageHeading"><h1>&nbsp;</h1></div>
			<h1 align="center">you have been logged out</h1>
      </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
