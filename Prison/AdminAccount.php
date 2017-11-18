<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["SUPERID"])){
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);
		
		
		
		
//sql = "SELECT Fname FROM User";
//		$result = mysqli_query($conn, $sql);

		//if (mysqli_num_rows($result) > 0) {
		// output data of each row
//	if(row = mysqli_fetch_assoc($result)) {
//echo $row["Fname"];
//
	//}
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

<style type="text/css">.StyleTextField{}</style>
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
			<div id="contentRight">
		  <form name="form1" method="post" action="">
		    <table id="customers" width="100%" border="0" cellpadding="0px">
		    <tbody>
		      <tr></tr>
		    </tbody>
            <tbody>
              <tr>
                <td colspan="6">All Prison Info</td>
              </tr>
              <tr>
               
               	<td width="18%">JAIL ID</td>
                <td width="22%">PRISONER CAPACITY</td>
                <td width="22%"><p>CURRENT CAPACITY</p></td>
                
                <td width="15%">TYPE</td>
                <td width="23%">CONTACT</td>
                <td width="23%">LOCATION</td>
              </tr>
              
                <?php
	 $res=mysqli_query($conn,"select p.PCAPACITY,p.JAIL_ID,p.PTYPE,p.CONTACT_NO,p.CCAPACITY,p.location from prison p ");
	  while($row=mysqli_fetch_array($res))
	  {
		 ?><tr>
               	<td><?php echo $row["JAIL_ID"]; ?></td>
                <td><?php echo $row["PCAPACITY"]; ?></td>
                <td><?php echo $row["CCAPACITY"]; ?></td>
                <td><?php echo $row["PTYPE"]; ?></td>
                <td><?php echo $row["CONTACT_NO"]; ?></td>
                <td><?php echo $row["location"]; ?></td>
                <?php 
	  }
	  ?>
              </tr>
            </tbody>
            <tbody>
            </tbody>
		    </table>
		  </form>
			           
    </div>
      </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
