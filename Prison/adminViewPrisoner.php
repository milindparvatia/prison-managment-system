<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["SUPERID"])){
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);
	}
	else{
	header('location: AdminLogIn.php');
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
					<li><a href="AdminLogOut.php" title="Logout">Logout</a></li>
	    			<li><a href="UpdateAdminAccount.php" title="My Info">My Info</a></li>
	    			<li id="Logo"><a href="AdminAccount.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a>		  		</ul>
  </nav>
	  <div id="Content">
			<div id="PageHeading"><h2>Hello 
        <?php
			if (mysqli_num_rows($resultname) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($resultname)) {	
					  		
			echo $row["SUPER_NAME"];
		}}
			?>
			</h2>
		</div>
			<div id="contentLeft">
	  <table width="100%" cellpadding="11px">
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
			  <table id="customers" width="104%" cellpadding="0">
  <tbody >
    <tr>
      <td colspan="11"><h3>Total Prisoners Are As Below</h3></td>
      </tr>
    <tr>
      <td width="11%">PRISONER_ID</td>
      <td width="15%">PNAME</td>
      <td width="14%">DOB</td>
      <td width="14%"><p>RELEASE_DATE</p></td>
      <td width="14%"><p>ADMISSION_DATE</p></td>
      <td width="12%"><p>WORK_ID</p></td>
      <td width="9%"><p>JAIL_ID</p></td>
      <td width="7%"><p>CELL_ID</p></td>
        
        <td width="14%"><p>CASETYPE</p></td>
    </tr>
    
    <?php
	  $a=$_SESSION["SUPERID"];
	 $res=mysqli_query($conn,"SELECT * FROM prisoner1");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
    <tr>
      <td><?php echo $row["PRISONER_ID"]; ?></td>
      <td><?php echo $row["PNAME"]; ?></td>
      <td><?php echo $row["DOB"]; ?></td>
      <td><?php echo $row["RELEASE_DATE"]; ?></td>
      <td><?php echo $row["ADMISSION_DATE"]; ?></td>
      <td><?php echo $row["WORK_ID"]; ?></td>
      <td><?php echo $row["JAIL_ID"]; ?></td>
      <td><?php echo $row["CELL_ID"]; ?></td>
      <td><?php echo $row["CASETYPE"]; ?></td>
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