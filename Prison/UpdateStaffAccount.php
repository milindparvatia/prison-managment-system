<?php
require 'connection.php'; 
require 'AlertMsg.php';
session_start();
if(isset($_SESSION["STID"])){
	
}else{
	header('location: StaffLogIn.php');
}
?>

<?php
	$User=$_SESSION["STID"];
	
	$result = $conn-> query("select * from staff where STID='$User'");
	
		$row = $result ->fetch_array(MYSQLI_BOTH);

	$_SESSION["SNAME"]= $row['SNAME'];
	$_SESSION["JAIL_ID"]= $row['JAIL_ID'];
	$_SESSION["EMAIL"]= $row['EMAIL'];
	$_SESSION["Password"]= $row['Password'];
?>

<?php
	if(isset($_POST['Update'])){
		$_UpdateFname = $_POST['SNAME'];
		$_UpdateLname = $_POST['JAIL_ID'];
		$_UpdateEmail = $_POST['EMAIL'];
		$_Updatepassword = $_POST['Password'];
		
		$sql = $conn->query("UPDATE staff SET SNAME = '{$_UpdateFname}', JAIL_ID = '{$_UpdateLname}',EMAIL = '{$_UpdateEmail}',Password = '{$_Updatepassword}' WHERE STID='$User'");
		
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
					<li><a href="StaffLogOut.php" title="Logout">Logout</a></li>
	    			<li><a href="UpdateStaffAccount.php" title="My Info">My Info</a></li>
					<li id="Logo"><a href="StaffAccount.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a></li>	</ul>
  </nav>
</div>
  <div id="Content">
   	<div id="contentLeft">
			  <table width="100%" cellpadding="11px">
			    <tbody>
			      <tr>
			        <td><a href="StaffAccount.php" title="home">⟢ Home</a></td>
		          </tr>
			      <tr>
			        <td><a href="StaffViewPrisoner.php" title="view prisoner">⟢ View Prisoner</a></td>
		          </tr>
			      <tr>
			        <td><a href="StaffViewStaff.php" title="view staff">⟢ View Staff</a></td>
		          </tr>
		        
			    <tr>
			      <td><a href="StaffViewVisitor.php">⟢ View Visitor</a></td>
		        </tr>
			    <tr>
			      <td><a href="StaffViewMedical.php" title="MEDICAL">⟢ Medical Details</a>
			    </tr>
			    <tr>
			      <td><a href="StaffAddMedical.php" title="addMEDICAL">⟢ Add Medical Details</a>
			    </tr>
			    <tr>
			      <td><a href="StaffViewWork.php" title="MEDICAL">⟢ View Work</a>
			    </tr>
  </tbody>
  
			    </table>
			</div>
    <div id="contentRight" align="center">
      <form action="" style="StyleTextField" id="form1" name="form1" method="post" >
        <table width="54%" border="0" id="tableout">
          <tbody>
            <tr>
              <td colspan="2"><h1>Your infromation</h1></td>
            </tr>
            <tr>
              <td width="31%" style="text-align: center"><label for="textfield">staff Name:</label></td>
              <td><input name="SNAME" type="text" required="required" class="StyleTextField" id="SNAME" value="<?php echo $_SESSION["SNAME"]= $row["SNAME"]; ?>"></td>
            </tr>
            <tr>
              <td style="text-align: center">Email:</td>
              <td><input name="EMAIL" type="email" required="required" class="StyleTextField" id="EMAIL" value="<?php echo $_SESSION["EMAIL"]= $row['EMAIL']; ?>"></td>
            </tr>
            <tr>
              <td style="text-align: center"><label></label>
                <label for="PASSWORD">PASSWORD:</label></td>
              <td><input name="Password" type="password" required="required" class="StyleTextField" id="Password" value="<?php echo $_SESSION["Password"]= $row['Password']; ?>"></td>
            </tr>
            <tr>
              <td style="text-align: center"><label for="textfield3">Jail ID:</label></td>
              <td><input name="JAIL_ID" type="text" required="required" class="StyleTextField" id="JAIL_ID" value="<?php echo $_SESSION["JAIL_ID"]= $row['JAIL_ID']; ?>" readonly="readonly"></td>
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
