<?php
require 'connection.php'; 
require 'AlertMsg.php';

	session_start();

if(isset($_SESSION["STID"])){
		$a=$_SESSION["STID"];
		$sqlname = "SELECT SNAME FROM staff where STID=$a";
		$resultname = mysqli_query($conn, $sqlname);
		
	   if(isset($_POST['submit'])){
	
		   
			$ILLNESS=$_POST['ILLNESS'];
			$PRISONER_ID=$_POST['PRISONER_ID'];
		   
		   $sql3= "SELECT * FROM prisoner1 WHERE PRISONER_ID ='$PRISONER_ID'";
		   
		   $result3 = mysqli_query($conn, $sql3);
		   
		   if(mysqli_num_rows($result3)>0){		   
		
			 $sql = $conn->query("INSERT INTO `medical` (`TREATMENT_ID`, `ILLNESS`, `PRISONER_ID`)			Values(NULL,'{$ILLNESS}','{$PRISONER_ID}')");
	   		}
		   else{
			   phpAlert(    "Error While Registering!!\\n\\n No such Prisoner Exists"    );		
		   }
	   }
}
	else{
	header('location: StaffLogin.php');
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
</div>
	  <div id="Content">
	    <div id="PageHeading">
	      <h2>Hello
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
			      <td><a href="StaffViewMedical.php" title="MEDICAL">⟢ View Medical Details</a>
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
			    <table width="100%" id="customers" cellpadding="11px">
			      <tbody>
			        <tr>
			          <td colspan="2">plz enter the data for the medical details of prisoner</td>
		            </tr>
			        <tr>
			          <td><label for="textfield">ILLNESS:</label></td>
			          <td><input name="ILLNESS" type="text" autofocus required="required" class="StyleTextField" id="ILLNESS"></td>
		            </tr>
			        <tr>
			          <td><label for="textfield">PRISONER_ID:</label></td>
			          <td><input name="PRISONER_ID" type="text" required="required" class="StyleTextField" id="PRISONER_ID"></td>
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
