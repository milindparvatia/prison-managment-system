<?php

require 'connection.php'; 
require 'AlertMsg.php';

if(isset($_POST['Login'])){

	$Email=$_POST['Email'];
	$PASSWORD=$_POST['PASSWORD'];
		
	$result = $conn->query("select * from staff where EMAIL='$Email' AND password='$PASSWORD' ");
	
	$row = $result ->fetch_array(MYSQLI_BOTH);

	if($row["STID"]==0){
		phpAlert(   "Error While Logging!!\\n\\n Please Check Your Email ID & Password And Try Again!!"   );
	}else{
	
	session_start();
	
	$_SESSION["STID"]= $row["STID"];
	
	header('Location: StaffAccount.php');
	}
}
else{
	
}
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
.StyleTextField{}.StyleTextField1 {}
</style>
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
	    <form name="form1" method="post" action="">
			<table width="37%" align="center" cellpadding="11px">
  			<tbody>
    <tr style="text-align: center; font-size: 36px; color: #666666;">
							  <td colspan="2">LOGIN FOR STAFF</td>
						  </tr>
    <tr>
      <td width="33%"><blockquote>
        <p style="text-align: center">Email :</p>
        </blockquote></td>
      <td width="67%"><input name="Email" type="email" autofocus="autofocus" required="required" class="StyleTextField" id="Email"></td>
    </tr>
    <tr>
      <td><blockquote>
        <p style="text-align: center">Password:</p>
      </blockquote></td>
      <td><input name="PASSWORD" type="password" required="Pequired" class="StyleTextField" id="PASSWORD"></td>
    </tr>
    <tr>
      <td height="26" colspan="2" style="text-align: center"><button class="button" style="vertical-align:middle" name="Login" type="submit" id="Login" value="Login"><span>Login </span></button></td>
      </tr>
  </tbody>
</table>
</form><form>
  <div id="Content2">
    <td>&nbsp;</td>
</form>
  </div>
  <div id="Footer"></div>
</form>
	  </div>
	</div>
	
</body>
</html>
