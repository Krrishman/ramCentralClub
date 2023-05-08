
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="NewEventHomePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js">
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
  ?>
  <?php
    /*<h2>Map for: <?php echo $_POST['location']; ?></h2>
    <img src="<?php echo $map_url; ?>" alt="Map"> */

    
  //$cc=$map_url;
  //echo $location;
  }



if(isset($_POST['map_url'])) $map_url = $_POST['map_url'];
if(isset($_POST['eventName'])) $eventName = $_POST['eventName']; else $eventName = NULL;
if(isset($_POST['eventOrganizationName'])) $eventOrganizationName = $_POST['eventOrganizationName']; else $eventOrganizationName = NULL;
if(isset($_POST['eventDate'])) $eventDate = $_POST['eventDate']; else $eventDate = NULL;
if(isset($_POST['eventTime'])) $eventTime = $_POST['eventTime']; else $eventTime = NULL;
if(isset($_POST['eventLocation'])) $eventLocation = trim($_POST['eventLocation']); else $eventLocation = NULL;
if(isset($_POST['eventLocationPic'])) $eventLocationPic = trim($_POST['eventLocationPic']); else $eventLocationPic = NULL;
if(isset($_POST['eventPrice'])) $eventPrice = $_POST['eventPrice']; else $eventPrice = NULL;
if(isset($_POST['eventCategory'])) $eventCategory = $_POST['eventCategory']; else $eventCategory = NULL;
if(isset($_POST['eventOverview'])) $eventOverview = $_POST['eventOverview']; else $eventOverview = NULL;
if(isset($_POST['eventNumber'])) $eventNumber = $_POST['eventNumber']; else $eventNumber = NULL;
if(isset($_POST['eventMaxNumber'])) $eventMaxNumber = $_POST['eventMaxNumber']; else $eventMaxNumber = NULL;
if(isset($_POST['eventSpecialGuest'])) $eventSpecialGuest = $_POST['eventSpecialGuest']; else $eventSpecialGuest = NULL;
if(isset($_POST['eventGuestSpeaker'])) $eventGuestSpeaker = $_POST['eventGuestSpeaker']; else $eventGuestSpeaker = NULL;
if(isset($_POST['eventGuestSpeakerImage'])) $eventGuestSpeakerImage = $_POST['eventGuestSpeakerImage']; else $eventGuestSpeakerImage = NULL;
if(isset($_POST['eventGuestSpeakerDescription'])) $eventGuestSpeakerDescription = $_POST['eventGuestSpeakerDescription']; else $eventGuestSpeakerDescription = NULL;

if(isset($_POST['imageHeader'])) $imageHeader = $_POST['imageHeader']; else $imageHeader = NULL;
if(isset($_POST['image'])) $image = $_POST['image']; else $image = NULL;

if(isset($_POST['perk_desc'])) $perk_desc = $_POST['perk_desc']; else $perk_desc = NULL;
if(isset($_POST['S_title'])) $S_title = $_POST['S_title']; else $S_title = NULL;
if(isset($_POST['S_des'])) $S_des = $_POST['S_des']; else $S_des = NULL;
if(isset($_POST['picture'])) $picture = $_POST['picture']; else $picture = NULL;
if(isset($_POST['task'])) $task = $_POST['task']; else $task = NULL;





echo " <div class='event_make'>";
echo "    <div class='add_event_info'> <form action='AddEvent.php' method='post' enctype='multipart/form-data'>
<table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='4'>
<tr>
    <td width='30%'>Event Name</td>
    <td ><input type='text' name='eventName' value='$eventName'  size='40'></td>

<tr>
    <td width='30%'>Organization Name</td>
    <td ><input type='text' name='eventOrganizationName' value='$eventOrganizationName'  size='40'></td>

<tr>
    <td>Event Date</td>
    <td><input type='date' name='eventDate' value='$eventDate' size='40'></td>

<tr>
    <td>Event Time</td>
    <td><input type='text' name='eventTime' value='$eventTime' size='40' placeholder='12:00 PM - 2:00 PM'></td>

<tr>
    <td>Event Location</td>
    <td> <input type='text' name='location' placeholder='Enter a location'></td>

    <tr>
    <td>Event Place</td>
    <td> 
        <input type='text' name='eventLocation' value='$eventLocation' placeholder='Online or In-Person'></td>

    

<tr>
    <td>Upload Event Photo For Location (JPG, GIF, PNG or TIF File only):
    <td> <input type='file' name='$eventLocationPic' >$eventLocationPic</td></tr>
    <tr><td></td>
    <td><br></td>

<tr>
    <td>Event Price</td>
    <td>
        <label>Free </label><input type='radio' name='eventPrice' value='Free'>
        <label>$5 </label><input type='radio' name='eventPrice'   value='$5'>
        <label>$10 </label><input type='radio' name='eventPrice'  value='$10'>
        <label>$15 </label><input type='radio' name='eventPrice'  value='$15'>
        <label>$20 </label><input type='radio' name='eventPrice'  value='$20'>
    </td>


<tr>
    <td>Event Category 
    <td>
        <label> Science </label><input type='radio' name='eventCategory' value='Science'>
        <label> Health </label><input type='radio' name='eventCategory' value='Health'>
        <label> Entertainment </label><input type='radio' name='eventCategory'  value='Entertainment'>
        <label> Sports </label><input type='radio' name='eventCategory' value='Sports'>
        <label> Studies </label><input type='radio' name='eventCategory' value='Studies'>
        <label> Seminar </label><input type='radio' name='eventCategory' value='Seminar'>
        <label> Celebration </label><input type='radio' name='eventCategory' value='Celebration'>
        <label> Environment </label><input type='radio' name='eventCategory' value='Environment'>
        <label> Technology </label><input type='radio' name='eventCategory' value='Technology'>
        <label> Technology </label><input type='radio' name='eventCategory' value='Religion'>



<tr>
    <td>Event Overview</td>
    <td><textarea name='eventOverview' value='$eventOverview' size='500' cols='40' rows='10' >$eventOverview</textarea></td>

<tr>
    <td>Event Members</td>
    <td><input type='number' name='eventNumber' value='$eventMaxNumber'   size='12'></td>
   
<tr>
    <td>Event Max Members</td>
    <td><input type='number' name='eventMaxNumber' value='$eventMaxNumber'   size='12'></td>

<tr>
    <td>Guest Speaker</td>
    <td><input type='text' name='eventGuestSpeaker' value='$eventGuestSpeaker' size='30'></td>

<tr>
    <td>Guest Speaker Image</td>
    <td><input type='text' name='eventGuestSpeakerImage' value='$eventGuestSpeakerImage' size='30'></td>

<tr>
    <td>Guest Speaker Description</td>
    <td><textarea name='eventGuestSpeakerDescription' value='$eventGuestSpeakerDescription' size='100' cols='40' rows='5' >$eventGuestSpeakerDescription</textarea></td>

    <tr>
    <td>Upload Event Photo For Header (JPG, GIF, PNG or TIF File only):
    <td> <input type='file' name='imageHeader' >$imageHeader</td></tr>
    <tr><td></td>
    <td><br></td>

<tr>
    <td>Upload Event Photo Icon (JPG, GIF, PNG or TIF File only):
    <td> <input type='file' name='image' >$image</td></tr>
<tr><td></td>
    <td><br></td>
</tr>";
        $max_entries = 4;
        for ($i = 0; $i < $max_entries; $i++) {

             $perk_desc = $_POST['perk_desc']; // Assuming S_des is an array of values
             $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
      
       echo"
            <tr>
                <td>Perk No " . ($i+1) . " </td>
            </tr>
            <tr>
                <td>Perk Description</td>
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
    $_title = isset($S_title[$i]) ? $S_title[$i] : null;
    $S_des = $_POST['S_des']; // Assuming S_des is an array of values
    $_des = isset($S_des[$i]) ? $S_des[$i] : null;
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
        <td><input type='text' name='S_des[]' value='_des' size='50'></td>
    </tr>
    <tr>
        <td>Event Pic</td> 
        <td> <input type='file' name='picture[]' value='Slide_pic' size='50'>Slide_pic</td>
       
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

/*echo"
<form action='AddEvent.php' method='GET'>
<input type='text' name='location' value='$location' placeholder='Enter a location' required></td>
<button type='submit'>Show Map</button></form>";*/

echo "Event name: ". $eventName;

switch($task) {

case "test": 
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';

echo"<div class='club_right'><div class='club_Container'>
    <div class='image_Container'>
    <img class='club_Icon' src='$imageUrl$filename' alt=\"Avatar\">
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
        <img style='width:100%; height: 100px; object-fit: cover;' src='$imageUrl$filename' alt='avatar'>
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
 ";  break;


 case "preview": 
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';
echo"
 <div class='eventHeaderContainer'>
 <div class='eventImageHeaderContainer'>
     <img src='./NewEventHomePagePictures/fsc-job-fair.jpg' alt=''>
     <div class='eventImageDescription'>
         <h1>Job Fair</h1>
     </div>
 </div>
</div>

<div class='eventDetailsContainer'>
 <div class='eventDescriptionBlock1'>
     <div class='eventDescriptionBlock1Header'>
         <div class='eventIcon1'>
             <img src='./NewEventHomePagePictures/fsc-office-of-student-activities.jpg' alt=''>
            
         </div>
         <div class='eventTitle'>
             <h1>$eventName</h1>
             <h1>$eventOrganizationName</h1>
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
            echo"
            <div class='mySlides fade'>
            <div class='numbertext'> " . ($i+1) . "</div>
            <img src='./NewEventHomePagePictures/fsc-job-fair-event.jpg' style='width:100%'>
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
             <p><span class='dateTime'>Date:</span> $eventDate</p>
             <p><span class='dateTime'>Time:</span> $eventTime</p>
         </div>
         <div class='eventMembers' style='text-align: center;'>
             <h1>Members</h1>
             <div>
                 <button>$eventNumber/$eventMaxNumber</button>
             </div>
         </div>
         <div class='joinSection'> 
             <p>$eventPrice</p>
             <button class='joinButton'>Join</button>
         </div>
     </div>

     
 </div>
 <div class='eventDescriptionBlock2'>
     <h1>Location</h1>
     <img style='margin-bottom:20px;'src='./NewEventHomePagePictures/fsc-campus-center.jpg' alt=''>
     <!--<img src='$map_url' alt='Map'>
     <p><br> fsdf $map_url </p>-->
     <iframe width='100%' height='400' frameborder='0'
      style='border:0' src='$mapsUrl' allowfullscreen></iframe>
     <h2>Campus Center Ballroom</h2>
     <h2>$eventLocation</h2>

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
             <img src='./NewEventHomePagePictures/kim-jong-un.jpeg' alt=''>
             <div class='guestSpeakerDescription'>
                 <h2>$eventGuestSpeaker</h2>
                 <p>$eventGuestSpeakerDescription</p>
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
     <p>$eventOverview
     </p>
 </div>
</div>

";  break;








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