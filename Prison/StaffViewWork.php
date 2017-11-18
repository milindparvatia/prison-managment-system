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
			    <tr>
			        <td height="600"<td>
		          </tr>
  </tbody>
  
  
		      </table>
			</div>
			<div id="contentRight" align="center">
			  <table id="customers" width="95%" cellpadding="0">
			    <tbody>
			      <tr>
			        <td colspan="8">your total prisoners are as below FOR cleaning</td>
		          </tr>
			      <tr>
			        <td width="49%"><p>PRISONER_ID</p></td>
			        <td width="51%">PNAME</td>
		          </tr>
			      <?php
	 $res=mysqli_query($conn,"SELECT PRISONER_ID,PNAME FROM prisoner1 NATURAL JOIN 	work_allotment WHERE WORK_ID IN(SELECT WORK_ID FROM work_allotment WHERE WTYPE='CLEANING')");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
			      <tr class="StyleTextField1">
			        <td><?php echo $row['PRISONER_ID']; ?></td>
			        <td><?php echo  $row['PNAME']; ?></td>
			      </tr>
			      <?php 
	  }
	  ?>
		        </tbody>
		      </table>
		    
	    </div>
	    <div id="contentRight" align="center">
			  <table id="customers" width="95%" cellpadding="0">
			    <tbody>
			      <tr>
			        <td colspan="8">your total prisoners are as below FOR labour</td>
		          </tr>
			      <tr>
			        <td width="49%"><p>PRISONER_ID</p></td>
			        <td width="51%">PNAME</td>
		          </tr>
			      <?php
	 $res=mysqli_query($conn,"SELECT PRISONER_ID,PNAME FROM prisoner1 NATURAL JOIN 	work_allotment WHERE WORK_ID IN(SELECT WORK_ID FROM work_allotment WHERE WTYPE='LABOUR')");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
			      <tr class="StyleTextField1">
			        <td><?php echo $row['PRISONER_ID']; ?></td>
			        <td><?php echo  $row['PNAME']; ?></td>
			      </tr>
			      <?php 
	  }
	  ?>
		        </tbody>
		      </table>
		    
	    </div>
	    
	    <div id="contentRight" align="center">
			  <table id="customers" width="95%" cellpadding="0">
			    <tbody>
			      <tr>
			        <td colspan="8">your total prisoners are as below FOR food</td>
		          </tr>
			      <tr>
			        <td width="49%"><p>PRISONER_ID</p></td>
			        <td width="51%">PNAME</td>
		          </tr>
			      <?php
	 $res=mysqli_query($conn,"SELECT PRISONER_ID,PNAME FROM prisoner1 NATURAL JOIN 	work_allotment WHERE WORK_ID IN(SELECT WORK_ID FROM work_allotment WHERE WTYPE='FOOD')");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
			      <tr class="StyleTextField1">
			        <td><?php echo $row['PRISONER_ID']; ?></td>
			        <td><?php echo  $row['PNAME']; ?></td>
			      </tr>
			      <?php 
	  }
	  ?>
		        </tbody>
		      </table>
		    
	    </div>
	  </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
