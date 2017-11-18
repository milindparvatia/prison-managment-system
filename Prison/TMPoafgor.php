<?php

require 'connection.php'; 

if(isset($_POST['Login'])){
	
		$Em=$_POST['Email'];
		$pw=$_POST['Password'];
		
	$result = $conn->query("select * from user where Email='$Em' AND password='$pw' ");
	
	$row = $result ->fetch_array(MYSQLI_BOTH);
	
	session_start();
	
	$_SESSION["UserID"]= $row["UserID"];
	
	header('Location: Account.php');
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/Layout.css" rel="stylesheet" type="text/css" />
<link href="css/Menu.css" rel="stylesheet" type="text/css" />
<link href="css/botton.css" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
.StyleTextField{}.StyleTextField1 {}
</style>
<title>Prison Managment</title>
</head>

<body>
	<div class="StyleTextField" id="Holder">
	 <div id="Navbar">
  <nav>			<ul>
					<li><a href="Register.php" title="New Registration">New Registration</a></li>
					<li><a href="LogIn.php">Visitor</a></li>
					<li><a href="ContactUS.php" target="contact us">Contact US</a></li>	
				
					<div class="dropdown">
								  <button class="dropbtn">Employee Login⮟</button>
								  <div class="dropdown-content">
									<a href="AdminLogIn.php">Admin</a>
									<a href="StaffLogIn.php">Staff</a>
								</div>
								</div>
					
				</ul>
			</nav>
		</div>
	  <div id="Content">
			<div id="PageHeading">
		    <h1>VISIT STATUS</h1></div>
		    				
				<form name="form1" method="post" action="">
				  <div  align="center" class="FormElement">
				    <table>
				      <tbody>
				        <tr>
				          <td colspan="2"><blockquote>
				            <blockquote>&nbsp;</blockquote>
			              </blockquote></td>
			            </tr>
				        <tr>
				          <td style="text-align: center">Email:</td>
				          <td><input name="Email" type="email" autofocus required="required" class="StyleTextField" id="Email2"></td>
			            </tr>
				        <tr>
				          <td height="33" colspan="2"><label for="Password" class="s">
			              </label></td>
			            </tr>
				        <tr>
				          <td height="39" style="text-align: right">Password :</td>
				          <td><input name="Password" type="password" required="Pequired" class="StyleTextField" id="Password"></td>
			            </tr>
				        <tr>
				          <td height="38" colspan="2" style="text-align: center">&nbsp;</td>
			            </tr>
				        <tr>
				          <td height="26" colspan="2" style="text-align: center">
				          
				          <input name="Login" type="submit" class="button" id="Login" value="Login"></td>
			            </tr>
			          </tbody>
			        </table>
				    <div class="FormElement"></div>
                    <div class="FormElement"></div>
				  </div>
               <div class="FormElement"></div>
          </form>
	
      </div>
		<div id="Footer"></div>
</div>
	
</body>
</html>
