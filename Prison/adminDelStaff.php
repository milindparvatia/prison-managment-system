<?php
require 'connection.php'; 
require 'AlertMsg.php';
	session_start();
	if(isset($_SESSION["SUPERID"])){
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);
				
	   if(isset($_POST['submit']))
	   {	
		   
		  $STID=$_POST['PRISONER_ID'];
		//$EMAIL=$_POST['EMAIL'];	
		   $sql3= "select STID from staff WHERE STID=$STID";
			$result3 = mysqli_query($conn, $sql3);
			if(mysqli_num_rows($result3)>0){
		
				$sql = $conn->query("DELETE FROM `staff` WHERE `staff`.`STID`= '$STID'"); 
				phpAlert(   "You Have Successfully Delete a Staff Member"   );	
		}else{
							phpAlert(   "Error !!\\n\\n No Such STAFF ID Exists!!"   );
					
				}
	}
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
	    			<li id="Logo"><a href="AdminAccount.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a>		  		</ul>
  </nav>
</div>
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
			    <table width="95%" id="customers" cellpadding="11px">
			      <tbody>
			        <tr>
			          <td colspan="2">plz enter the data for the STAFFS</td>
		            </tr>
			        <tr>
			          <td><label for="textfield">STAFF id:</label></td>
			          <td><input name="PRISONER_ID" type="text" autofocus="autofocus" required="required" class="StyleTextField" id="PRISONER_ID"></td>
		            </tr>
			        <tr>
			          <td><button class="button" style="vertical-align:middle" type="submit" name="submit" id="submit" value="Submit"><span>Submit </span></button></td>
			          <td>&nbsp;</td>
		            </tr>
		          </tbody>
		        </table>
			  </form>
	    </div>
	  </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
