
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="NewEventHomePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js">
</head>
<body>




<?php


$query = 'SELECT * FROM "club_page" WHERE "club_id" =\'' . $club_id . '\';';
    $result = pg_query($conn, $query);
    if (!$result) {echo "Query Error [$query] " . pg_last_error($conn);}


$query2 = 'SELECT * FROM "club_perk" WHERE "club_id" =\'' . $club_id . '\';';
    $result2 = pg_query($conn, $query2);
    if (!$result2) {echo "Query Error [$query2] " . pg_last_error($conn);}


$query3 = 'SELECT * FROM "club_slide" WHERE "club_id" =\'' . $club_id . '\';';
    $result3 = pg_query($conn, $query3);
    if (!$result3) {echo "Query Error [$query3] " . pg_last_error($conn);}

$query4 = 'SELECT * FROM "club_comment" WHERE "club_id" =\'' . $club_id . '\';';
    $result4 = pg_query($conn, $query4);
    if (!$result4) {echo "Query Error [$query4] " . pg_last_error($conn);}




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

";


?>

</section>

</body>

</html>
