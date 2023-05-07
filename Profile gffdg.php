
<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
    include('Supabase_connect.php');

?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="profile.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>

<?php



$query = 'SELECT * FROM "User" where "User_Name" = \'' . $user_name . '\'';
$result = pg_query($conn, $query);

// Check query result
if (!$result) {
  echo "Query Error [$query] " . pg_last_error($conn);
}



if (pg_num_rows($result) > 0) {
	$row = pg_fetch_assoc($result);
	$User_id = $row['User_id'];
	$F_Name = $row['F_Name'];
	$L_Name = $row['L_Name'];
	$user_name = $row['User_Name'];
	$Pass_Code = $row['Pass_Code'];
	$Role = $row['Role'];
	$Year = $row['Year'];
	$Major = $row['Major'];
	$Email = $row['Email'];
	$Phone = $row['Phone'];
	$Date = $row['created_at'];
	
echo" 	<section>
			<div class='containerr'>
			<h1>Account Profile</h1>
			<table>
			<tr><th colspan='2'>Profile</th></tr>
			<tr><td rowspan='3'><img src='profile-image.jpg' alt='Profile Image'></td>
				<th>Username</th><td>$user_name</td></tr>
			<tr><th>Password</th><td>$Pass_Code</td></tr>
			</table>
			<table>
			<tr><th colspan='2'>Personal Information</th></tr>
			<tr><th>First Name</th><td>$F_Name</td></tr>
			<tr><th>Last Name</th><td>$L_Name</td></tr>
			<tr><th>Major</th><td>$Major</td></tr>
			</table>
			<table>
			<tr><th colspan='2'>Account Information</th></tr>
			<tr><th>Role</th><td>$Role</td></tr>
			<tr><th>Year</th><td>$Year</td></tr>
			</table>
			<table>
			<tr><th colspan='2'>Contact Information</th></tr>
			<tr><th>Email</th><td>$Email</td></tr>
			<tr><th>Phone</th><td>$Phone</td></tr>
			<tr><th>Member Since</th><td>$Date</td></tr>
			</table>
			</div></section>";

}

echo"<br>";

	echo "<p align='center'>This is the User Page
		  <p align='center'>Only User and Admin can access this page, LOGON is required";
	include('footer.php');
?>