<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();

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
<style type="text/css">
.StyleTextField{
	font-size: 18px;
}
.StyleTextField1 {	font-size: 18px;
}
</style>
<title>Prison Managment</title>
</head>

<body>
	<div id="Holder">
		<div id="Header"></div>
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
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
        <table width="435" height="163" border="10" align="center" cellpadding="0px">
          <tbody>
            <tr class="StyleTextField1">
              <td width="145" bgcolor="#C1C1C1">NANCY PAREKH</td>
              <td width="125" bgcolor="#C1C1C1">MILIND PARVATIA</td>
            </tr>
            <tr class="StyleTextField1">
              <td bgcolor="#C1C1C1">MO.9638524047</td>
              <td bgcolor="#C1C1C1">MO.7698899768</td>
            </tr>
          </tbody>
        </table>
	  </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
