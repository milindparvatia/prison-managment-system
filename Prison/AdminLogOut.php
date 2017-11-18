<?php
require 'connection.php'; 
require 'AlertMsg.php';

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
<link href="css/LeftSidePanel.css" rel="stylesheet" type="text/css" />
<link href="css/botton.css" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" rel="stylesheet" type="text/css"/>
<style type="text/css">.StyleTextField{}</style>
<title>Prison Managment</title>
</head>

<body>
	<div id="Holder">
	    <div id="Navbar">
	<nav>			
	  <ul>
					<li><a href="ContactUS.php" target="contact us">Contact US</a></li>	
					<li><a href="LogIn.php">Visitor</a></li>
					
					<div class="dropdown">
								  <button class="dropbtn">Employee Login⮟</button>
								  <div class="dropdown-content">
									<a href="AdminLogIn.php">Admin</a>
									<a href="StaffLogIn.php">Staff</a>
								</div>
					</div>
					<li><a href="Register.php" title="New Registration">New Registration</a></li>
	  				<li id="Logo"><a href="index.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a></li>
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
