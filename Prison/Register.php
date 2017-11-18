<?php
require 'connection.php';
require 'AlertMsg.php';

if(isset($_POST['submit'])){
	session_start();
	$Fname=$_POST['Fname'];
	$Username=$_POST['Username'];
	
	if(isset($_POST['radio'])){
		
		$gender=$_POST['radio'];
	}
	
	$Email=$_POST['Email'];
	$number=$_POST['number'];
	$MOBILE=$_POST['MOBILE'];
	$Relation=$_POST['Relation'];
	
	$password=$_POST['password'];
	$password2=$_POST['password2'];

	$sql1 = "SELECT * FROM user1 WHERE Email ='$Email'";
	$sql2= "SELECT * FROM user1 WHERE Username ='$Username'";
	
	$sql3= "SELECT * FROM prisoner1 WHERE PRISONER_ID ='$number'";
		
	$result1 = mysqli_query($conn, $sql1);	
	$result2 = mysqli_query($conn, $sql2);
	$result3 = mysqli_query($conn, $sql3);
	
	if(mysqli_num_rows($result3)>0){
	
		if((mysqli_num_rows($result1) > 0 ) && (mysqli_num_rows($result2) > 0) ){
			phpAlert(    "Error While Registering!!\\n\\n An Email With Same Username Already Exist in The DATABASE"    );
		}
		else{
			if($password==$password2){		
					// && 	
					//}
					//else{
						$sql = $conn->query("INSERT INTO `user1`(Fname,Username,Email,Password,GENDER,MOBILE,PRISONER_ID,Relation)
					Values('{$Fname}','{$Username}','{$Email}','{$password}','{$gender}','{$MOBILE}','{$number}',
					'{$Relation}')");
				header('Location: LogIn.php');
			}
			else{
			phpAlert(    "Error While Registering!!\\n\\n Your Password Does Not Match"    );		

			}
		}
	}else{
		phpAlert(    "Error While Registering!!\\n\\n No Such Prisoner Exists"    );		

	}
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
<link href="css/tableoutside.css" rel="stylesheet" type="text/css"/>

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
      <div id="contentLeft">
	  <table width="100%" align="left" cellpadding="11px">
			    <tbody>
			      <tr>
			        <td><a href="registerview.php" title="view">⟢ View Prisoner ID</a></td>
		          </tr>
		           <tr>
			        <td height="620"></td>
		          </tr>
		          
			   
  
      </table>
	  </div>
	  <div id="contentRight" align="center">
   <form name="form1" method="post" action="">
    
      <table width="48%" border="0" align="center"  id="tableout">
      <tbody>
       <tr style="text-align: center; font-size: 18px; color: #666666;">
							  <td colspan="2" nowrap="nowrap">REGISTER FOR NEW VISITOR</td>
						  </tr>
        <tr>
          <td width="216">
            <label for="Fname">Fname:</label>
          </td>
          <td width="302">
            <input name="Fname" type="text" required class="StyleTextField" id="Fname">
          </td>
        </tr>
        <tr>
          <td width="216">
            <label for="Username">UserName:</label></td>
          <td><input name="Username" type="text" required class="StyleTextField" id="Username"></td>
        </tr>
        <tr>
          <td>Gender:</td>
          <td><input type="radio" name="radio" id="radio" value="Male">
            <label for="radio">Male
          <input type="radio" name="radio" id="radio" value="Female"> 
          Female </label></td>
        </tr>
        <tr>
          <td><label for="Email">Email:
          </label></td>
          <td><input name="Email" type="email" required class="StyleTextField" id="Email"></td>
        </tr>
        <tr>
          <td>
            <label for="password">Password:</label>
          </td>
          <td><label for="password2">
            <input name="password" type="password" required class="StyleTextField" id="password">
          </label></td>
        </tr>
        <tr>
          <td>Confirm Password:</td>
          <td><input name="password2" type="password" required class="StyleTextField" id="password2"></td>
        </tr>
        <tr>
          <td>Mobile:</td>
          <td><input name="MOBILE" type="number" required="required" class="StyleTextField" id="MOBILE" max="9999999999" min="1000000000"></td>
        </tr>
        <tr>
          <td>Prisoner ID:</td>
          <td><input name="number" type="number" required="required" class="StyleTextField" id="number"></td>
        </tr>
        <tr>
          <td>Relation:</td>
          <td><input name="Relation" type="text" required="required" class="StyleTextField" id="Relation"></td>
        </tr>
        <tr>
          <td colspan="2"><button class="button" style="vertical-align:middle" type="submit" name="submit" id="submit" value="Submit"><span>Register </span></button></td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
   </form>
  </div>
</div>
</body>
</html>
