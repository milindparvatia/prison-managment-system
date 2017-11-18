<?php
require 'connection.php'; 
require 'AlertMsg.php';
session_start();
	
if(isset($_SESSION["STID"])){
		$a=$_SESSION["STID"];
		$sqlname = "SELECT SNAME FROM staff where STID=$a";
		$resultname = mysqli_query($conn, $sqlname);
		
	}
		
	else{
		
	header('location: StaffLogIn.php');
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
					<li><a href="StaffLogOut.php" title="Logout">Logout</a></li>
	    			<li><a href="UpdateStaffAccount.php" title="My Info">My Info</a></li>
					<li id="Logo"><a href="StaffAccount.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a></li>	  		</ul>
	</nav>
  </div>
	  <div id="Content">
			<div id="PageHeading"><h2>Hello 
  <?php
			if (mysqli_num_rows($resultname) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($resultname)) {	
					  		
			echo $row["SNAME"];
		}}
			?>
</h2>
    </div>
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
			    <table id="customers" width="95%" height="101" cellpadding="0px">
			      <tbody>
			        <tr>
			          <td height="32" colspan="4">your total prisoners are as below</td>
		            </tr>
			        <tr>
			          <td width="10%" height="30">STID</td>
			          <td width="26%">Staff Name</td>
			         
			          <td width="33%">Jail ID</td>
		            </tr>
			        <?php
					 $res=mysqli_query($conn,"select STID,SNAME,JAIL_ID from staff");
					  while($row=mysqli_fetch_array($res))
					  {
					 ?>
			        <tr>
			          <td><?php echo $row["STID"]; ?></td>
			          <td><?php echo $row["SNAME"]; ?></td>
			          
			          <td><?php echo $row["JAIL_ID"]; ?></td>
		            </tr>
			        <?php 
						}
					  	?>
		          </tbody>
		        </table>
			  </form>
	    </div>
	  </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
