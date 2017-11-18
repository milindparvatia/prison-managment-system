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
			  <table width="96%" align="center" cellpadding="0" id="customers">
  <tbody>
    <tr>
      <td align="center" height="30" colspan="11"><strong><em>
        <h3>Total Visitors Are As Below</h3></em></strong></td>
    </tr>
    <tr>
      <td width="12%" height="37"><p>VISITOR ID</p></td>
      <td width="15%">NAME</td>
      <td width="11%">EMAIL ID</td>
      <td width="14%"><p>Username</p></td>
      <td width="15%"><p>Relation</p></td>
      <td width="14%"><p>GENDER</p></td>
      <td width="14%"><p>Password</p></td>
      <td width="14%"><p>Mobile</p></td>
      <td width="16%"><p>PRISONER_ID</p></td>
      </tr>
    
    <?php
	 $res=mysqli_query($conn,"select * from user1");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
    <tr class="StyleTextField">
      <td height="32"><?php echo $row["UserID"]; ?></td>
      <td><?php echo $row["Fname"]; ?></td>
      <td><?php echo $row["Email"]; ?></td>
      <td><?php echo $row["Username"]; ?></td>
      <td><?php echo $row["Relation"]; ?></td>
      <td><?php echo $row["GENDER"]; ?></td>
      <td><?php echo $row["Password"]; ?></td>
      <td><?php echo $row["MOBILE"]; ?></td>
      <td><?php echo $row["PRISONER_ID"]; ?></td>
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
