<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();
	
	
	
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
			
			<div id="contentLeft">
	  <table width="100%" cellpadding="11px">
			    <tbody>
			      <tr>
			        <td><a href="Register.php" title="home">⟢ Home</a></td>
		          </tr>
			      <tr>
			        <td height="600"></td>
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
      
        
        
    </tr>
    
    <?php
	  
	 $res=mysqli_query($conn,"SELECT PRISONER_ID,PNAME FROM prisoner1");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
    <tr>
      <td><?php echo $row["PRISONER_ID"]; ?></td>
      <td><?php echo $row["PNAME"]; ?></td>
      
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
