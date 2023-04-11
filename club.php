


<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
    include('FSC_connect.php');

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
        <div class="club_Grid">
            <div class="club_Container">
                <div class="image_Container">
                    <img class="club_Icon" src="ClubPictures/Psychology club.jpeg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                    <div class="information">
                        <h1 ><a style="text-decoration:none; color:white;" href="./club_home_page.php">Psychology Club</a></h1>
                        <p >Provide an opportunity for students to learn about the professions of psychology and their varied practices.</p>
                    </div>
                <div class="member_Counter">
                    <h1 class="counter_Text"><i class="fas fa-user-friends"></i> Members: 46</h1>
                </div>
            </div>
            
            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="ClubPictures/Art & Design Club.jpeg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1 ><a style="text-decoration:none; color:white;" href="./All Club Page/Art & Design Club/ClubHomePage.html">Art & Design Club</a></h1>
                    <p >A club where students can not only express themselves, but bring life and vibrancy to campus.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 67</h1>
                </div>
            </div>

            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="./All Club Page/Disability Coalition Club/picture/0.jpg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1><a style="text-decoration:none; color:white;" href="./All Club Page/Disability Coalition Club/ClubHomePage.html">Disability Club</a></h1>
                    <p >learn from one another and use our shared knowledge to explore new ideas, create new opportunities, and develop relationships we can carry into the future.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 124</h1>
                </div>
            </div>

            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="./All Club Page/Environmental Club/picture/0.jpg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1><a style="text-decoration:none; color:white;" href="./All Club Page/Environmental Club/ClubHomePage.html">Environmental Club</a></h1>
                    <p >Goal is to make the community aware of women, minorities and student talent in the computing industry.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 51</h1>
                </div>
            </div>

            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="ClubPictures/Supporting Women in Computing.jpeg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1 ><a style="text-decoration:none; color:white;" href="./All Club Page/Supporting Women in Computing/ClubHomePage.html">SWiC Club</a></h1>
                    <p >Goal is to make the community aware of women, minorities and student talent in the computing industry.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 18</h1>
                </div>
            </div>

            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="./All Club Page/Farmingdale Esports/picture/0.jpg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1 ><a style="text-decoration:none; color:white;" href="./All Club Page/Farmingdale Esports/ClubHomePage.html">Farmingdale Esports</a></h1>
                    <p >Goal is to make the community aware of women, minorities and student talent in the computing industry.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 18</h1>
                </div>
            </div>

            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="./All Club Page/Gaming Club/picture/0.jpg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1 ><a style="text-decoration:none; color:white;" href="./All Club Page/Gaming Club/ClubHomePage.html">Gaming Club</a></h1>
                    <p >Goal is to make the community aware of women, minorities and student talent in the computing industry.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 18</h1>
                </div>
            </div>


            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="./All Club Page/Institute of Electrical/picture/0.jpg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1 ><a style="text-decoration:none; color:white;" href="./All Club Page/Institute of Electrical/ClubHomePage.html">Institute of Electrical</a></h1>
                    <p >Goal is to make the community aware of women, minorities and student talent in the computing industry.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 18</h1>
                </div>
            </div>

            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="./All Club Page/M.S.A/picture/0.jpg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1 ><a style="text-decoration:none; color:white;" href="./All Club Page/M.S.A/ClubHomePage.html">M.S.A</a></h1>
                    <p >Goal is to make the community aware of women, minorities and student talent in the computing industry.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 18</h1>
                </div>
            </div>
            <div class="club_Container" >
                <div class="image_Container">
                    <img class="club_Icon" src="./All Club Page/Volleyball Club General Practice/picture/0.jpg" alt="">
                </div>
                <!--MAKE SURE THERE'S A WORD LIMIT TO WHAT CLUB DESCRIPTION CAN HAVE!!!-->
                <div class="information">
                    <h1 ><a style="text-decoration:none; color:white;" href="./All Club Page/Volleyball Club General Practice/ClubHomePage.html">Volleyball Club</a></h1>
                    <p >Goal is to make the community aware of women, minorities and student talent in the computing industry.</p>
                </div>
                <div class="member_Counter">
                    <h1 class="counterText"><i class="fas fa-user-friends"></i> Members: 18</h1>
                </div>
            </div>


        </div>
        

<?php

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
$query = "SELECT * FROM `club_page` ORDER BY $orderby $desc";
$result = mysqli_query($mysqli, $query);
if (!$result) echo "Query Error [$query] " . mysqli_error($mysqli);


echo "<div class='club_Grid'>";
// Process Query Results 
while(list($club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date) = mysqli_fetch_row($result)) {
    echo"<div class='club_Container'>
        <div class='image_Container'>
            <img class='club_Icon' src='./upload/club_page/$c_pic' alt='avatar'>
        </div>
            <div class='information'>
                <h1 ><a style='text-decoration:none; color:white;' href='./auto_club_page.php?r=$club_id'>$c_name</a></h1>
                <p >$c_tag</p>
            </div>
        <div class='member_Counter'>
            <h1 class='counter_Text'><i class='fas fa-user-friends'></i> Members: $c_members</h1>
        </div>
    </div>";


}
echo "</div><br>";

//$club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date

?>










    </body>



<?php


include('footer.php');

?>

