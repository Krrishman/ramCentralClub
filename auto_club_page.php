
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
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';

echo"

    <div class='top'  style='background-image:radial-gradient($t_color1 40%, $t_color2);'>
                <div class='imageHeader'>
                    <img style='width:100%; height: 100px; object-fit: cover;' src='$imageUrl$c_pic'  alt=\"Avatar\" alt=''>
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
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';
    echo"
        
            <div class='listOfBenefits'>
                <div class='benefitsIcon'>
                    <img src='$imageUrl$p_pic' alt='$p_pic'>
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
                $imageUrl = 'https://drive.google.com/uc?export=view&id=';
                echo"
                
                <div class='mySlides fade'>
			<div class='numbertext'>$slide_id</div>
			<img src='$imageUrl$S_pic' style='width:100%'>
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
echo " <section> 

        <div class='overallReview'>
            <h1>Reviews & Ratings</h1>
            <div class='overallNumber'>
                <p class='number'>4.1</p>
                <p class='outOf5'>Out of 5</p>
            </div>
            <div class='ratingList'>
                <p class='starList'>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='averageRating'>
                    4.13 Rating
                </p>
            </div>
        </div>

        <div class='sortComments'>
            <label for='order'>Sort By: </label>
            <select name='options' id='options'>
                <option value='none' selected disabled hidden>Select an Option</option>
                <option value='$'>Most Liked</option>
                <option value='$'>Most Disliked</option>
                <option value='$'>Oldest</option>
                <option value='$'>Latest</option>
            </select>
        </div>

        <div class='reviewGrid'>
        <div class='reviews'>
                <div class='reviewAvatar'>
                    <img class='reviewIcon' src='./ClubHomePage/ClubHomePagePictures/person-icon.png' alt=''>
                    <h3>Alex Jones </h3>
                    <div>
                    <span class='fa fa-star checked'></span>
                    <span class='fa fa-star checked'></span>
                    <span class='fa fa-star checked'></span>
                    <span class='fa fa-star'></span>
                    <span class='fa fa-star'></span> 
                    </div>
                    <p>Feb 27, 2023</p>
                      
                </div>
                <div class='reviewDescription'>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsa.</p>
                </div>
                <div class='reviewfunction'>        
                        <span class='likeIcon'> <i class='fa-regular fa-thumbs-up'></i></span>
                        <span class='likeIcon'> <i class='fa-regular fa-thumbs-down'></i></span>
                        <button class='replyButton'>Reply</button>
                </div>                
            </div> ";

            echo" <form method='post' action='auto_club_page.php'>
            <div class='reviews'>
            <div class='reviewAvatar'>
                <img class='reviewIcon' src='./ClubHomePage/ClubHomePagePictures/person-icon.png' alt=''>
                <h3>Alex Jones </h3>
                <div class='Rating'>
                <label>Rating:</label>
                <select name='rating'>
                    <option value='1'>1 star</option>
                    <option value='2'>2 stars</option>
                    <option value='3'>3 stars</option>
                    <option value='4'>4 stars</option>
                    <option value='5'>5 stars</option>
                </select><br><br>
                </div>
            </div>
                <div class='reviewDescription'>
                        <textarea name='content' value='' size='500' cols='55' rows='5' placeholder='Review Content' ></textarea><br><p></p><br>
                        <input class='reviewButton' type='submit' value='Submit Review'>
                        </form>
                </div>
            </div> 
            
            </section> ";

        include('footer.php');
?>


	