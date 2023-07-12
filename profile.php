
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
	
	echo"oovvvvvdddff $club_id";

	
	if (isset($_POST['join'])) {
		echo" ";
		include('Supabase_connect.php');
		// Update database with new user ID
		$query9 = 'UPDATE "club_page" SET "joined_users" = array_append(joined_users, \''.$user_name.'\'), "c_members" = "c_members"+ 1 WHERE "club_id" = \'' . $club_id . '\'';
		$result9 = pg_query($conn, $query9);

		if ($result9) {
		  echo "Joined successfully!";
		} else {
		  echo "Error joining club: " . pg_last_error($conn);
		}
	  }

	  if (isset($_POST['joined'])) {
		echo" ";
		include('Supabase_connect.php');
		// Update database with new user ID
		$query9 = 'UPDATE "club_page" SET "joined_users" = array_remove(joined_users, \''.$user_name.'\'), "c_members" = "c_members"- 1 WHERE "club_id" = \'' . $club_id . '\'';
		$result9 = pg_query($conn, $query9);

		if ($result9) {
		  echo "UnJoined successfully!";
		} else {
		  echo "Error UnJoined club: " . pg_last_error($conn);
		}
	  }

}






$query = 'SELECT * FROM "User" where "User_Name" = \'' . $user_name . '\'';
$result = pg_query($conn, $query);

// Check query result
if (!$result) {
  echo "Query Error [$query] " . pg_last_error($conn);
}





require_once 'drive/vendor/autoload.php';

use Google\Client;
use Google\Service\Drive;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_GET['j']))					{$User_id = $_GET['j'];}

	if (isset($_POST['profile'])) {

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
		if (isset($_POST['user_name']))			$user_name = trim($_POST['user_name']);       else $user_name = NULL;
		if (isset($_POST['Pass_Code']))			$Pass_Code = trim($_POST['Pass_Code']);       else $Pass_Code = NULL;
		echo" ";
		include('Supabase_connect.php');
		
		echo"<input type='hidden' name='User_id' value='$User_id'> ";
		
		// Update database with new user ID
		$query9 = 'UPDATE "User" SET "User_Name" =\''.$user_name.'\', 
		"Pass_Code" =\''.$Pass_Code.'\' WHERE "User_id" = \'' . $User_id . '\'';
		$result9 = pg_query($conn, $query9);
	  //  $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';

		// Check if query was successful
		if ($result9) {
		  echo "User Name & Password Updated!";
		} else {
		  echo "Error Update " . pg_last_error($conn);
		}
	  }

}


foreach($_POST as $keyx => $value) echo "$keyx = $value<br>";



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
			<td><button type='submit' value='Update User Pass' onclick='showMo($User_id)'>Update User Pass</button></td></tr>
			<form method='post' action='profile.php?j=$User_id' enctype='multipart/form-data'>
			<tr class='pro_pic' id='pro_pic_$User_id'> <td colspan='2' ><input type='file' name='image' value='$pro_pic' size='50'>$pro_pic</td>
			<td><button type='submit' name='profile' value='Change Profile Picture' >Submit</button></td></tr>
			</form></table><form method='post' action='profile.php?j=$User_id'>
			<table class='user_pass' id='user_pass_$User_id'>
			<tr ><th width='30%'>Username</th><td><input type='text' name='user_name' value='$user_name'></td></tr>
			<tr ><th width='30%'>Password</th><td><input type='text' name='Pass_Code' value='$Pass_Code'></td>
			<td><button type='submit' name='pass' value='Update User Pass' >Submit</button></td></tr>
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
			</div></section><section class='section_01'>";

}


$query1 = 'SELECT * FROM  "event_page" where \'' . $user_name . '\' = ANY(joined_users);';
$result1 = pg_query($conn, $query1);
if (!$result1) {
  echo "Query Error [$query1] " . pg_last_error($conn);
}

$query2 = 'SELECT * FROM  "club_page" where \'' . $user_name . '\' = ANY(joined_users);';
$result2 = pg_query($conn, $query2);
if (!$result2) {
  echo "Query Error [$query2] " . pg_last_error($conn);
}

while ($row = pg_fetch_assoc($result1)) {
	$event_id = $row['event_id'];
	$e_name = $row['e_name'];
	$e_tag = $row['e_tag'];
	$e_desc = $row['e_desc'];
	$e_pic = $row['e_pic'];
	$e_date = $row['e_date'];
	$e_time = $row['e_time'];
	$e_location = $row['e_location'];
	$e_places = $row['e_places'];
	$place_pic = $row['place_pic'];
	$header_pic = $row['header_pic'];
	$icon_pic = $row['icon_pic'];
	$e_price = $row['e_price'];
	$e_categoris = $row['e_categoris'];
	$e_max_mem = $row['e_max_mem'];
	$e_members = $row['e_members'];
	$made_Date = $row['made_date'];
	$joined_users = $row['joined_users'];
	$imageUrl = 'https://drive.google.com/uc?export=view&id=';

	echo" $event_id $e_name $c_tag $icon_pic $e_date $e_time $e_places $e_members - $e_max_mem $e_price<br>";

}

while ($row = pg_fetch_assoc($result2)) {
	$club_id = $row['club_id'];
	$c_name = $row['c_name'];
	$c_tag = $row['c_tag'];
	$c_desc = $row['c_desc'];
	$c_pic = $row['c_pic'];
	$c_members = $row['c_members'];
	$Date = $row['made_date'];
	$made_by = $row['made_by'];
	$t_color1 = $row['t_color1'];
	$t_color2 = $row['t_color2'];
	$t_text = $row['t_text'];
	$joined_users = $row['joined_users'];
	$des_color = $row['des_color'];
	$des_text = $row['$des_text'];
	$imageUrl = 'https://drive.google.com/uc?export=view&id=';

	$membersStrin = $joined_users;
	$membersStrin = trim($membersStrin, "{}");// Remove the curly braces {}
	$membersArra = explode(",", $membersStrin);
		 // Explode the string into an array using comma as the separator
			$userJoined = in_array($user_name, $membersArra);
			if ($userJoined) {
				echo "<p>Already joined.</p>";
				$xx="name='joined' value='Joined' >Joined";
			} else {echo "<p>didnot joined.</p>";
				$xx="name='join' value='Join Now ' >Join Now";
				
				}


echo" $club_id $c_name $c_tag $c_desc $c_pic $c_members<br>";
echo "<div class='box-container'>
		  <div class='box-row'>
            <div class='box-label'>Club ID</div>
            <div class='box-value'><p>$club_id</p></div>
          </div>
		  <div class='box-row'>
            <div class='box-label'>Club Picture</div>
            <div class='box-value'><img src='$imageUrl$c_pic' alt='Club Picture' width='100px'></div>
          </div>
          <div class='box-row'>
            <div class='box-label'>Club Name</div>
            <div class='box-value'>$c_name</div><br>
            <div class='box-label'>Club Tag</div>
            <div class='box-value'>$c_tag</div>
          </div>
          <div class='box-row'>
            <div class='box-label'>Club Description</div>
            <div class='box-value'><span>$c_desc</span></div>
          </div>
          <div class='box-row'>
            <div class='box-label'>Club Members</div>
            <div class='box-value'><p>$c_members</p></div>
          </div>
		  <div class='buttonSection'>
		  <div >
		  <form method='post' action='profile.php'>
		  <input type='hidden' name='club_id' value='$club_id'>
		  <button class='submit-button' type='submit' $xx</button></form> </div>
	  </div>      
        </div>";

}



echo'</section>
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