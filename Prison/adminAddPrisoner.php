<?php
require 'connection.php';
require 'AlertMsg.php'; 

	session_start();
	if(isset($_SESSION["SUPERID"])){
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);
		
		
					 
		 
		
	   if(isset($_POST['submit'])){
		//session_start();
		$PNAME=$_POST['PNAME'];
 		//$GENDER=$_POST['GENDER'];
		$DOB=$_POST['DOB'];
		$ADMISSION_DATE=$_POST['ADMISSION_DATE'];
		$RELEASE_DATE=$_POST['RELEASE_DATE'];
		$WORK_ID=$_POST['WORK_ID'];
		$JAIL_ID=$_POST['JAIL_ID'];
		$CELL_ID=$_POST['CELL_ID'];
		$CASETYPE=$_POST['CASETYPE'];
		   
		   

		$sql3= "select JAIL_ID from prison WHERE JAIL_ID=$JAIL_ID";
		$result3 = mysqli_query($conn, $sql3);
		if(mysqli_num_rows($result3)>0){
			
				
		$res1=mysqli_query($conn,"select CCAPACITY from prison WHERE JAIL_ID=$JAIL_ID");
		while($row=mysqli_fetch_array($res1))
		{
			
		   $ABC=$row["CCAPACITY"];
			
			if($ABC==0){
				phpAlert(   "You Can't Add a New Prisoner"   );
			}
			else{
							
						function ExecuteSetQuery($sql){
						$con = mysqli_connect ("localhost", "root","12@abcd@34","test1");
													// mysql_select_db ("mydb",$con);

						$result = mysqli_query($con, $sql) or die ("Query fail: ".mysqli_error($con));
						mysqli_close($con);
						return $result;
						} 

							$sql = "DROP TRIGGER IF EXISTS `count`;";
							$res = ExecuteSetQuery($sql);

							$sql = "CREATE TRIGGER `count` BEFORE INSERT ON `prisoner1`
							FOR EACH ROW
							BEGIN
							IF EXISTS (SELECT * FROM prison WHERE `JAIL_ID`=$_POST[JAIL_ID])
							THEN UPDATE prison SET CCAPACITY=CCAPACITY-1 WHERE `JAIL_ID`=$_POST[JAIL_ID];
							END IF;
							END
							";
							$res = ExecuteSetQuery($sql);
	
						if($ADMISSION_DATE>$DOB and $RELEASE_DATE>$DOB and $RELEASE_DATE>$ADMISSION_DATE){
								$sql = $conn->query("INSERT INTO `prisoner1` (`PRISONER_ID`, `PNAME`, `DOB`, `RELEASE_DATE`, `ADMISSION_DATE`, `WORK_ID`, `JAIL_ID`, `CELL_ID`,`CASETYPE`)			Values(NULL,'{$PNAME}','{$DOB}','{$RELEASE_DATE}','{$ADMISSION_DATE}','{$WORK_ID}','{$JAIL_ID}','{$CELL_ID}','{$CASETYPE}')");
							
							phpAlert(   "You Have Successfully Added a New Prisoner"   );
						}
						else{
							phpAlert(   "Error !!\\n\\n Please Check The Dates You Have Entered!!"   );
						}		
		   
					}
				 }
		}else{
							phpAlert(   "Error !!\\n\\n No Such JAIL ID Exists!!"   );
					
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
					  		
			echo $row["SUPER_NAME"];
		}}
	?>
</h2>
  </div>
	  
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
		  
		<div id="contentRight" align="center">
			  <form action="" style="StyleTextField" id="form1" name="form1" method="post" >
			    <table width="100%" id="customers" cellpadding="11px">
			      <tbody>
			        <tr>
			          <td colspan="2">plz enter the data for the prisoner</td>
		            </tr>
			        <tr>
			          <td><label for="textfield">Prisoner Name:</label></td>
			          <td><input name="PNAME" type="text" autofocus required="required" class="StyleTextField" id="PNAME"></td>
		            </tr>
			        <tr>
			          <td><label for="date">DOB:</label></td>
			          <td><input name="DOB" type="date" required="required" class="StyleTextField" id="DOB"></td>
		            </tr>
			        <tr>
			          <td><label for="date2">Admission Date:</label></td>
			          <td><label for="date2"></label>
			            <input name="ADMISSION_DATE" type="date" required="required" class="StyleTextField" id="ADMISSION_DATE"></td>
		            </tr>
			        <tr>
			          <td><label for="date3"> Release Date:</label></td>
			          <td><input name="RELEASE_DATE" type="date" required="required" class="StyleTextField" id="RELEASE_DATE"></td>
		            </tr>
			        <tr>
			          <td><label for="textfield2">Work ID:</label></td>
			          <td><input name="WORK_ID" type="text" required="required" class="StyleTextField" id="WORDID"></td>
		            </tr>
			        <tr>
			          <td><label for="textfield3">Jail ID:</label></td>
			          <td><label for="textfield3"></label>
			            <input name="JAIL_ID" type="text" required="required" class="StyleTextField" id="JAIL_ID"></td>
		            </tr>
			        <tr>
			          <td><label for="textfield4">Cell id:</label></td>
			          <td><input name="CELL_ID" type="text" required="required" class="StyleTextField" id="CELL_ID"></td>
		            </tr>
		            <tr>
			          <td><label for="textfield5">Casetype:</label></td>
			          <td><input name="CASETYPE" type="text" required="required" class="StyleTextField" id="CASETYPE"></td>
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
