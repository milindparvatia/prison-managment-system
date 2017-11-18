<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["UserID"])){
		$a=$_SESSION["UserID"];
		$NAME="SELECT Fname FROM user1 where UserID=$a";
		$result = mysqli_query($conn,$NAME);
	}
	else{
	header('location: LogIn.php');
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
			        <td><a href="Account.php" title="home">⟢ Home</a></td>
		          </tr>
				    
				    
				    <tr>
				      <td><a href="AccountGrants.php" title="Check Visit Status">⟢ <strong style="font-size: 18px; text-align: left;">⟢ Check Visit Status</strong></a></td>
			        </tr>
				     <tr>
			        <td height="500"></td>
		          </tr>
			      </tbody>
			  </table>
				<h2>&nbsp;</h2>
			</div>
			<div id="contentRight">
			 <table id="customers" width="104%" cellpadding="0">
  <tbody >
    <tr>
      <td colspan="8"><h3> HERE ARE THE DETAILS OF INMATE YOU WANT TO VISIT(P.S. YOU WOULD SEE THE DETAILS ONLY IF ADMIN GRANTS YOU THE PERMISSION TO VISIT)</h3></td>
      </tr>
    <tr>
      <td width="12%"><p>PRISONER</p>
        <p>ID</p></td>
      <td width="14%">PNAME</td>
      <td width="14%">DOB</td>
      <td width="15%"><p>RELEASE DATE</p></td>
      <td width="16%"><p>ADMISSION DATE</p></td>
      <td width="11%"><p>WORK ID</p></td>
      <td width="10%"><p>JAIL ID</p></td>
      <td width="8%"><p> CELL ID</p></td>
    </tr>
    
    <?php
	  $b=$_SESSION["UserID"];
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
	</div>
	
</body>
</html>