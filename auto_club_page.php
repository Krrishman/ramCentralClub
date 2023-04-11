
<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
    include('FSC_connect.php');
    if (isset($_POST['club_id']))					$club_id = $_POST['club_id'];		
    if (isset($_GET['r']))					{$club_id = $_GET['r'];}

?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="club_home_css.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>

<section>
<?php        

$query = "SELECT * FROM `club_page` WHERE club_id =$club_id;";
	$result = mysqli_query($mysqli, $query);
	if (!$result) echo "Query Error [$query] " . mysqli_error($mysqli);


$query2 = "SELECT * FROM `club_perks` WHERE club_id =$club_id;";
	$result2 = mysqli_query($mysqli, $query2);
	if (!$result2) echo "Query Error [$query2] " . mysqli_error($mysqli);
// Process Query Results 
while(list($club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date) = mysqli_fetch_row($result)) {


echo"

<div class='top'>
                <div class='imageHeader'>
                    <img style='width:100%; height: 100px; object-fit: cover;' src=\"./upload/club_page/$c_pic\"  alt=\"Avatar\" alt=''>
                </div>
            <div class='nametag'>
            <h1>$c_name</h1>
            <p> $c_tag</p>
            </div>
            <div class='buttonSection'>
                <div >
                <button class='contactButton'><i style='color:white;' class='fa fa-envelope'></i> Contact Us</button>   
                <button class='joinButton'>Join Now</button></div>
            </div>      
        </div>


        <div class='clubInfo'>
            <p>$c_desc</p>
        </div> <div class='listOfBenefitsGrid'>";

while(list($perk_id, $p_name, $p_desc,$p_pic, $club_id, $color) = mysqli_fetch_row($result2)) {
    echo"
        
            <div class='listOfBenefits'>
                <div class='benefitsIcon'>
                    <img src='./ClubHomePage/ClubHomePagePictures/network-icon.jpg' alt='$p_pic'>
                </div>
                <div class='listOfBenefitsDesciption'>
                    <h3>$p_name</h3>
                    <p>$p_desc</p>
                </div>
            </div>  ";}}

            echo"</div> </section>  ";