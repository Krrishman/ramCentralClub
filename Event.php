
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo"gg ";
    if (isset($_GET['r']))					{$event_id = $_GET['r'];}
    if (isset($_POST['delete'])) {
        echo" ";
        include('Supabase_connect.php');
        echo"<input type='hidden' name='event_id' value='$event_id'> ";

        $query2 = 'UPDATE "event_page" SET "status" = 3
        WHERE "event_page"."event_id"= \'' . $event_id . '\'';
           $result2 = pg_query($conn, $query2);

           if ($result2) {
             echo "Deleted successfully!";
           } else {
             echo "Error Deleted club: " . pg_last_error($conn);
           }
    }
}


$order = isset($_POST['options']) ? $_POST['options'] : 'none';

$query = 'SELECT * FROM "event_page" where "status"= \'' . 1 . '\' ORDER BY';

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
        $query .= '"e_members" ASC';
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





echo"
   <form method='post' action='Event.php?r=$event_id'>
    <div class='EventContainerr'>
    <div class='icon'>
    <a href='#' >
        <img class='more_icon' onclick='showedit($event_id)' 
        src='./icon/more_menu_icon.png' alt='avatar'>  </a>
    </div>
    <div class='icon_option' id='icon_option_$event_id'>
        <a href='edit_event.php?r=$event_id&task=test'>Edit</a>
        <input type='submit' name='delete' value='delete' >
    </div>
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
    </div></form>";

}

echo "</div><br>";

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="touggle.js"></script>

</body>
<?php


    include('footer.php');

?>
