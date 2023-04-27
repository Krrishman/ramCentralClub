
<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
    include('Supabase_connect.php');
    if (isset($_POST['club_id']))					$club_id = $_POST['club_id'];		
    if (isset($_GET['r']))					{$club_id = $_GET['r'];}

?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="club_home_css.css">
        <link rel="stylesheet" href="SlideShow.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>

<section>
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
// Process Query Results 
 //  while(list($club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, 
   //  $made_by, $made_date, $t_color1, $t_color2, $t_text, $des_color, $des_text) = mysqli_fetch_row($result)) {
    while ($row = pg_fetch_assoc($result)) {
        $club_id = $row['club_id'];
        $c_name = $row['c_name'];
        $c_tag = $row['c_tag'];
        $c_desc = $row['c_desc'];
        $c_pic = $row['c_pic'];
        $c_members = $row['c_members'];
        $Date = $row['made_date'];
        $made_by = $row['made_by'];
        $t_color1 = $row['t_color1'];
        $t_color2 = $row['t_color2'];
        $t_text = $row['t_text'];
        $des_color = $row['des_color'];
        $des_text = $row['$des_text'];

echo"

    <div class='top'  style='background-image:radial-gradient($t_color1 40%, $t_color2);'>
                <div class='imageHeader'>
                    <img style='width:100%; height: 100px; object-fit: cover;' src=\"./upload/club_page/$c_pic\"  alt=\"Avatar\" alt=''>
                </div>
            <div class='nametag'>
            <h1 style='color:$t_text;' >$c_name</h1>
            <p style='color:$t_text;' > $c_tag</p>
            </div>
            <div class='buttonSection'>
                <div >
                <button class='contactButton'><i style='color:white;' class='fa fa-envelope'></i> Contact Us</button>   
                <button class='joinButton'>Join Now</button></div>
            </div>      
        </div>


        <div class='clubInfo' style='background-color:$des_color;' >
            <p style='color: $des_text;' >$c_desc</p>
        </div> <div class='listOfBenefitsGrid'>";

  //while(list($perk_id, $p_name, $p_desc,$p_pic, $club_id, $color) = mysqli_fetch_row($result2)) {

    while ($row = pg_fetch_assoc($result2)) {
        $perk_id = $row['perk_id'];
        $p_name = $row['p_name'];
        $p_desc = $row['p_desc'];
        $p_pic = $row['p_pic'];
        $club_id = $row['club_id'];
        $color = $row['color'];
    echo"
        
            <div class='listOfBenefits'>
                <div class='benefitsIcon'>
                    <img src='./ClubHomePage/ClubHomePagePictures/network-icon.jpg' alt='$p_pic'>
                </div>
                <div class='listOfBenefitsDesciption'>
                    <h3>$p_name</h3>
                    <p>$p_desc</p>
                </div>
            </div>  ";}

            echo"</div> </section> 
            <section> 
               <div class='slideshow-container'>
            
            
            ";

    //     while(list($slide_id, $S_title, $S_des, $S_pic, $club_id) = mysqli_fetch_row($result3)) {
            while ($row = pg_fetch_assoc($result3)) {
                $slide_id = $row['slide_id'];
                $S_title = $row['S_title'];
                $S_des = $row['S_des'];
                $S_pic = $row['S_pic'];
                $club_id = $row['club_id'];
                echo"
                
                <div class='mySlides fade'>
			<div class='numbertext'>$slide_id</div>
			<img src=\"./upload/club_page/$S_pic\" style='width:100%'>
			<div class='text'>$S_title<br>$S_des</div>
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

</section> ";
        
        
        }

        include('footer.php');
?>


	