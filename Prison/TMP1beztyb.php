<?php
require 'connection.php';
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["UserID"])){
		$a=$_SESSION["UserID"];
		
		
		$pid="SELECT PRISONER_ID FROM user1 where UserID=$a";
		$NAME="SELECT Fname FROM user1 where UserID=$a";
		$Rela="SELECT Relation FROM user1 where UserID=$a";
		
		
		$result = mysqli_query($conn, $NAME);
		$resultname = mysqli_query($conn,$NAME);
		if (mysqli_num_rows($resultname)>0) {
		if($row = mysqli_fetch_assoc($resultname)){	
				  	
				$fname=$row["Fname"];
		}
		}
		
		$resultname1 = mysqli_query($conn,$pid);
		if (mysqli_num_rows($resultname1)>0) {
		if($row = mysqli_fetch_assoc($resultname1)){	
			
				$Pid=$row["PRISONER_ID"];
		}
		}
		
		$resultname2 = mysqli_query($conn, $Rela);
		if (mysqli_num_rows($resultname2)>0) {
		if($row = mysqli_fetch_assoc($resultname2)){	
				  	
				$rela=$row["Relation"];
		}
		}
		if(isset($_POST['Submit'])){
		
		
		
		$sql2=$conn->query("INSERT INTO `permission` (`UserID`, `Fname`, `PRISONER_ID`, `Relation`, `ACCESS`) VALUES ('{$a}','{$fname}','{$Pid}','{$rela}', NULL)");
			
			phpAlert(   "Your Request Has Been Sent Successfully\\n\\n You Can View Your Granted Request in Check Status"   );
		}
		
		
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
			if (mysqli_num_rows($result) > 0) {
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
				      <td><a href="AccountGrants.php" title="Check Visit Status">⟢ <strong style="font-size: 18px; text-align: left;">Check Visit Status</strong></a></td>
			        </tr>
			         <tr>
			        <td height="600"></td>
		          </tr>
				    
			      </tbody>
			  </table>
				<h2>&nbsp;</h2>
			</div>
			<div id="contentRight">
			 <form action="" id="form1" name="form1" method="post" >
			  	<table width="100%" border="0" cellpadding="0px">
					  <tbody>
						<tr>
						  <td width="42%" style="font-size: 36px">Request For A Visit</td>
						  <td width="58%"><button class="button" style="vertical-align:middle" name="Submit" type="submit" id="Submit" value="Submit"><span>YES!!</span></button>
						  </td>
						</tr>
						<tr>
						  <td>
							
						  </td>
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