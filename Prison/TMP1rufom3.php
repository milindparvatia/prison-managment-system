<?php
require 'connection.php';

session_id("session1");

session_start();

	if(isset($_SESSION["SUPERID"])){
		
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);
	}
	else{
		//header('location: AdminLogIn.php');
}
?>

<?php
if(isset($_GET['Update']))
{
	session_write_close();
	
	$res1=mysqli_query($conn,"select * from permission");
	while($row=mysqli_fetch_array($res1))
	{
				$_UserID=$row["UserID"];


				session_id("session2");

				session_start();


				$_SESSION["UserID"]=$_UserID;
				
				if(isset($_GET['radio'])){

					$gender=$_GET['radio'];
				}
		
				
	
						function ExecuteSetQuery($sql){
						$con = mysqli_connect ("localhost", "root","","test1");
													// mysql_select_db ("mydb",$con);

						$result = mysqli_query($con, $sql) or die ("Query fail: ".mysqli_error($con));
						mysqli_close($con);
						return $result;
						} 

							$sql = "DROP TRIGGER IF EXISTS `nanu`;";
							$res = ExecuteSetQuery($sql);

							$sql = "CREATE TRIGGER `nanu` AFTER UPDATE ON `permission`
							FOR EACH ROW
							BEGIN
							IF EXISTS (SELECT * FROM permission WHERE `UserID`=$_SESSION[UserID] AND `ACCESS`=$_GET[radio])
							THEN UPDATE `user1` SET `ACCESS`=$_GET[radio] WHERE `UserID`=$_SESSION[UserID];
							END IF;
							END
							";
							$res = ExecuteSetQuery($sql);
	
	$sql = $conn->query("UPDATE permission SET ACCESS = '{$gender}'");
	
	}
	
		
	session_write_close();
	session_id("session1");

	session_start();
	
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
<style>
	.StyleTextField{}.StyleTextField1 {}
</style>
<title>Prison Managment</title>
</head>

<body>
		<div class="StyleTextField" id="Holder">
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
  
      </table>
			  <h2>&nbsp;</h2>
	</div>
			<div id="contentRight" align="center">
			  <form action="" style="StyleTextField" id="form1" name="form1" method="get" >
			  <table width="95%" cellpadding="0" id="customers">
  <tbody>
    <tr>
      <td align="center" height="30" colspan="9"><strong><em>
        <h3>Total Visitors Are As Below</h3></em></strong></td>
    </tr>
    <tr>
      <td width="18%" height="37"><p>PERMISSIONID</p></td>
      <td width="17%">NAME</td>
      <td width="13%">UserID</td>
      <td width="15%"><p>Relation</p></td>
      <td width="19%"><p>ACCESS</p></td>
      <td width="18%"><p>PRISONER_ID</p></td>
      </tr>
    
    <?php
	 $res=mysqli_query($conn,"select * from permission");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
    <tr class="StyleTextField">
      <td height="32"><?php echo $row["PERMISSIONID"]; ?></td>
      <td><?php echo $row["Fname"]; ?></td>
      <td><?php echo $row["UserID"]; ?></td>
      <td><?php echo $row["Relation"]; ?></td>
      
      <td>
       
    
       
        <p>
         <?php echo $row['ACCESS']; ?>
          <label>
            <input type="checkbox" name="radio" value="1" <?php if($row['ACCESS']=="1") {echo "checked";}?> id="radio">
            yes</label>
          
          <label>
            <input type="checkbox" name="radio" value="0" <?php if($row['ACCESS']=="0") {echo "checked";}?> id="radio">
            no</label>
          <br>
          
          <div *ngFor="let option of question.options; index as j">
<input type="radio" name="option{{i}}" value="option{{i}}" (click)="checkAnswer(i+1)">{{option}}
</div>  
          
        </p></td>
      <td><?php echo $row["PRISONER_ID"]; ?></td>
      <?php 
	  }
	  ?>
	</tr>
      <tr class="StyleTextField">
      <td height="32" colspan="6"><button class="button" style="vertical-align:middle" type="submit" name="Update" id="Update" value="Update"><span>Update </span></button></td>
      
  	</tbody>
	</table>
</form>
	    </div>
	  </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
