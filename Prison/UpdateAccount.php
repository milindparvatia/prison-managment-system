
<?php
require 'connection.php'; 
require 'AlertMsg.php';
session_start();
if(isset($_SESSION["UserID"])){
	
}else{
	header('location: LogIn.php');
}
?>

<?php
	$User= $_SESSION["UserID"];
	
	$result = $conn-> query("select * from user1 where UserID='$User'");
	
		$row = $result ->fetch_array(MYSQLI_BOTH);
	

	
	$_SESSION["Fname"]= $row['Fname'];
	$_SESSION["Username"]= $row['Username'];
	$_SESSION["Email"]= $row['Email'];
	$_SESSION["Password"]= $row['Password'];
	$_SESSION["PRISONER_ID"]= $row['PRISONER_ID'];
	$_SESSION["MOBILE"]= $row['MOBILE'];
	$_SESSION["Relation"]= $row['Relation'];
?>

<?php
	if(isset($_POST['Update'])){
		$_UpdateFname = $_POST['Fname'];
		$_UpdateEmail = $_POST['Email'];
		$_UpdateUsername = $_POST['Username'];
		$_Updatepassword = $_POST['Password'];
		
		$sql = $conn->query("UPDATE user1 SET Fname = '{$_UpdateFname}',Email = '{$_UpdateEmail}',Username = '{$_UpdateUsername}',Password = '{$_Updatepassword}' WHERE UserID='$User' ");
		
		phpAlert(   "You Have Successfully Update Your Info"   );
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
					<li><a href="LogOut.php" title="Logout">Logout</a></li>
					<li><a href="UpdateAccount.php" title="My Info">My Info</a></li>
	  				<li id="Logo"><a href="Account.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a>		
	 </ul>
  </nav>
</div>
  <div id="Content">
    <div id="contentLeft">
				<table width="100%" align="left" cellpadding="11px">
				  <tbody>
				    
				     <tr>
			        <td><a href="Account.php" title="home">⟢ Home</a></td>
		          </tr>
				    
				    
				    <tr>
				      <td><a href="AccountGrants.php" title="Check Visit Status">⟢ <strong style="font-size: 18px; text-align: left;">Check Visit Status</strong></a></td>
			        </tr>
			        		           <tr>
			        <td height="500"></td>
		          </tr>
				    
			      </tbody>
			  </table>
				<h2>&nbsp;</h2>
			</div>
    <div id="contentRight" align="center">
      <form action="" style="StyleTextField" id="form1" name="form1" method="post" >
        <table width="54%" border="0" id="tableout">
          <tbody>
            <tr>
              <td colspan="2">Your information</td>
            </tr>
            <tr>
              <td><p>
                <label for="Fname">Fname:</label>
              </p></td>
              <td><input name="Fname" type="text" autofocus required class="StyleTextField" id="Fname" value="<?php echo $_SESSION["Fname"]= $row["Fname"]; ?>"></td>
            </tr>
            <tr>
              <td><p>
                <label for="Username">UserName:</label>
              </p></td>
              <td><input name="Username" type="text" required class="StyleTextField" id="Username" value="<?php echo $_SESSION["Username"]= $row['Username']; ?>"></td>
            </tr>
            <tr>
              <td><label for="Email">Email:</label></td>
              <td><input name="Email" type="email" required class="StyleTextField" id="Email" value="<?php echo $_SESSION["Email"]= $row['Email']; ?>"></td>
            </tr>
            <tr>
              <td><p>
                <label for="password">Password:</label>
              </p></td>
              <td><input name="Password" type="password" required class="StyleTextField" id="Password" value="<?php echo $_SESSION["Password"]= $row['Password']; ?>"></td>
            </tr>
            <tr>
              <td>Mobile</td>
              <td><input name="number2" type="number" required class="StyleTextField" id="MOBILE" value="<?php echo $_SESSION["MOBILE"]= $row['MOBILE']; ?>"></td>
            </tr>
            <tr>
              <td>Prisoner ID</td>
              <td><input name="number" type="number" required class="StyleTextField" id="PRISONER_ID" value="<?php echo $_SESSION["PRISONER_ID"]= $row['PRISONER_ID']; ?>" readonly="readonly"></td>
            </tr>
            <tr>
              <td>Relation</td>
              <td><input name="textfield" type="text" required class="StyleTextField" id="Relation" value="<?php echo $_SESSION["Relation"]= $row['Relation']; ?>"></td>
            </tr>
            <tr>
              <td style="text-align: center"><button class="button" style="vertical-align:middle" type="submit" name="Update" id="Update" value="Update"><span>Update </span></button></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
&nbsp;
</body>
</html>
