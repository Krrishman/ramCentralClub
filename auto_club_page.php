
<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
    include('Supabase_connect.php');
    if (isset($_POST['club_id']))					$club_id = $_POST['club_id'];		
    if (isset($_GET['r']))					{$club_id = $_GET['r'];}

    if (isset($_POST['task']))			$task = $_POST['task'];						else $task = "First";

    if (isset($_POST['comments']))			$comments = trim($_POST['comments']);	    else $comments = NULL;
    if (isset($_POST['rating']))			$rating = trim($_POST['rating']);       else $rating = NULL;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['Submit_Review'])) {
            echo" ";
        echo"<input type='hidden' name='club_id' value='$club_id'> ";
        $query5 ='INSERT INTO "club_comment" ("rating", "Likes", "Dislikes", "comments", "club_id", "com_name")
        VALUES (\''.$rating.'\', 0,0, \''.$comments.'\', \''.$club_id.'\', \''.$user_name.'\')
        RETURNING "com_id";';
        $result5 = pg_query($conn, $query5);
        if ($result5) {
            $com_id = pg_fetch_result($result5, 0, 0);
            echo "<font color='green'>$com_id Your Review Added.</font>\n";}
            else { echo"Unable to add Review\n" [$query5] . pg_last_error($conn);}
        
        echo"oovvvvvdddff $club_id"; }


        if (isset($_POST['join'])) {
            echo" ";
            include('Supabase_connect.php');
            // Update database with new user ID
            $query9 = 'UPDATE "club_page" SET "joined_users" = array_append(joined_users, \''.$user_name.'\') WHERE "club_id" = \'' . $club_id . '\'';
            $result9 = pg_query($conn, $query9);
          //  $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';
    
            // Check if query was successful
            if ($result9) {
              echo "Joined successfully!";
            } else {
              echo "Error joining club: " . pg_last_error($conn);
            }
          }

    }
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

$query4 = 'SELECT * FROM "club_comment" WHERE "club_id" =\'' . $club_id . '\';';
    $result4 = pg_query($conn, $query4);
    if (!$result4) {echo "Query Error [$query4] " . pg_last_error($conn);}

foreach($_POST as $keyx => $value) echo "$keyx = $value<br>";
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
                <form method='post' action='auto_club_page.php'>
                <input type='hidden' name='club_id' value='$club_id'>
                <button class='contactButton'><i style='color:white;' class='fa fa-envelope'></i> Contact Us</button>   
                <button class='joinButton' type='submit' name='join' value='join' >Join Now</button></form> </div>
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
             <form method='post' action='auto_club_page.php'>
            <input type='hidden' name='club_id' value='$club_id'>
            <div class='reviews'>
            <div class='reviewAvatar'>
                <img class='reviewIcon' src='./ClubHomePage/ClubHomePagePictures/person-icon.png' alt=''>
                <h3>$user_name </h3>
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
                        <textarea name='comments' value='$comments' size='500' cols='55' rows='5' placeholder='Review Content' ></textarea><br><p></p><br>
                        <input class='reviewButton' type='submit' name='Submit_Review' value='Submit_Review'>
                        </form>
                </div>
            </div> 
            </div>  ";

            while ($row = pg_fetch_assoc($result4)) {
                $com_id = $row['com_id'];
                $parent_id = $row['parent_id'];
                $Likes = $row['Likes'];
                $Dislikes = $row['Dislikes'];
               // $club_id = $row['club_id'];
                $event_id = $row['event_id'];
                $comments = $row['comments'];
                $rating = $row['rating'];
                $date = $row['date'];
                $com_name = $row['com_name'];

                echo"
                <div class='reviews'>
                        <div class='reviewAvatar'>
                            <img class='reviewIcon' src='./ClubHomePage/ClubHomePagePictures/person-icon.png' alt=''>
                            <h3>$com_name </h3>
                            <div> ";
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // full star
                                } else {
                                  echo '<i class="far fa-star"></i>'; // empty star
                                }
                            }

 echo"
                            </div>
                            <p>$date</p>
                              
                        </div>
                        <div class='reviewDescription'>
                                <p>$comments</p>
                        </div>
                        <div class='reviewfunction'>        
                        <button class='likeIcon' class='fa-regular fa-thumbs-up' id='likeButton'  onclick='likeComment($com_id)'>Like ($Likes)</button>
                        <button class='likeIcon' class='fa-regular fa-thumbs-down' id='dislikeButton' onclick='dislikeComment($com_id)'>Dislike ($Dislikes)</button>
                        <button class='reply-btn'  onclick='showReplyForm($com_id)'>Reply</button>
                        </div></div>
                        <div class='reply-section' id='reply-section-$com_id'>
                                <form method='post' class='reply-form' id='reply-form-$com_id' action='auto_club_page.php'>
                                <input type='hidden' name='club_id' value='$club_id'>
                                                        <div class='reviews'>
                                                        <div class='reviewAvatar'>
                                                            <img class='reviewIcon' src='./ClubHomePage/ClubHomePagePictures/person-icon.png' alt=''>
                                                            <h3>$user_name </h3>
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
                                                                    <textarea name='comments' value='$comments' size='500' cols='55' rows='5' placeholder='Review Content' ></textarea><br><p></p><br>
                                                                    <input class='reviewButton' type='submit' name='task' value='Submit_Review'>
                                                                    </form>
                                                            </div>
                                                        </div>
                                    </div>          
                            </div>    
                    </div> ";

            }

           echo"
           <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
        <script src='commment.js'></script>
           </section>";

            switch($task) {

                case "Submit_Review":  include('Supabase_connect.php');
                                echo"<input type='hidden' name='club_id' value='$club_id'> ";
                                $query5 ='INSERT INTO "club_comment" ("rating", "Likes", "Dislikes", "comments", "club_id", "com_name")
                                VALUES (\''.$rating.'\', 0,0, \''.$comments.'\', \''.$club_id.'\', \''.$com_name.'\')
                                RETURNING "com_id";';
                                $result5 = pg_query($conn, $query5);
                                if ($result5) {
                                    $com_id = pg_fetch_result($result5, 0, 0);
                                    echo "<font color='green'>$com_id Your Review Added.</font>\n";}
                                    else { echo"Unable to add Review\n" . pg_last_error($conn);}
                                
                                echo"ooooook $club_id"; break;
        case "join":
                                echo" ff";
                                include('Supabase_connect.php');
                                // Update database with new user ID
                                $query9 = 'UPDATE "club_page" SET "joined_users" = array_append(joined_users, \''.$user_name.'\') WHERE "club_id" = \'' . $club_id . '\'';
                                $result9 = pg_query($conn, $query9);
                              //  $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';
                        
                                // Check if query was successful
                                if ($result9) {
                                  echo "Joined successfully!";
                                } else {
                                  echo "Error joining club: " . pg_last_error($conn);
                                }
                                echo"ooooook $club_id"; break;

                case "Submit_join":     
                    echo "ssssssssssss";  
                     include('Supabase_connect.php');
                
                
                // Check if user is already joined
                $query8 = 'SELECT "joined_users" FROM "club_page" WHERE "club_id" = \'' . $club_id . '\'';
                $result8 = pg_query($conn, $query8);
                $row = pg_fetch_row($result8);
                $joined_users = explode(',', $row[0]);
                
                if (in_array($user_name, $joined_users)) {
                    // User is already joined, remove from list
                    $joined_users = array_diff($joined_users, [$user_name]);
                    $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';
                } else {
                    // User is not joined, add to list
                    array_push($joined_users, $user_id);
                    $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';
                }
                
                $result9 = pg_query($conn, $query9);
                
                if ($result9) {
                    echo "Success";
                } else {
                    echo "Error [" . $query9 . "] " . pg_last_error($conn);
                }  
                echo"ooooook $club_id"; break;
    }
        include('footer.php');
?>

<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src='commment.js'></script>
<script>


function showReplyForm(com_id) {
    // Get the reply form element based on the comment ID
    //var replyForm = $('#reply-form-' + com_id);
    var replyForm = $('#reply-section-' + com_id);
    //replyForm.toggle();
    replyForm.show();

}
	</script>

<script>
function likePost(com_id) {
  // update button state
  document.getElementById("likeButton").innerHTML = "Liked";
  document.getElementById("dislikeButton").disabled = true;
  // submit data to server via AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'like_post.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
      // handle response from server
      console.log(this.responseText);
  };
  xhr.send('com_id=' + com_id + '&action=like');
}

function dislikePost(com_id) {
  // update button state
  document.getElementById("dislikeButton").innerHTML = "Disliked";
  document.getElementById("likeButton").disabled = true;
  // submit data to server via AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'like_post.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
      // handle response from server
      console.log(this.responseText);
  };
  xhr.send('com_id=' + com_id + '&action=dislike');
}
</script>