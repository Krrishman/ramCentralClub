
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


        
        <?php



/*

$cat	= array('event_id', 'e_date', 'e_members');
$sort	= array('Ascending', 'Descending');
if (isset($_POST['orderby'])) 	$orderby = $_POST['orderby'];	else $orderby = 'club_id';
if (isset($_POST['ad'])) 		$ad 	 = $_POST['ad'];		else $ad 	  = NULL;
if ($ad == 'Descending')		$desc	 = 'DESC';				else $desc	  = NULL;
foreach($_POST as $keyx => $value) echo "$keyx = $value<br>"; 



echo "<form action='Event.php' method='POST' align='center' > 
<p width='500px' > Sort By: <select name='orderby' onchange='this.form.submit();'>";
foreach($cat as $category) {
if ($orderby == $category) $se = 'SELECTED'; else $se = NULL;
echo "<option $se>$category</option>\n";
}
echo "</select> <select name='ad' onchange='this.form.submit();'>";
foreach($sort as $value) {
if ($ad == $value) $se = 'SELECTED'; else $se = NULL;
echo "<option $se>$value</option>\n";
}
echo "</select></p></form>"; 
$query = 'SELECT * FROM "event_page" ORDER BY '.$orderby.' '.$desc.'';

*/


$order = isset($_POST['options']) ? $_POST['options'] : 'none';

$query = 'SELECT * FROM "event_page" where "status"= 1 ORDER BY';

switch ($order) {
    case 'Upcoming':
        $query .= '"e_date" DESC';
        break;
    case 'Free':
        $query .= '"e_price" = \' Free \' DESC';
        break;
    case 'Highest_Member':
        $query .= '"e_members" DESC';
        break;
    case 'Lowest_Member':
        $query .= '"e_members" DESC';
        break;
    case 'oldest':
        $query .= '"made_date" ASC';
        break;
    case 'latest':
        $query .= '"made_date" DESC';
        break;
    default:
        $query .= '"event_id" ASC';
        break;
}


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
    $e_places = $row['e_places'];
    $e_members = $row['e_members'];
    $made_Date = $row['made_date'];
    $joined_users = $row['joined_users'];
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';

    $mo = date("F", strtotime($e_date));
    $da = date('d', strtotime($e_date));
    $day = date("l", strtotime($e_date));



echo "
<form method='POST' action='Event.php' align='center'>
    <p width='500px' ><label for='options'>Sort By:</label>
    <select name='options' id='options' onchange='this.form.submit()'>
        <option value='' disabled selected hidden>Select an Option</option>
        <option value='Upcoming'>Upcoming</option>
        <option value='Free'>Free</option>
        <option value='Highest_Member'>Highest Member</option>
        <option value='Lowest_Member'>Lowest Member</option>
        <option value='oldest'>Oldest</option>
        <option value='latest'>Latest</option>
    </select></p>
</form>";


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
                <p class='Locationr'><i class='fas fa-location-dot'></i> $e_places</p>
                <p class='Locationr'><i class='fas fa-location-dot'></i> $e_time</p>
            </div>               
         </div>  
    </div>";

}

echo "</div><br>";

?><?php
/*
        
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



*/

    include('footer.php');

?>
