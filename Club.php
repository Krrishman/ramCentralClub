


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

    if (isset($_POST['delete'])) {
        echo" ";
        include('Supabase_connect.php');
        echo"<input type='hidden' name='club_id' value='$club_id'> ";

        $query2 = 'UPDATE "club_page" SET "status" = 3
        WHERE "club_page"."club_id"= \'' . $club_id . '\'';
           $result2 = pg_query($conn, $query2);

           if ($result2) {
             echo "Joined successfully!";
           } else {
             echo "Error joining club: " . pg_last_error($conn);
           }
    }
}



$cat	= array('club_id', 'made_date', 'c_members');
$sort	= array('Ascending', 'Descending');
if (isset($_POST['orderby'])) 	$orderby = $_POST['orderby'];	else $orderby = 'club_id';
if (isset($_POST['ad'])) 		$ad 	 = $_POST['ad'];		else $ad 	  = NULL;
if ($ad == 'Descending')		$desc	 = 'DESC';				else $desc	  = NULL;
foreach($_POST as $keyx => $value) echo "$keyx = $value<br>"; 



echo "<form action='club.php' method='POST' align='center' > 
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



$query = 'SELECT * FROM "club_page" ';
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

echo"<form method='post' action='club.php'>  <div class='club_Container'>   
            <input type='hidden' name='club_id' value='$club_id'>
        <div class='icon'>
            <a href='#' ><img class='more_icon' onclick='showMore($club_id)' src='./icon/more_menu_icon.png' alt='avatar'>  </a>
        </div>
        <div class='icon_option' id='icon_option_$club_id'>

            <a href='edit_club.php?r=$club_id&task=test'>Edit</a>
            <button type='submit' name='delete' value='delete' >Delete</button> </div>
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

    </body>

<?php


include('footer.php');

?>

