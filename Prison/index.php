<?php
require 'connection.php'; 
require 'AlertMsg.php';
session_start();
$sql="SELECT PRISONER_ID FROM prisoner1 ORDER BY PRISONER_ID";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }

$sql1="SELECT JAIL_ID FROM prison ORDER BY JAIL_ID";

if ($result1=mysqli_query($conn,$sql1))
  {
  // Return the number of rows in result set
  $rowcount1=mysqli_num_rows($result1);
  // Free result set
  mysqli_free_result($result1);
  }

mysqli_close($conn);

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
	.StyleTextField{}.StyleTextField1 {}.bg{}
</style>

<title>Prison Managment</title>
</head>

<body>

	 
<div  id="Holder" class="bg">
<div id="Navbar">
  <nav>			<ul>
					<li><a href="Register.php" title="New Registration">New Registration</a></li>
					<li><a href="LogIn.php">Visitor</a></li>
					<li><a href="ContactUS.php" target="contact us">Contact US</a></li>	
				
					<div id="dropbtn" class="dropdown">
								  <button class="dropbtn">Employee Login⮟</button>
								  <div class="dropdown-content">
									<a href="AdminLogIn.php">Admin</a>
									<a href="StaffLogIn.php">Staff</a>
								</div>
								</div>
					<li id="Logo"><a href="index.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a></li>
				</ul>
			</nav>
		</div>
	  <div id="Content">
		<div>
		  <h1>&nbsp;</h1>
          <h1>
            <ul>
              <ul>
                <span style="color: #FFFFFF">VISIT BOOKING MADE EASY</span>.
                </li>
              </ul>
              <p>&nbsp;</p>
              <ul>
                <span style="color: #FFFFFF">NATION WIDE INTEGRATED INFORMATION ABOUT INMATES.</span>
<ul>
              <ul>
              </ul>
                </ul>
                  <ul>
                    <p>&nbsp;</p>
                  </ul>
                </li>
                
              </ul>
            </ul>
          </h1>
        </div>
		<div>
				<table width="100%" height="108">
  <tbody align="center">
    <tr>
      
      <td class="drop" width="33%" bgcolor="#00cc00"><H3>Prisons On-Board</H3></p><p><?php echo($rowcount1);?></p></td>
      <td class="drop" width="33%" bgcolor="#00cc00"><H3>Total Prisoner</H3></p><p><?php echo($rowcount);?></p></td>
    </tr>
    </tbody>
</table>

		</div>
      </div>
	  5
		<div id="Footer">
		 
		</div>
</div>
	
</body>
</html>
