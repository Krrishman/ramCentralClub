
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
		<link rel="stylesheet" href="EventsPage.css">
		<link rel="stylesheet" href="footer.css">
    </head>

<body>

        <div class="sele">
            <div class="add_event">
    <a href='AddEvent.php?r=add_club'><button>Add Event</button></a>
    </div>
             <h2>More Upcoming Events</h2>
        <label for="mySelect">Select :</label>
                <select id="mySelect">
                <option value="apple">Date</option>
                <option value="banana">A to Z</option>
                <option value="orange">Off-site </option>
                <option value="pear">In-person</option>
                </select>
            </div>
        <!--Sidebar Menu For Filtering-->
        
        <?php

 $query = 'SELECT * FROM "event_page" '.$orderby.' '.$desc.'';
$result = pg_query($conn, $query);
if (!$result) { echo "Query Error [$query] " . pg_last_error($conn);}

  echo'  <div class="events-Gridr">';
while ($row = pg_fetch_assoc($result)) {
    $event_id = $row['event_id'];
    $e_name = $row['e_name'];
    $e_tag = $row['e_tag'];
    $e_desc = $row['e_desc'];
    $e_pic = $row['e_pic'];
    $e_date = $row['e_date'];
    $e_time = $row['e_time'];
    $e_location = $row['e_location'];
    $e_place = $row['e_place'];
    $place_pic = $row['place_pic'];
    $header_pic = $row['header_pic'];
    $icon_pic = $row['icon_pic'];
    $e_price = $row['e_price'];
    $e_categoris = $row['e_categoris'];
    $e_max_mem = $row['e_max_mem'];
    $e_place = $row['e_place'];
    $e_members = $row['e_members'];
    $made_Date = $row['made_date'];
    $joined_users = $row['joined_users'];
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';

    $mo = date("F", strtotime($e_date));
    $da = date('d', strtotime($e_date));
    $day = date("l", strtotime($e_date));
echo"
    <div class='EventContainerr'>
        <div class='coverr'>
            <img src='$imageUrl$icon_pic' alt='./Homepage/Pictures/volleyball.png'>
        </div>
        <div class='eventDescriptionr'>
            <div  class='calr'>
                <p>$mo</p>
                <h1>$da</h1>
                <p> $day</p>
            </div>

            <div class='textr'>
                <h1 class='Titler'><a style='text-decoration:none; color: black;' href='./Auto_Event.php?r=$event_id'>$e_name</a></h1>
                <p class='Locationr'><i class='fas fa-location-dot'></i> $e_place</p>
                <p class='Locationr'><i class='fas fa-location-dot'></i> $e_time</p>
            </div>               
         </div>  
    </div>";

}

echo "</div><br>";

?>

        
        <!--Events Grid With Multile Divs and SubDivs to list events-->
        <div class="events-Gridr">
            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/volleyball.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>10</h1>
                        <p> 9:00pm</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler"><a style="text-decoration:none; color: black;" href="./EventPage/EventHomePage.html">Volleyball Practice</a></h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> All Sportz Melvile</p>
                    </div>               
                 </div>  
            </div>


            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/success.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>14</h1>
                        <p> 2:00pm</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">Growth Mindset</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Greenly Hall, Room 302</p>
                    </div>               
                 </div>  
            </div>


            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/esports.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>18</h1>
                        <p> 7:00pm</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">Rocket League Game</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Online</p>
                    </div>               
                 </div>  
            </div>


            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/farmingdale tesla.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>20</h1>
                        <p>11:00am</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">NSBE General meeting</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Lupton 248</p>
                    </div>               
                 </div>  
            </div>


            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/art.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>18</h1>
                        <p> 11:00am</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">Calligraphy Workshop</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Hale Hall 224</p>
                    </div>               
                 </div>  
            </div>


            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/msg job fair.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>25</h1>
                        <p> 11:00am</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">MSA Job Fair</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Madison Square Garden</p>
                    </div>               
                 </div>  
            </div>


            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/art.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>18</h1>
                        <p> 11:00am</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">Calligraphy Workshop</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Hale Hall 224</p>
                    </div>               
                 </div>  
            </div>


            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/art.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>18</h1>
                        <p> 11:00am</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">Calligraphy Workshop</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Hale Hall 224</p>
                    </div>               
                 </div>  
            </div>

            
            <div class="EventContainerr">
                <div class="coverr">
                    <img src="./Homepage/Pictures/art.png" alt="">
                </div>
                <div class="eventDescriptionr">
                    <div  class="calr">
                        <p>March</p>
                        <h1>18</h1>
                        <p> 11:00am</p>
                    </div>
    
                    <div class="textr">
                        <h1 class="Titler">Calligraphy Workshop</h1>
                        <p class="Locationr"><i class="fas fa-location-dot"></i> Hale Hall 224</p>
                    </div>               
                 </div>  
            </div>
        </div>
        
        
    </body>


<?php


    include('footer.php');

?>
