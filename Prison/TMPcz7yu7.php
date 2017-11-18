<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"test1");
// Check connection
session_start();
if(isset($_SESSION["UserID"])){
	
}else{
	header('location: LogIn.php');
}
?>

<?php
	$User= $_SESSION["UserID"];
	
	$result = $conn-> query("select * from user where UserID='$User'");
	
		$row = $result ->fetch_array(MYSQLI_BOTH);
	

	
	$_SESSION["Fname"]= $row['Fname'];
	$_SESSION["Lname"]= $row['Lname'];
	$_SESSION["Username"]= $row['Username'];
	$_SESSION["Email"]= $row['Email'];
	$_SESSION["password"]= $row['Password'];
	

?>

<?php
	if(isset($_POST['Update'])){
		$_UpdateFname = $_POST['Fname'];
		$_UpdateLname = $_POST['Lname'];
		$_UpdateEmail = $_POST['Email'];
		$_UpdateUsername = $_POST['Username'];
		$_Updatepassword = $_POST['password'];
		
		$sql = $conn->query("UPDATE user SET Fname = '{$_UpdateFname}', Lname = '{$_UpdateLname}',Email = '{$_UpdateEmail}',Username = '{$_UpdateUsername}',Password = '{$_Updatepassword}' WHERE UserID='$User' ");
		
			

}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/Layout.css" rel="stylesheet" type="text/css" />
<link href="css/Menu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.StyleTextField{}.StyleTextField1 {}
</style>
<title>Prison Managment</title>
</head>

<body>
<div class="StyleTextField" id="Holder">
  <div id="Header"></div>
  <div id="Navbar">
    <nav>
      <ul>
        <li><a href="Account.php" title="My Account">My Account</a></li>
        <li><a href="LogOut.php" title="Logout">Logout</a></li
					
				
      </ul>
    </nav>
  </div>
  <div id="Content">
    <div id="PageHeading">
      <h1>Page Heading</h1>
    </div>
    <div id="contentLeft">
      <h2>your massage here</h2>
      <h6><br />
        your massage</h6>
    </div>
    <div id="contentRight" align="center">
      <form action="" style="StyleTextField" id="form1" name="form1" method="post" >
        <table width="400" border="0">
          <tbody>
            <tr>
              <td><p>
                <label for="Fname">Fname:</label>
              </p>
                <p>
                  <input name="Fname" type="text" class="StyleTextField" id="Fname" value="<?php echo $_SESSION["Fname"]= $row["Fname"]; ?>">
                </p></td>
              <td><p>
                <label for="Lname">Lname:</label>
              </p>
                <p>
                  <input name="Lname" type="text" class="StyleTextField" id="Lname" value="<?php echo $_SESSION["Lname"]= $row['Lname']; ?>">
                </p></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><p>
                <label for="Username">UserName:</label>
              </p>
                <p>
                  <input name="Username" type="text" class="StyleTextField" id="Username" value="<?php echo $_SESSION["Username"]= $row['Username']; ?>">
                </p></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label for="Email">Email:<br>
                <br>
              </label>
                <input name="Email" type="email" class="StyleTextField" id="Email" value="<?php echo $_SESSION["Email"]= $row['Email']; ?>"></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><p>
                <label for="password">Password:</label>
              </p>
                <p>
                  <input name="password" type="password" class="StyleTextField" id="password" value="<?php echo $_SESSION["password"]= $row['password']; ?>">
                </p></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input name="Update" type="submit" class="StyleTextField" id="Update" value="Update" ></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <div id="Footer"></div>
</div>
&nbsp;
</body>
</html>
