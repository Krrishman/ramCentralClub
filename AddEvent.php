
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="NewEventHomePage.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>


<?php

if (isset($_POST['location'])) {
    //echo "$ ";
    $location = urlencode($_POST['location']);
    $api_key = 'AIzaSyC-k2ly18smlEzk-JlhWtqOgNZQc0x5lZU';
    //echo $location;
    //AIzaSyC-k2ly18smlEzk-JlhWtqOgNZQc0x5lZU
    // Generate the map URL with the location and API key
    $mapsUrl = "https://www.google.com/maps?q=" . urlencode($location) . "&output=embed";
    $map_url = "https://maps.googleapis.com/maps/api/staticmap?center={$location}&zoom=14&size=400x300&markers=color:red%7C{$location}&key={$api_key}";
    /*<h2>Map for: <?php echo $_POST['location']; ?></h2>
    <img src="<?php echo $map_url; ?>" alt="Map"> */

  }



if(isset($_POST['map_url']))        $map_url = $_POST['map_url'];
if(isset($_POST['mapsUrl']))        $map_url = $_POST['mapsUrl'];

if(isset($_POST['task'])) $task = $_POST['task'];   else $task = "First";

if(isset($_POST['e_name']))         $e_name = trim($_POST['e_name']);         else $e_name = NULL;
if(isset($_POST['e_tag']))          $e_tag = trim($_POST['e_tag']);           else $e_tag = NULL;
if(isset($_POST['e_desc']))         $e_desc = trim($_POST['e_desc']);         else $e_desc = NULL;
if(isset($_POST['e_pic']))          $e_pic = trim($_POST['e_pic']);           else $e_pic = NULL;
if(isset($_POST['e_date']))         $e_date = trim($_POST['e_date']);         else $e_date = NULL;
if(isset($_POST['e_time']))         $e_time = trim($_POST['e_time']);         else $e_time = NULL;
if(isset($_POST['e_location']))     $e_location = trim($_POST['e_location']); else $e_location = NULL;
if(isset($_POST['e_places']))       $e_places = trim($_POST['e_places']);     else $e_places = NULL;
if(isset($_POST['e_price']))        $e_price = trim($_POST['e_price']);       else $e_price = NULL;
if(isset($_POST['e_categoris']))    $e_categoris = trim($_POST['e_categoris']); else $e_categoris = NULL;
if(isset($_POST['e_max_mem']))      $e_max_mem = trim($_POST['e_max_mem']);     else $e_max_mem = NULL;
if(isset($_POST['e_members']))      $e_members = trim($_POST['e_members']);     else $e_members = NULL;

if(isset($_POST['guest_name']))     $guest_name = trim($_POST['guest_name']);   else $guest_name = NULL;
if(isset($_POST['guest_desc']))     $guest_desc = trim($_POST['guest_desc']);   else $guest_desc = NULL;
if(isset($_POST['guest_pic']))      $guest_pic = trim($_POST['guest_pic']);     else $guest_pic = NULL;

if(isset($_POST['place_Pic']))      $place_Pic = trim($_POST['place_Pic']);   else $places_Pic = NULL;
if(isset($_POST['header_pic']))     $header_pic = trim($_POST['header_pic']);   else $header_pic = NULL;
if(isset($_POST['icon_pic']))       $icon_pic = trim($_POST['icon_pic']);       else $icon_pic = NULL;




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

    if(isset($_FILES['icon'])) {
    //if(isset($_POST['submit'])){
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
              'name' => $_FILES['icon']['name'],
              'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
          ));
          $content = file_get_contents($_FILES['icon']['tmp_name']);
          $file = $driveService->files->create($fileMetadata, array(
              'data' => $content,
              'mimeType' => $file_type,
              'uploadType' => 'multipart',
              'fields' => 'id'
          ));
          $icon_pic = $file->id;
          $message = "File uploaded successfully. $icon_pic";
      } catch(Exception $e) {
          $message = "Error Message: ".$e->getMessage();
      } 
}

    if(isset($_FILES['header'])) {
        //if(isset($_POST['submit'])){
          try {
            /*
              $valid_types = ['header/jpeg', 'header/jpg', 'header/gif', 'header/png', 'header/tif', 'header/tiff'];
              $file_type = $_FILES['header']['type'];
              if (!in_array($file_type, $valid_types)) {
                  throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
              }
              */
              $curl = curl_init();
              curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
              curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
              $client = new Client();
              putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
              $client->useApplicationDefaultCredentials();
              $client->addScope(Drive::DRIVE);
              $driveService = new Drive($client);
              $fileMetadata = new Drive\DriveFile(array(
                  'name' => $_FILES['header']['name'],
                  'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
              ));
              $content = file_get_contents($_FILES['header']['tmp_name']);
              $file = $driveService->files->create($fileMetadata, array(
                  'data' => $content,
                  'mimeType' => $file_type,
                  'uploadType' => 'multipart',
                  'fields' => 'id'
              ));
              $header_pic = $file->id;
              $message = "File uploaded successfully. $header_pic";
          } catch(Exception $e) {
              $message = "Error Message: ".$e->getMessage();
          } 
    }

        if(isset($_FILES['guest'])) {
            //if(isset($_POST['submit'])){
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
                      'name' => $_FILES['guest']['name'],
                      'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
                  ));
                  $content = file_get_contents($_FILES['guest']['tmp_name']);
                  $file = $driveService->files->create($fileMetadata, array(
                      'data' => $content,
                      'mimeType' => $file_type,
                      'uploadType' => 'multipart',
                      'fields' => 'id'
                  ));
                  $guest_pic = $file->id;
                  $message = "File uploaded successfully. $guest_pic";
              } catch(Exception $e) {
                  $message = "Error Message: ".$e->getMessage();
              } 
        }

            if(isset($_FILES['place'])) {
                //if(isset($_POST['submit'])){
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
                          'name' => $_FILES['place']['name'],
                          'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
                      ));
                      $content = file_get_contents($_FILES['place']['tmp_name']);
                      $file = $driveService->files->create($fileMetadata, array(
                          'data' => $content,
                          'mimeType' => $file_type,
                          'uploadType' => 'multipart',
                          'fields' => 'id'
                      ));
                      $place_Pic = $file->id;
                      $message = "File uploaded successfully. $place_Pic";
                  } catch(Exception $e) {
                      $message = "Error Message: ".$e->getMessage();
                  } 
                }
            
            if(isset($_FILES['picture'])) {
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

                $client->addScope(Drive::DRIVE);
                $driveService = new Drive($client);
                $S_pic = array();
                $uploaded_files = $_FILES['picture'];
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
                        $S_pic[] = $file->id;
                    }
                }
                $message = "Files uploaded successfully. ".implode(",", $S_pic);
            } catch(Exception $e) {
                $message = "Error Message: ".$e->getMessage();
            } 
        }


echo " <div class='event_make'>";
echo "    <div class='add_event_info'> <form action='AddEvent.php' method='post' enctype='multipart/form-data'>
<table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='4'>
<tr>
    <td width='30%'>Event Name</td>
    <td ><input type='text' name='e_name' value='$e_name'  size='40'></td>
<tr>
    <td width='30%'>Organization Name</td>
    <td ><input type='text' name='e_tag' value='$e_tag'  size='40'></td>
<tr>
    <td>Event Date</td>
    <td><input type='date' name='e_date' value='$e_date' size='40'></td>
<tr>
    <td>Event Time</td>
    <td><input type='text' name='e_time' value='$e_time' size='40' placeholder='12:00 PM - 2:00 PM'></td>
<tr>
    <td>Event Location</td>
    <td> <input type='text' name='location' value='$location' placeholder='Enter a location'></td>
<tr>
    <td>Event Place</td>
    <td><input type='text' name='e_places' value='$e_places' placeholder='Online or In-Person'></td>
<tr>
    <td>Upload Event Photo For Location
    <td> <input type='file' name='place' >$place_Pic <br>(JPG, GIF, PNG or TIF File only)</td></tr>
    <tr><td></td>
    <td><br></td>
<tr>
    <td>Event Price</td>
    <td>
        <label><input type='radio' name='e_price' value='Free'>Free
        <input type='radio' name='e_price'   value='$5'>$5
        <input type='radio' name='e_price'  value='$10'>$10
        <input type='radio' name='e_price'  value='$15'>$15
       <input type='radio' name='e_price'  value='$20'>$20</label>
    </td>
<tr>
    <td>Event Category 
    <td>
        <label> Science </label><input type='radio' name='e_categoris' value='Science'>
        <label> Health </label><input type='radio' name='e_categoris' value='Health'>
        <label> Entertainment </label><input type='radio' name='e_categoris'  value='Entertainment'>
        <label> Sports </label><input type='radio' name='e_categoris' value='Sports'>
        <label> Studies </label><input type='radio' name='e_categoris' value='Studies'>
        <label> Seminar </label><input type='radio' name='e_categoris' value='Seminar'>
        <label> Celebration </label><input type='radio' name='e_categoris' value='Celebration'>
        <label> Environment </label><input type='radio' name='e_categoris' value='Environment'>
        <label> Technology </label><input type='radio' name='e_categoris' value='Technology'>
        <label> Technology </label><input type='radio' name='e_categoris' value='Religion'>
<tr><td>Event Overview</td>
    <td><textarea name='e_desc' value='$e_desc' size='500' cols='40' rows='10' >$e_desc</textarea></td>
<tr><td>Event Members</td>
    <td><input type='number' name='e_members' value='$e_members'   size='12'></td>
<tr><td>Event Max Members</td>
    <td><input type='number' name='e_max_mem' value='$e_max_mem'   size='12'></td>

<tr><td>Guest Speaker Image</td>
    <td> <input type='file' name='guest' value='$guest_pic' >$guest_pic <br>(JPG, GIF, PNG or TIF File only)</td></tr>
<tr><td>Guest Speaker</td>
    <td><input type='text' name='guest_name' value='$guest_name' size='30'></td>
<tr>
    <td>Guest Speaker Description</td>
    <td><textarea name='guest_desc' value='$guest_desc' size='100' cols='40' rows='5' >$guest_desc</textarea></td>

<tr><td>Upload Photo For Header
    <td> <input type='file' name='header' >$header_pic<br>(JPG, GIF, PNG or TIF File only)</td></tr>
    <tr><td></td>    <td><br></td>
<tr><td>Upload Event Photo Icon
    <td> <input type='file' name='icon' >$icon_pic <br>(JPG, GIF, PNG or TIF File only)</td></tr>
<tr><td></td><td><br></td>
</tr>";
        $max_entries = 4;
        for ($i = 0; $i < $max_entries; $i++) {

             $perk_desc = $_POST['perk_desc']; // Assuming S_des is an array of values
             $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
      
       echo" <tr><td>Perk No " . ($i+1) . " </td></tr>
            <tr><td>Perk Description</td>
                <td><input type='text' name='perk_desc[]' value='$Per_desc' size='50'></td>
            </tr>
            ";
        }

        echo "  <tr><td></td>
        <td><br></td>
        </tr>";


$max_entry = 3;
for ($i = 0; $i < $max_entry; $i++) {
    $S_title = $_POST['S_title']; // Assuming S_des is an array of values 
    $S_des = $_POST['S_des']; // Assuming S_des is an array of values

    $_title = isset($S_title[$i]) ? $S_title[$i] : null;
    $_des = isset($S_des[$i]) ? $S_des[$i] : null;
    $_pic = isset($S_pic[$i]) ? $S_pic[$i] : null;
    echo "
    <tr>
        <td>Event Pic No " . ($i+1) . "</td>
    </tr>
    <tr>
        <td>Event Pic Title</td>
        <td><input type='text' name='S_title[]' value='$_title' size='50'></td>
    </tr>
    <tr>
        <td>Event Pic Description</td>
        <td><input type='text' name='S_des[]' value='$_des' size='50'></td>
    </tr>
    <tr>
        <td>Event Pic</td> 
        <td> <input type='file' name='picture[]' value='$_pic' size='50'>$_pic</td>
       
    </tr>";
}


        echo "
<tr>
    <td>
    </td>
    <td>
        <input type='submit' name='task' value='Finish' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'>
        <input type='submit' name='task' value='preview' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'>
    </td>

</table></form></div>";


switch($task) {

 case "preview": 
    echo"rww";
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';
echo"
 <div class='eventHeaderContainer'>
 <div class='eventImageHeaderContainer'>
     <img src='$imageUrl$header_pic' alt=''>
     <div class='eventImageDescription'>
         <h1>Job Fair</h1>
     </div>
 </div>
</div>

<div class='eventDetailsContainer'>
 <div class='eventDescriptionBlock1'>
     <div class='eventDescriptionBlock1Header'>
         <div class='eventIcon1'>
             <img src='$imageUrl$icon_pic' alt=''>
            
         </div>
         <div class='eventTitle'>
             <h1>$e_name</h1>
             <h1>$e_tag</h1>
         </div>
         <div class='eventDatePosted'>
             <h2>12:51 PM May, 2023 </h2>
             <h1>
                 <i class='far fa-heart'></i> 
                 
             </h1>
         </div>
         
     </div>

     <div class='eventDecriptionBlock1Images'>
<div class='slideshow-container'>";
         //<img src='./NewEventHomePagePictures/fsc-job-fair-event.jpg' alt=''>
         for ($i = 0; $i < $max_entry; $i++) {
            // Check if the array values are set, otherwise set them to null
            $Slide_title = isset($S_title[$i]) ? $S_title[$i] : null;
            $Slide_des = isset($S_des[$i]) ? $S_des[$i] : null;
            $Slide_pic = isset($S_pic[$i]) ? $S_pic[$i] : null;
            echo"
            <div class='mySlides fade'>
            <div class='numbertext'> " . ($i+1) . "</div>
            <img src='$imageUrl$Slide_pic' style='width:100%'>
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
             "; 
         
     echo"</div>


     <div class='eventDecriptionBlock1MisDetails'>
         <div class='eventTime'>
             <p><span class='dateTime'>Date:</span> $e_date</p>
             <p><span class='dateTime'>Time:</span> $e_time</p>
         </div>
         <div class='eventMembers' style='text-align: center;'>
             <h1>Members</h1>
             <div>
                 <button>$e_members/$e_max_mem</button>
             </div>
         </div>
         <div class='joinSection'> 
             <p>$e_price</p>
             <button class='joinButton'>Join</button>
         </div>
     </div>

     
 </div>
 <div class='eventDescriptionBlock2'>
     <h1>Location</h1>
     <img style='margin-bottom:20px;'src='$imageUrl$places_Pic' alt='dfsdfs'>
     <!--<img src='$map_url' alt='Map'>
     <p><br> fsdf $map_url </p>-->
     <iframe width='100%' height='400' frameborder='0'
      style='border:0' src='$mapsUrl' allowfullscreen></iframe>
     <h2>Campus Center Ballroom</h2>
     <h2>$e_places</h2>

     <div class='eventPerks'>
     <h1>Perks</h1>";
    for ($i = 0; $i < $max_entries; $i++) {

        $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
         
        echo" <button>$Per_desc</button>";
    }
    echo"
     </div>
     <h1 style='margin-top: 40px; margin-bottom: 0px;'>Guest Speakers</h1>
     <div class='specialGuestsContainer'>
         <div class='guestIconContainter'>
             <img src='$imageUrl$guest_pic' alt=''>
             <div class='guestSpeakerDescription'>
                 <h2>$guest_name</h2>
                 <p>$guest_desc</p>
             </div>
         </div>
         
         <div class='guestIconContainter'>
             <img src='./NewEventHomePagePictures/jeff-bezos.jpg' alt=''>
             <div class='guestSpeakerDescription'>
                 <h2>Josh Smith</h2>
                 <p>Josh Smith is the president of Amazon and is visiting Farmigndale State College to talk about future jobs.
                     He is a must listen as you get to learn valuable knowledge and network with him
                 </p>
             </div>
         </div>

     </div>
 </div>
</div>
<div class='bottomEventContainer'>
 <div class='eventOverviewDescription'>
     <h1>Event Overview</h1>
     <p>$e_desc</p>
 </div>
</div>

";  break;

case "Finish":
    echo"good";
    include('Supabase_connect.php');
    //echo "$message";
    $query = 'INSERT INTO "event_page" ( "e_name", "e_tag", "e_desc", "e_pic", 
    "e_date", "e_time", "e_location", "e_places","place_pic","header_pic","icon_pic", "e_price", "e_categoris","e_max_mem","e_members","status") 
    VALUES (\''.$e_name.'\',\''.$e_tag.'\',\''.$e_desc.'\', \''.$e_pic.'\', \''.$e_date.'\',
     \''.$e_time.'\', \''.$mapsUrl.'\', \''.$e_places.'\', \''.$place_pic.'\', \''.$header_pic.'\',
      \''.$icon_pic.'\', \''.$e_price.'\', \''.$e_categoris.'\', \''.$e_max_mem.'\', \''.$e_members.'\', 1)
     RETURNING "event_id";';
    $result = pg_query($conn, $query);
    if ($result) {
        $event_id = pg_fetch_result($result, 0, 0);
        echo "<font color='green'> $event_id Your NEW Event Created.</font>\n";


        $query4 ='INSERT INTO "event_guest" ("e_guest_desc","e_guest_name","e_guest_pic","event_id", "color") 
        VALUES (\''.$guest_desc.'\',\''.$guest_name.'\',\''.$guest_pic.'\', \''.$event_id.'\', NULL) 
        RETURNING "e_guest_id";';
         $result4 = pg_query($conn, $query4);
         if ($result4) {
            $e_guest_id = pg_fetch_result($result4, 0, 0);
             echo "<font color='green'>$e_guest_id Your NEW Guest Created.</font>\n";}
             else { echo"Unable to add guest\n" . pg_last_error($conn);}


        for ($i = 0; $i < $max_entries; $i++) {
        // Check if the array values are set, otherwise set them to null
        $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
    $query2 ='INSERT INTO "event_perk" ("e_p_desc","event_id", "color") 
    VALUES (\''.$Per_desc.'\', \''.$event_id.'\', NULL) 
    RETURNING "e_perk_id";';
     $result2 = pg_query($conn, $query2);
     if ($result2) {
        $e_perk_id = pg_fetch_result($result2, 0, 0);
         echo "<font color='green'>$e_perk_id Your NEW perk Created.</font>\n";}
         else { echo"Unable to add perk\n" . pg_last_error($conn);}}


    for ($i = 0; $i < $max_entry; $i++) {
        // Check if the array values are set, otherwise set them to null
        $Slide_title = isset($S_title[$i]) ? $S_title[$i] : null;
        $Slide_des = isset($S_des[$i]) ? $S_des[$i] : null;
        $Slide_pic = isset($S_pic[$i]) ? $S_pic[$i] : null;

    $query3 ='INSERT INTO "event_slide" ("E_S_title", "E_S_des", "E_S_pic", "event_id")
    VALUES (\''.$Slide_title.'\', \''.$Slide_des.'\', \''.$Slide_pic.'\', \''.$event_id.'\')
     RETURNING "E_slide_id";';
     $result3 = pg_query($conn, $query3);
     if ($result3) {
        $E_slide_id = pg_fetch_result($result3, 0, 0);
         echo "<font color='green'>$E_slide_id Your NEW slideshow Created.</font>\n";}
         else { echo"Unable to add slideshow\n" . pg_last_error($conn);}}
    
    }else { echo"Unable to Make Account\n [$query] " . pg_last_error($conn);}
    
    echo"ooooook"; break;

case "First":  echo"oooooofff"; break;


}

?>

</section>

</body>

</html>


  
  <?php
  /*<form action="AddEvent.php" method="GET">
  <input type="text" name="location" placeholder="Enter a location" required>

  <button type="submit">Show Map</button> </form> 

   
  <form action="AddEvent.php" method="POST">
  <input type="text" name="location" placeholder="Enter a location" required>

  <button type="submit">Show Map</button> </form> */
  ?>