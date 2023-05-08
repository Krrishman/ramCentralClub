


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
		<link rel="stylesheet" href="cclub_Page.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>
    <div class="add_club">
    <a href='create_club.php?r=add_club'><button>Add Club</button></a>
    </div>
        <div class="sele">
             <h3>List of Clubs</h3>
        <label for="mySelect">Select :</label>
                <select id="mySelect">
                <option value="apple">Genre</option>
                <option value="banana">A to Z</option>
                <option value="orange">Relevent </option>
                </select>
            </div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['r']))					{$club_id = $_GET['r'];}
    if (isset($_POST['delete'])) {
        include('Supabase_connect.php');
        echo"<input type='hidden' name='club_id' value='$club_id'> ";

        $query2 = 'UPDATE "club_page" SET "status" = 3
        WHERE "club_page"."club_id"= \'' . $club_id . '\'';
           $result2 = pg_query($conn, $query2);

           if ($result2) {
             echo "Deleted successfully!";
           } else {
             echo "Error Deleted club: " . pg_last_error($conn);
           }
    }
}



$cat	= array('club_id', 'made_date', 'c_members');
$sort	= array('Ascending', 'Descending');
if (isset($_POST['orderby'])) 	$orderby = $_POST['orderby'];	else $orderby = 'club_id';
if (isset($_POST['ad'])) 		$ad 	 = $_POST['ad'];		else $ad 	  = NULL;
if ($ad == 'Descending')		$desc	 = 'DESC';				else $desc	  = NULL;
foreach($_POST as $keyx => $value) echo "$keyx = $value<br>"; 



echo "<form action='Club.php' method='POST' align='center' > 
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



$query = 'SELECT * FROM "club_page" where "status"= 1 ORDER BY '.$orderby.' '.$desc.'';
$result = pg_query($conn, $query);
if (!$result) { echo "Query Error [$query] " . pg_last_error($conn);}
// club_id | c_name  | c_tag  | c_desc  | c_pic | c_members | made_by | made_date | t_color1 | t_color2 | t_text  |des_color | des_text status

echo "<div class='club_Grid'>";
while ($row = pg_fetch_assoc($result)) {
    $club_id = $row['club_id'];
    $c_name = $row['c_name'];
    $c_tag = $row['c_tag'];
    $c_desc = $row['c_desc'];
    $c_pic = $row['c_pic'];
    $c_members = $row['c_members'];
    $Date = $row['made_date'];
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';

echo"<form method='post' action='Club.php?r=$club_id'>
        <div class='club_Container'>   
           
        <div class='icon'>
            <a href='#' ><img class='more_icon' onclick='showMore($club_id)' src='./icon/more_menu_icon.png' alt='avatar'>  </a>
        </div>
        <div class='icon_option' id='icon_option_$club_id'>
            <a href='edit_club.php?r=$club_id&task=test'>Edit</a>
            <input type='submit' name='delete' value='delete' >
        </div>
        <div class='image_Container'>
            <img class='club_Icon' src='$imageUrl$c_pic' alt='avatar'>
        </div>
            <div class='information'>
                <h1 ><a style='text-decoration:none; color:white;' href='./auto_club_page.php?r=$club_id'>$c_name</a></h1>
                <p >$c_tag</p>
            </div>
        <div class='member_Counter'>
            <h1 class='counter_Text'><i class='fas fa-user-friends'></i> Members: $c_members</h1>
        </div>
    </div></form>";

}

echo "</div><br>";

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="touggle.js"></script>

<div class="events-Gridrr">
        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="../ClubHomePage/ClubHomePagePictures/artClub.jpg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr">
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="./EventPage/EventHomePage.html">Volleyball Club</a></h1>
                    <p class="descriptrrr">
                         The Volleyball Club was founded in 1987 and it was when John Smith had went to the
                         Dean of Farmingdale to propose a club for sports. After a long debate, 
                         the club has been established. The club has originally started with 7 people but
                         now has has about 60 members.</p>
                </div>               
            </div>
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/Esports_Logo.jpeg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" >
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="./EventPage/EventHomePage.html">Esports Club</a></h1>
                    <p class="descriptrrr">
                         Farmingdale Esports 2004 and it was when a group of gaming enthusiasts called the "Gamers" proposed a gaming club. 
                         Their intention was to reduce stress from students who had a lot of studies to do by issuing gaming tournaments.
                         </p>
                </div>               
            </div>
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/Art_Logo.jpeg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" >
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="./EventPage/EventHomePage.html">Art Club</a></h1>
                    <p class="descriptrrr">
                         The Art Club was founded in 1980 and it was when Jane Doe and a few of her friends
                         wanted to propose a club to show creativity and their skills to the entire school. After consideration by the Art Department, 
                         the club was ratified and became a popular club up to this day.</p>
                </div>               
            </div>
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/IEEE_Club_Logo.png" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" >
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="./EventPage/EventHomePage.html">IEEE Club</a></h1>
                    <p class="descriptrrr">
                         This club was founded in 2008 and it was when James Johnson thought it would've been a great idea to 
                         have engineering students come together and work on valuable projects. After a proposal to the Sciences department,
                         the club was approved.</p>
                </div>               
            </div>
            
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/ACMClug_Logo.png" alt="">
            </div>
            <div class="eventDescriptionrr">
                
                    <div> <h1 class="Titlerr"><a  href="./EventPage/EventHomePage.html">ACM Club</a></h1></div>
                    <div> <p class="descriptrrr">
                         ACM Club was founded in 2010 and it was when Mike Adams found an issue of Computer Science students
                         not being involved as much in activities relating to their studies. 
                         This was an ongoing issue that even the school knew had to be resolved.</p></div>               
            </div>
            
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/EnvironmentalClub_Logo.jpeg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" >
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="./EventPage/EventHomePage.html">Environmental Club</a></h1>
                    <p class="descriptrrr">
                         A group of students in 2003 proposed an idea to help the environment surronding them as the realization of Global Warming and Climate Change
                        has started to become recognized. This issue had to be mitigated since Farmingdale struggling keeping the campus clean.</p>
                </div>               
            </div>
            
        </div>

    </div>

    </body>

<?php


include('footer.php');

?>

