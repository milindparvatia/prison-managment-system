<?php
require 'connection.php'; 
require 'AlertMsg.php';
session_start();
if(isset($_SESSION["SUPERID"])){
	
}else{
	header('location:AdminLogIn.php');
}
?>

<?php
	$User= $_SESSION["SUPERID"];
	
	$result = $conn-> query("select * from super_user where SUPERID='$User'");
	
		$row = $result ->fetch_array(MYSQLI_BOTH);
	

	
	$_SESSION["SUPER_NAME"]= $row['SUPER_NAME'];
	$_SESSION["MOBILE_NO"]= $row['MOBILE_NO'];
	$_SESSION["JAIL_ID"]= $row['JAIL_ID'];
	$_SESSION["WORK_ID"]= $row['WORK_ID'];
	$_SESSION["EMAIL"]= $row['EMAIL'];
	$_SESSION["PASSWORD"]= $row['PASSWORD'];
?>

<?php
	if(isset($_POST['Update'])){
		$_UpdateSname = $_POST['SUPER_NAME'];
		$_UpdateMobile = $_POST['MOBILE_NO'];
		$_UpdateEmail = $_POST['EMAIL'];
		$_UpdateJid = $_POST['JAIL_ID'];
		$_UpdateWid = $_POST['WORK_ID'];
		$_Updatepassword = $_POST['PASSWORD'];
		
		$sql = $conn->query("UPDATE super_user SET SUPER_NAME = '{$_UpdateSname}', MOBILE_NO = '{$_UpdateMobile}',EMAIL = '{$_UpdateEmail}',JAIL_ID = '{$_UpdateJid}',WORK_ID = '{$_UpdateWid}',PASSWORD = '{$_Updatepassword}' WHERE SUPERID='$User' ");
		
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
		<li><a href="AdminLogOut.php" title="Logout">Logout</a></li>
	    <li><a href="UpdateAdminAccount.php" title="My Info">My Info</a></li>
	  <li id="Logo"><a href="AdminAccount.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a>
	</ul>
  </nav>
</div>
  <div id="Content">
<div id="contentLeft">
	  <table width="100%" align="left" cellpadding="11px">
			    <tbody>
			      <tr>
			        <td><a href="AdminAccount.php" title="home">⟢ Home</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminAddPrisoner.php" title="add prisoner">⟢ Add New Prisoner</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminViewPrisoner.php" title="view prisoner">⟢ View All Prisoner</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminDelPrisoner.php" title="del prisoner">⟢ Del Prisoner</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminAddStaff.php" title="add staff">⟢ Add New Staff</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminViewStaff.php" title="view staff">⟢ View All Staff</a></td>
		          </tr>
		          <td><a href="adminDelStaff.php" title="del staff">⟢ Del Staff</a></td>
			        </tr>
			    <tr>
			      <td><a href="adminViewVisitor.php">⟢ View All Visitor</a></td>
		        </tr>
			    <tr>
			      <td><p><a href="adminGrants.php" title="grant permission to visitor">⟢ Grant a Permission to Visitor</a></p></td>
		        </tr>
			    <tr>
			      <td><a href="adminDelVisitor.php" title="del visitor">⟢ Del Visitor</a></td>
		        </tr>
		        <tr>
		        	<td><a href="adminViewCell.php">⟢ View All Cell</a></td>
		        </tr>
  
      </table>
			  <h2>&nbsp;</h2>
	</div>
    <div id="contentRight" align="center">
      <form action="" style="StyleTextField" id="form1" name="form1" method="post" >
        <table width="54%" border="0" id="tableout">
          <tbody>
            <tr>
              <td colspan="2"><h1>Your information</h1></td>
            </tr>
            <tr>
              <td><p>
                <label for="Fname">Name:</label>
              </p></td>
              <td><input name="SUPER_NAME" type="text" autofocus required class="StyleTextField" id="SUPER_NAME" value="<?php echo $_SESSION["SUPER_NAME"]= $row["SUPER_NAME"]; ?>"></td>
            </tr>
            <tr>
              <td><p>
                <label for="Username">MOBILE:</label>
              </p></td>
              <td><input name="MOBILE_NO" type="text" required class="StyleTextField" id="MOBILE_NO" value="<?php echo $_SESSION["MOBILE_NO"]= $row['MOBILE_NO']; ?>"></td>
            </tr>
            <tr>
              <td>Work Id</td>
              <td><input name="WORK_ID" type="text" required class="StyleTextField" id="WORK_ID" value="<?php echo $_SESSION["WORK_ID"]= $row['WORK_ID']; ?>"></td>
            </tr>
            <tr>
              <td>Jail Id</td>
              <td><input name="JAIL_ID" type="text" required class="StyleTextField" id="JAIL_ID" value="<?php echo $_SESSION["JAIL_ID"]= $row['JAIL_ID']; ?>" readonly="readonly"></td>
            </tr>
            <tr>
              <td><label for="Email">EMAIL:</label></td>
              <td><input name="EMAIL" type="email" required class="StyleTextField" id="EMAIL" value="<?php echo $_SESSION["EMAIL"]= $row['EMAIL']; ?>"></td>
            </tr>
            <tr>
              <td><p>
                <label for="password">Password:</label>
              </p></td>
              <td><input name="PASSWORD" type="password" required class="StyleTextField" id="PASSWORD" value="<?php echo $_SESSION["PASSWORD"]= $row['PASSWORD']; ?>"></td>
            </tr>
            <tr>
              <td style="text-align: center"><button class="button" style="vertical-align:middle" type="submit" name="Update" id="Update" value="Update"><span>Update </span></button></td>
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
