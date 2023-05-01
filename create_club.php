



<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
    include('check_logon.php');
	include('menubar.php');
    include('Supabase_connect.php');

?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="create_club.css">
        <link rel="stylesheet" href="SlideShow.css">
		<link rel="stylesheet" href="footer.css">
    </head>
    <style>
        .color-box {
            width: 50px;
            height: 50px;
            display: inline-block;
            margin-right: 10px;
            border: 1px solid #000;
        }
    </style>
    <body>
<section>

<?php
//$club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date
$dd= date("Y-m-d");
$i=1;
$file_name =NULL;

if (isset($_POST['task']))			$task = $_POST['task'];						else $task = "First";
if (isset($_GET['r']))				{$task = $_GET['r'];}	
if (isset($_POST['club_id']))			$club_id = trim($_POST['club_id']);	    else $club_id = NULL;
if (isset($_POST['c_name']))			$c_name = trim($_POST['c_name']);       else $c_name = NULL;
if (isset($_POST['color']))			$color = trim($_POST['color']);       else $color = NULL;
if (isset($_POST['c_tag']))				$c_tag = trim($_POST['c_tag']);         else $c_tag = NULL;
if (isset($_POST['c_desc']))			$c_desc = trim($_POST['c_desc']);       else $c_desc = NULL;
//if (isset($_POST['c_pic']))			    $c_pic = trim($_POST['c_pic']);         else $c_pic = NULL;
if (isset($_POST['c_members']))			$c_members = trim($_POST['c_members']); else $c_members = NULL;
if (isset($_POST['made_by']))			$made_by = trim($_POST['made_by']);     else $made_by = NULL;
if (isset($_POST['made_date']))			$made_date = trim($_POST['made_date']); else $made_date = NULL;

if (isset($_POST['t_color1']))			$t_color1 = trim($_POST['t_color1']);      else $t_color1 = 'purple';
if (isset($_POST['t_color2']))			$t_color2 = trim($_POST['t_color2']);      else $t_color2 = 'black';
if (isset($_POST['t_text']))			$t_text = trim($_POST['t_text']);          else $t_text = 'white';
if (isset($_POST['des_color']))			$des_color = trim($_POST['des_color']);    else $des_color = 'black';
if (isset($_POST['des_text']))			$des_text = trim($_POST['des_text']);      else $des_text = 'white';

//if (isset($_POST['perk_name']))	       $perk_name = $_POST['perk_name'];     else $perk_name = Null;
//if (isset($_POST['perk_desc']))	       $perk_desc = $_POST['perk_desc'];     else $perk_desc = Null;

//$perk_pic = isset($_FILES['picture']['name']) ? $_FILES['picture']['name'] : array();
/*
if (isset($_POST['p']))			$p = trim($_POST['p']); else $p = NULL;
if (isset($_POST['addd'])) {
    $number = $_POST['number'];
  } else $number = NULL;

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
  */

  
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
        $filename = $file->id;
        $message = "File uploaded successfully. $filename";
    } catch(Exception $e) {
        $message = "Error Message: ".$e->getMessage();
    } 
}
  /*
if(isset($_FILES['images'])) {
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
          $filena = $file->id;
          $message = "File uploaded successfully. $filena";
          $perk_pic = isset($_FILES[$filena]) ? $_FILES[$filena] : array();
      } catch(Exception $e) {
          $message = "Error Message: ".$e->getMessage();
      } 
  }
  */
  if(isset($_FILES['images'])) {
    try {
       // $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
       // $file_type = $_FILES['image']['type'];
       // if (!in_array($file_type, $valid_types)) {
       //     throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
       // }
          
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
        $client = new Google_Client();
        putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
        $client->useApplicationDefaultCredentials();
       // $client->addScope(Google_Service_Drive::DRIVE);
      //  $driveService = new Google_Service_Drive($client);
        $client->addScope(Drive::DRIVE);
          $driveService = new Drive($client);
        $perk_pic = array();
        $uploaded_files = $_FILES['images'];
        foreach ($uploaded_files['name'] as $key => $name) {
            if ($uploaded_files['error'][$key] == 0) {
                $fileMetadata = new Drive\DriveFile(array(
                    'name' => $name,
                    'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
                ));
                $content = file_get_contents($uploaded_files['tmp_name'][$key]);
                $file = $driveService->files->create($fileMetadata, array(
                    'data' => $content,
                    'mimeType' => $uploaded_files['type'][$key],
                    'uploadType' => 'multipart',
                    'fields' => 'id'
                ));
                $perk_pic[] = $file->id;
            }
        }
        $message = "Files uploaded successfully. ".implode(",", $perk_pic);
    } catch(Exception $e) {
        $message = "Error Message: ".$e->getMessage();
    } 
}
//foreach($_POST as $keyx => $value) echo "$keyx = $value<br>";
echo " <div class='club_make'>";
echo "    <div class='add_club_info'> <form action='create_club.php' method='post' enctype='multipart/form-data'>
<table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='4'>
<tr><td width='30%'>Club Name</td><td ><input type='text' name='c_name' value='$c_name'  size='40'></td>
<tr><td>Background color </td><td><input type='color' name='t_color1' value='$t_color1' >       
<input type='color' name='t_color2' value='$t_color2' ></td>
<tr><td>Text color </td><td><input type='color' name='t_text' value='$t_text' ></td>

<tr><td>Club Tag </td><td><input type='text' name='c_tag' value='$c_tag' rows='10'  size='50'></td>
<tr><td>Club Description</td><td><textarea name='c_desc' value='$c_desc' size='500' cols='40' rows='10' >$c_desc</textarea></td>
<tr><td>Background color </td><td><input type='color' name='des_color' value='$des_color' ></td>
<tr><td>Text color </td><td><input type='color' name='des_text' value='$des_text' ></td>

<tr><td>Club Members</td><td><input type='number' name='c_members' value='$c_members'   size='12'></td>
<tr><td>Upload Club Photo(JPG, GIF, PNG or TIF File only):
        <td> <input type='file' name='image' >$filename</td></tr>
        <tr><td></td>
        <td><br></td>
        </tr>";
        $max_entries = 4;
        for ($i = 0; $i < $max_entries; $i++) {
           // $per_pic = isset($perk_pic[$i]) ? $perk_pic[$i] : '';
           $perk_name = $_POST['perk_name']; // Assuming S_title is an array of values
           $perk_desc = $_POST['perk_desc']; // Assuming S_des is an array of values
          // $S_pic = $_POST['S_pic']; // Assuming S_pic is an array of values
          // $perk_pic = isset($_FILES[$filena]) ? $_FILES[$filena] : array();

            $Per_pic = isset($perk_pic[$i]) ? $perk_pic[$i] : null;
            $Per_name = isset($perk_name[$i]) ? $perk_name[$i] : null;
            $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
        //<td><input type='file' name='perk_pic[]' value='" . $per_pic . "' size='50'></td>
       echo"

            <tr>
                <td>Perk No " . ($i+1) . " </td>
            </tr>
            <tr>
                <td>Perk Pic</td>
                <td> <input type='file' name='images[]' value='" . $Per_pic . "' size='50'>$Per_pic</td>
            </tr>
            <tr>
                <td>Perk Name</td>
                <td><input type='text' name='perk_name[]' value='" . $Per_name . "' size='50'></td>
            </tr>
            <tr>
                <td>Perk Description</td>
                <td><input type='text' name='perk_desc[]' value='" . $Per_desc . "' size='50'></td>
            </tr>
            ";
        }

        echo "  <tr><td></td>
        <td><br></td>
        </tr>";


        if(isset($_FILES['picture'])) {
            $max_entry = 3; // Number of entries to loop through
            $S_title = $_POST['S_title']; // Assuming S_title is an array of values
            $S_des = $_POST['S_des']; // Assuming S_des is an array of values
           // $S_pic = $_POST['S_pic']; // Assuming S_pic is an array of values
            $S_pic = isset($_FILES['picture']['name']) ? $_FILES['picture']['name'] : array(); // Assuming S_pic is an array of file names

            for ($i = 0; $i < $max_entry; $i++) {
                // Check if the array values are set, otherwise set them to null
                $Slide_title = isset($S_title[$i]) ? $S_title[$i] : null;
                $Slide_des = isset($S_des[$i]) ? $S_des[$i] : null;
                $Slide_pic = isset($S_pic[$i]) ? $S_pic[$i] : null;
        
                // Upload file for each entry
                $file_na = $_FILES['picture']['name'][$i];
                $file_tmp = $_FILES['picture']['tmp_name'][$i];
                $file_type = $_FILES['picture']['type'][$i];
                $file_parts = explode('.', $file_na);
                $file_ext = strtolower(end($file_parts));
        
                $valid_exts = array("jpg", "jpeg", "png", "tif", "gif");

                if(in_array($file_ext, $valid_exts)) {
                    $upload_path = "./upload/club_page/" . $file_na;
                    move_uploaded_file($file_tmp, $upload_path);
                    echo "File uploaded successfully for Slide No " . ($i+1) . ".<br>";
                } else {
                    $file_na = null;
                    echo "Invalid file type. JPG, GIF, PNG or TIF files are allowed for Slide No " . ($i+1) . ".<br>";
                }
            }
        }



$max_entry = 3;
for ($i = 0; $i < $max_entry; $i++) {
    $Slide_pic = isset($S_pic[$i]) ? $S_pic[$i] : '';
    echo "
    <tr>
        <td>Slide No " . ($i+1) . "</td>
    </tr>
    <tr>
        <td>Slide Title</td>
        <td><input type='text' name='S_title[]' value='" . (isset($S_title[$i]) ? $S_title[$i] : '') . "' size='50'></td>
    </tr>
    <tr>
        <td>Slide Description</td>
        <td><input type='text' name='S_des[]' value='" . (isset($S_des[$i]) ? $S_des[$i] : '') . "' size='50'></td>
    </tr>
    <tr>
        <td>Slide Pic</td> 
        <td> <input type='file' name='image[]' >$filename</td></tr>
       
    </tr>";
}

// <td><input type='file' name='picture[]' value='" . $Slide_pic . "' size='50'></td>


        echo "
<tr><td></td><td><input type='submit' name='task' value='Finish' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'>
<input type='submit' name='task' value='preview' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'></td>
</table></form></div>";

switch($task) {

case "Finish": 	    
                    include('Supabase_connect.php');
                    echo "$message";
                    $query = 'INSERT INTO "club_page" ( "c_name", "c_tag", "c_desc", "c_pic", 
                    "c_members", "t_color1", "t_color2", "t_text", "des_color", "des_text","status") 
	                VALUES (\''.$c_name.'\',\''. $c_tag.'\',\''.$c_desc.'\', \''.$filename.'\', \''.$c_members.'\',
	                 \''.$t_color1.'\', \''.$t_color2.'\', \''.$t_text.'\', \''.$des_color.'\', \''.$des_text.'\', 1)
                     RETURNING "club_id";';
	                $result = pg_query($conn, $query);
                    if ($result) {
                        $club_id = pg_fetch_result($result, 0, 0);
                        echo "<font color='green'> $club_id Your NEW Club Created.</font>\n"; 
                    
                        for ($i = 0; $i < $max_entries; $i++) {
                        // Check if the array values are set, otherwise set them to null
                        $Per_pic = isset($perk_pic[$i]) ? $perk_pic[$i] : null;
                        //$Per_pic = isset($filena[$i]) ? $filena[$i] : null;

                        $Per_name = isset($perk_name[$i]) ? $perk_name[$i] : null;
                        $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
                    $query2 ='INSERT INTO "club_perk" ("p_name", "p_desc", "p_pic", "club_id", "color") 
                    VALUES (\''.$Per_name.'\', \''.$Per_desc.'\', \''.$Per_pic.'\', \''.$club_id.'\', NULL) 
                    RETURNING "perk_id";';
                     $result2 = pg_query($conn, $query2);
                     if ($result2) {
                        $perk_id = pg_fetch_result($result2, 0, 0);
                         echo "<font color='green'>$perk_id Your NEW perk Created.</font>\n";}
                         else { echo"Unable to add perk\n" . pg_last_error($conn);}}


                    for ($i = 0; $i < $max_entry; $i++) {
                        // Check if the array values are set, otherwise set them to null
                        $Slide_title = isset($S_title[$i]) ? $S_title[$i] : null;
                        $Slide_des = isset($S_des[$i]) ? $S_des[$i] : null;
                        $Slide_pic = isset($S_pic[$i]) ? $S_pic[$i] : null;
                
                    $query3 ='INSERT INTO "club_slide" ("S_title", "S_des", "S_pic", "club_id")
                    VALUES (\''.$Slide_title.'\', \''.$Slide_des.'\', \''.$Slide_pic.'\', \''.$club_id.'\')
                     RETURNING "slide_id";';
                     $result3 = pg_query($conn, $query3);
                     if ($result3) {
                        $slide_id = pg_fetch_result($result3, 0, 0);
                         echo "<font color='green'>$slide_id Your NEW slideshow Created.</font>\n";}
                         else { echo"Unable to add slideshow\n" . pg_last_error($conn);}}
                    
                    }else { echo"Unable to Make Account\n [$query] " . pg_last_error($conn);}
                    
                    echo"ooooook"; break;

case "First": break;
case "preview": 
                $imageUrl = 'https://drive.google.com/uc?export=view&id=';

        echo"<div class='club_right'><div class='club_Container'>
                <div class='image_Container'>
                <img class='club_Icon' src='$imageUrl' alt=\"Avatar\">
                </div>
                <div class='information'>
                    <h1 ><a style='text-decoration:none; color:white;' href='./club_home_page.php'>$c_name</a></h1>
                    <p >$c_tag</p>
                </div>
                <div class='member_Counter'>
                    <h1 class='counter_Text'><i class='fas fa-user-friends'></i> Members: $c_members</h1>
                </div>
            </div>   </div></div>
 <section>
            <div class='top'  style='background-image:radial-gradient($t_color1 40%, $t_color2);' >
                <div class='imageHeader'>
                    <img style='width:100%; height: 100px; object-fit: cover;' src=\"./upload/club_page/$file_name\"  alt=\"Avatar\" alt=''>
                </div>
            <div class='nametag'>
            <h1 style='color:$t_text;' >$c_name</h1>
            <p  style='color:$t_text;' > $c_tag</p>
            </div>
            <div class='buttonSection'>
                <div >
                <button class='contactButton'><i style='color:white;' class='fa fa-envelope'></i> Contact Us</button>   
                <button class='joinButton'>Join Now</button></div>
            </div>      
        </div>


        <div class='clubInfo'  style='background-color:$des_color;'>
            <p  style='color: $des_text;' >$c_desc</p>
        </div> 
        <div class='listOfBenefitsGrid'>";

                for ($i = 0; $i < $max_entries; $i++) {
                    // Check if the array values are set, otherwise set them to null
                    $Per_pic = isset($perk_pic[$i]) ? $perk_pic[$i] : null;
                    $Per_name = isset($perk_name[$i]) ? $perk_name[$i] : null;
                    $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
            
           echo"

            <div class='listOfBenefits'>
                <div class='benefitsIcon'>
                    <img src='$imageUrl$Per_pic' alt='$Per_pic'>
                </div>
                <div class='listOfBenefitsDesciption'>
                    <h3>$Per_name $Per_pic</h3>
                    <p>$Per_desc</p>
                </div>
            </div>  ";}

            echo"</div> </section>  
            
            <section> 
            <div class='slideshow-container'>";

                for ($i = 0; $i < $max_entry; $i++) {
                    // Check if the array values are set, otherwise set them to null
                    $Slide_title = isset($S_title[$i]) ? $S_title[$i] : null;
                    $Slide_des = isset($S_des[$i]) ? $S_des[$i] : null;
                    $Slide_pic = isset($S_pic[$i]) ? $S_pic[$i] : null;
           echo"

            <div class='mySlides fade'>
			<div class='numbertext'> " . ($i+1) . "</div>
			<img src=\"./upload/club_page/$Slide_pic\" style='width:100%'>
			<div class='text'>$Slide_title<br>$Slide_des</div>
			</div>
            ";}
            echo"	
            <div class='prev' onclick='plusSlides(-1)'>❮</div>
			<div class='next'  onclick='plusSlides(1)'>❯</div>
			<br>
			<div class='do' style='text-align:center'>
				<span class='dot' onclick='currentSlide(1)'></span> 
				<span class='dot' onclick='currentSlide(2)'></span> 
				<span class='dot' onclick='currentSlide(3)'></span> 
			</div>

</div>
<br>


		

<script src='autoSlide.js'></script>
<script src='clickSlide.js'></script>

</section>
             ";  break;

}

?>

</section>

    </body>



<?php


include('footer.php');

?>
