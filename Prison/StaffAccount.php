<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();
	
if(isset($_SESSION["STID"])){
		$a=$_SESSION["STID"];
		$sqlname = "SELECT SNAME FROM staff where STID=$a";
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
	header('location: StaffLogIn.php');
}

	
?>


<!doctype html>
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
			<div id="PageHeading">
			  <h2>Hello 
  <?php
			if (mysqli_num_rows($resultname) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($resultname)) {	
					  		
			echo $row["SNAME"];
		}}
			?><br>
your account id <?php echo $_SESSION['STID']; ?></h2>
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
		<div id="contentRight">
		  <table>
		    <tbody>
		      <tr>
		        <td width="313"><blockquote>
		          <h3>&nbsp;</h3>
	            </blockquote></td>
	          </tr>
	        </tbody>
	      </table>
		  <br>
	    </div>
	  </div>
</div>
	</div>
	</div>
</body>
</html>
