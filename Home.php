


<?php
// home.php - Home Page 
// Written by:  Prof. Kaplan, November 2021
	$dd= date("Y-m-d");
// Output
	include('session.php');
	include('menubar.php');
	include('header.php');
	//include('bcs350_mysqli_connect.php');
/*
	if (isset($_POST['task']))							$task = $_POST['task'];								else $task = "First";
	if (isset($_POST['account_type']))					$account_type = trim($_POST['account_type']);	else $account_type = NULL;
	if (isset($_POST['user_name']))						$user_name = trim($_POST['user_name']);         else $user_name = NULL;
	if (isset($_POST['pass_code']))						$pass_code = trim($_POST['pass_code']);          else $pass_code = NULL;
	if (isset($_POST['account_balance']))				$account_balance = trim($_POST['account_balance']); else $account_balance = NULL;
	//foreach($_POST as $keyx => $value) echo "$keyx = $value<br>"; 

	echo"   <form action='home.php' method='post'>
	<table width='650' align='center' cellpadding='5' >
	<td align='center'>
		<button name='task' value='signup' style='background-color: #32CD32; font-size: 20px; margin: 1px 10px; display:inline-block; padding: 20px; border: 1px solid black;'><b>SIGN UP</b></button>

	</td>
	</table></form>";
	//<input type='submit' name='task' value='signup'>
	//<input type='submit' name='task' value='signup' style='background-color: #32CD32; margin: 1px 10px; display:inline-block; padding: 20px; border: 1px solid black;'>
	switch($task) {

		case "signup": 
						echo "    <form action='home.php' method='post'>
						<table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='2'>
						<tr><td width='30%'>User Name</td><td ><input type='text' name='user_name' value='$user_name' rows='4' cols='10'  size='12'></td>
						<tr><td>Password </td><td><input type='number' name='pass_code' value='$pass_code'   size='12'></td>
						<tr><td>Amount</td><td><input type='number' name='account_balance' value='$account_balance'   size='12'></td>
						<tr ><td>Account Type    </td>
						<td ><input type='radio' name='account_type' value='Checking' >Checking
						<input type='radio' name='account_type' value='Savings' >Savings</td></tr>
						<td></td><td><input type='submit' name='task' value='Finish' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'></td>
						</table></form>";
			
						//INSERT INTO `bank` (`account_number`, `user_name`, `pass_code`, `account_type`, `role`, `account_balance`, `date`) VALUES (NULL, '', '', '', NULL, '', NULL)
						echo"goooood"; break;
		case "Finish": 
							include('bcs350_mysqli_connect.php');
							$query = "INSERT INTO `bank` (`user_name`, `pass_code`, `account_type`, `role`, `account_balance`, `date`) 
							VALUES ('$user_name', '$pass_code', '$account_type', 'user', '$account_balance', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="Your NEW Account Created.";
							else { $msg="Unable to Make Account" . mysqli_error($mysqli);}
							echo"ooooook"; break;

		case "First": break;
	}
	//else{echo"nooo";}

	*/
?>

	<body>


<div class="slideshow-container">

			<div class="mySlides fade">
			<div class="numbertext">1 / 3</div>
			<img src="./Homepage/Pictures/FSC Campus Center.jpg" style="width:100%">
			<div class="text">Campus Center</div>
			</div>

			<div class="mySlides fade">
			<div class="numbertext">2 / 3</div>
			<img src="./Homepage/Pictures/FSC Fountain.jpg" style="width:100%">
			<div class="text">FSC Fountain</div>
			</div>

			<div class="mySlides fade">
			<div class="numbertext">3 / 3</div>
			<img src="./Homepage/Pictures/FSC Quinton Hall.jpg" style="width:100%">
			<div class="text">Quintyne Hall</div>
			</div>
			<div class="prev" onclick="plusSlides(-1)">❮</div>
			<div class="next"  onclick="plusSlides(1)">❯</div>
			<br>
			<div class="do" style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span> 
				<span class="dot" onclick="currentSlide(2)"></span> 
				<span class="dot" onclick="currentSlide(3)"></span> 
			</div>

</div>
<br>


		

<script src="autoSlide.js"></script>
<script src="clickSlide.js"></script>
</body>

<?php
include('Supabase_connect.php');
/*

if(isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    //$file_ext = strtolower(end(explode('.', $file_name)));
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));


    $valid_exts = array("jpg", "jpeg", "png","tif","gif<br>");
    
    if(in_array($file_ext, $valid_exts)) {
      $upload_path = "./upload/club_page/" . $file_name;
      move_uploaded_file($file_tmp, $upload_path);
      echo "File uploaded successfully.<br>";
    } else {
        $file_name =NULL;
      echo "Invalid file type. JPG, GIF, PNG or TIF files are allowed.<br>";
    }
  }
  ?>



  <h1>Image Upload</h1>
  <form action="index.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Upload">
  </form>

*/




/*


// Include the Google APIs Client Library for PHP
require_once 'path/to/google-api-php-client/vendor/autoload.php';

// Define your Google Drive API credentials
$client = new Google_Client();
$client->setClientId('1097487834590-9vlh5l35uv8ors7ui29l47b4t6h7d824.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://fscclub01.herokuapp.com');
$client->setScopes(array('https://www.googleapis.com/auth/drive.file'));

// Create a new Google Drive service instance
$service = new Google_Service_Drive($client);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Handle form submission
  $file = $_FILES['image'];
  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];

  // Upload file to Google Drive
  $file_metadata = new Google_Service_Drive_DriveFile(array(
    'name' => $file_name
  ));
  $file = file_get_contents($file_tmp);
  $drive_file = $service->files->create($file_metadata, array(
    'data' => $file,
    'mimeType' => 'image/jpeg', // Change the MIME type to match your file type
    'uploadType' => 'multipart'
  ));

  // Get the URL of the uploaded file
  $file_url = 'https://drive.google.com/uc?id=' . $drive_file->getId();

  // Store file metadata or do other actions as needed
  // ...
  
  echo "Image uploaded successfully! File URL: " . $file_url;
}



include('footer.php');

  <h1>Image Upload</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Upload">
  </form>


*/
  
require_once 'drive/vendor/autoload.php';

use Google\Client;
use Google\Service\Drive;

if(isset($_POST['submit'])){
    try {
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
            'mimeType' => $_FILES['image']['type'],
            'uploadType' => 'multipart',
            'fields' => 'id'
        ));
        printf("File ID: %s\n", $file->id);
        $message = "File uploaded successfully.";
    } catch(Exception $e) {
        $message = "Error Message: ".$e->getMessage();
    } 
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h1>Image Upload</h1>
    <?php if(isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>