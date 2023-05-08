
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


require_once 'drive/vendor/autoload.php';

use Google\Client;
use Google\Service\Drive;
if(isset($_FILES['image'])) {
//if(isset($_POST['submit'])){
  try {
	  $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
	  $file_type = $_FILES['image']['type'];
	  if (!in_array($file_type, $valid_types)) {
		  throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
	  }
	  
	  $curl = curl_init();
	  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	  $client = new Client();
	  putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
	  $client->useApplicationDefaultCredentials();
	  $client->addScope(Drive::DRIVE);
	  $driveService = new Drive($client);
	  $fileMetadata = new Drive\DriveFile(array(
		  'name' => $_FILES['image']['name'],
		  'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
	  ));
	  $content = file_get_contents($_FILES['image']['tmp_name']);
	  $file = $driveService->files->create($fileMetadata, array(
		  'data' => $content,
		  'mimeType' => $file_type,
		  'uploadType' => 'multipart',
		  'fields' => 'id'
	  ));
	  $pro_pic = $file->id;
	  $message = "File uploaded successfully. $pro_pic";
  } catch(Exception $e) {
	  $message = "Error Message: ".$e->getMessage();
  } 
}

	if (isset($_GET['j']))					{$User_id = $_GET['j'];}

	if (isset($_POST['profile'])) {
		echo"xx $pro_pic  $User_id";
	echo"<input type='hidden' name='User_id' value='$User_id'> ";


	$query5 = 'UPDATE "User" SET "pro_pic" = \''.$pro_pic.'\' WHERE "User_id" = \'' . $User_id . '\'';
	$result5 = pg_query($conn, $query5);
	if ($result5) {
		echo "Profile Pic Updated!";
	  } else {
		echo "Error adding pic: " . pg_last_error($conn);
	  }
	}


	if (isset($_POST['pass'])) {
		echo" ";
		include('Supabase_connect.php');
		// Update database with new user ID
		$query9 = 'UPDATE "club_page" SET "joined_users" = array_append(joined_users, \''.$user_name.'\') WHERE "club_id" = \'' . $club_id . '\'';
		$result9 = pg_query($conn, $query9);
	  //  $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';

		// Check if query was successful
		if ($result9) {
		  echo "Joined successfully!";
		} else {
		  echo "Error joining club: " . pg_last_error($conn);
		}
	  }

}


foreach($_POST as $keyx => $value) echo "$keyx = $value<br>";



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
	$pro_pic = $row['pro_pic'];
	$imageUrl = 'https://drive.google.com/uc?export=view&id=';
	
echo" 	<section>
			<div class='containerr'>
			<h1>Account Profile</h1>
			<table class='con'>
			<tr><th colspan='2'>Profile</th></tr>
			<tr><td width='160px'rowspan='3'><img src='$imageUrl$pro_pic' alt='Profile Image'></td>
				<th>Username</th><td>$user_name</td></tr>
			<tr><th>Password</th><td>$Pass_Code</td></tr>
			
			<tr>
			<th><button type='submit'  value='Change Profile Picture'  onclick='showMor($User_id)' >Change Profile Picture</button></th>
			<td><button type='submit' name='pass' value='Update User Pass' >Update User Pass</button></td></tr>
			<form method='post' action='profile.php?j=$User_id' enctype='multipart/form-data'>
			<tr class='pro_pic' id='pro_pic_$User_id'> <td colspan='2' ><input type='file' name='picture' value='$pro_pic' size='50'>$pro_pic</td>
			<td><button type='submit' name='profile' value='Change Profile Picture' >Submit</button></td></tr>
			</form></table>
			<table class='con'>
			<tr><th colspan='2'>Personal Information</th></tr>
			<tr><th width='30%'>First Name</th> <td>$F_Name</td></tr>
			<tr><th width='30%'>Last Name</th> <td>$L_Name</td></tr>
			<tr><th>Major</th> <td>$Major</td></tr>
			</table>
			<table class='con'>
			<tr><th colspan='2'>Account Information</th></tr>
			<tr><th width='30%'>Role</th> <td>$Role</td></tr>
			<tr><th>Year</th> <td>$Year</td></tr>
			</table>
			<table class='con'>
			<tr><th colspan='2'>Contact Information</th></tr>
			<tr><th width='30%'>Email</th> <td>$Email</td></tr>
			<tr><th>Phone</th> <td>$Phone</td></tr>
			<tr><th>Member Since</th> <td>$Date</td></tr>
			</table>
			</div></section>";

}
echo'
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="touggle.js"></script>
<br>';
switch($task) {

	case "Finish": 	 break;



}
	echo "<p align='center'>This is the User Page
		  <p align='center'>Only User and Admin can access this page, LOGON is required";
	include('footer.php');
?>