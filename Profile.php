<?php
// profile.php - profile Page 
// Written by:  sayed haque
// Output
	include('session.php');
	include('check_logon.php');
	include('menubar.php');
	include('header.php');
	//include('bcs350_mysqli_connect.php');
	include('FSC_connect.php');

	//include('Supabase_connect.php');`,``, ``, ``, ``, ``
	while(list($User_id, $F_Name, $L_Name, $User_Name, $Pass_Code, $Role, $Year,$Major , $Email , $Phone, $Date, $Status  ) = mysqli_fetch_row($result)
) { 
echo " <table style='position: relative;
align-items: center;
margin: auto; background-color: #FAF0E6' width='550' align='center' rules='all' border='frame' cellpadding='2'>

<tr><td width='30%'>First Name</td><td>$F_Name</td>
<tr><td width='30%'>Last Name </td><td>$L_Name</td>
<tr><td width='30%'>User_Name   </td><td>$User_Name </td>
<td><a href='update.php?r=user_name_change'><button style='background-color: #32CD32'>UPDATE</button></a></td></tr>
<tr><td width='30%'>PassWord </td><td>$Pass_Code</td>
<td><a href='update.php?r=pass_code_change'><button style='background-color: #32CD32'>UPDATE</button></a></td></tr><br>
<tr><td width='30%'>Role </td><td> $Role</td></tr><br>
<tr><td width='30%'>Major </td><td>$Major</td></tr><br>
<tr><td width='30%'>Year </td><td>$Year</td></tr><br>
<tr><td width='30%'>Email </td><td>$Email</td></tr><br>
<tr><td width='30%'>Phone </td><td>$Phone</td></tr><br>
<tr><td width='30%'>Date </td><td>$Date</td></tr><br>";
}

echo"</table><br>";

	echo "<p align='center'>This is the User Page
		  <p align='center'>Only User and Admin can access this page, LOGON is required";
	include('footer.php');
?>