<?php
require 'connection.php'; 

session_start();
	
	if(isset($_SESSION["UserID"])){
		$a=$_SESSION["UserID"];
		$NAME="SELECT Fname FROM user1 where UserID=$a";
		$result = mysqli_query($conn,$NAME);
	}
	else{
	//header('location: LogIn.php');
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
					<li><a href="LogOut.php" title="Logout">Logout</a></li>
					<li><a href="ContactUS.php" target="contact us">Contact US</a></li>
	    			<li><a href="UpdateAccount.php" title="My Info">My Info</a></li>
	    			<li id="Logo"><a href="Account.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a>
	    		</ul>
  </nav>
</div>
	  <div id="Content">
			<div id="PageHeading">
			  <h1>Hello 
			  <?php
			if(mysqli_num_rows($result) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($result)) {	
					  		
			echo $row["Fname"];
		}}
			?></h1></div>
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
  
      </table>
				<h2>&nbsp;</h2>
			</div>
			<div id="contentRight">
			 <table id="customers" width="104%" cellpadding="0">
  <tbody >
    <tr>
      <td colspan="8"><h3>Total Prisoner Are As Below</h3></td>
      </tr>
    <tr>
      <td width="11%">PRISONER_ID</td>
      <td width="15%">PNAME</td>
      <td width="14%">DOB</td>
      <td width="14%"><p>RELEASE</p>
        <p>_DATE</p></td>
      <td width="14%"><p>ADMISSION</p>
        <p>_DATE</p></td>
      <td width="12%"><p>WORK</p>
        <p>_ID</p></td>
      <td width="9%"><p>JAIL</p>
        <p>_ID</p></td>
      <td width="7%"><p>CELL</p>
        <p>_ID</p></td>
    </tr>
    
    <?php
	  $b=$_SESSION["UserID"];
	  echo($_SESSION["UserID"]);
	 $res=mysqli_query($conn,"select p.PRISONER_ID,p.PNAME,p.DOB,p.RELEASE_DATE,p.ADMISSION_DATE,p.WORK_ID,p.JAIL_ID,p.CELL_ID from prisoner1 p natural join user1 u where p.PRISONER_ID=u.PRISONER_ID AND u.ACCESS='1' AND u.UserID=$b");
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