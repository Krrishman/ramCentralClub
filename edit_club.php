

<?php

echo"<p style=' width:100%; padding: 30px;'></p>";

include('session.php');
//include('check_logon.php');
include('menubar.php');
include('Supabase_connect.php');


?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="edit_club.css">
    <link rel="stylesheet" href="SlideShow.css">
    <link rel="stylesheet" href="footer.css">
</head>
<style>
    .color-box {
        width: 50px;
        height: 50px;
        display: inline-block;
        margin-right: 10px;
        border: 1px solid #000;
    }
</style>
<body>
<section>
<?php
//$club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date
$dd= date("Y-m-d");
$i=1;
$file_name =NULL;

if (isset($_POST['task']))			$task = $_POST['task'];						else $task = "test";
if (isset($_GET['r']))				{$club_id = $_GET['r'];}	

if (isset($_POST['club_id']))			$club_id = trim($_POST['club_id']);
if (isset($_POST['c_name']))			$c_name = trim($_POST['c_name']);       //else $c_name = NULL;
if (isset($_POST['color']))			    $color = trim($_POST['color']);       //else $color = NULL;
if (isset($_POST['c_tag']))				$c_tag = trim($_POST['c_tag']);         //else $c_tag = NULL;
if (isset($_POST['c_desc']))			$c_desc = trim($_POST['c_desc']);       //else $c_desc = NULL;
if (isset($_POST['c_pic']))			    $c_pic = trim($_POST['c_pic']);         //else $c_pic = NULL;
if (isset($_POST['c_members']))			$c_members = trim($_POST['c_members']); //else $c_members = NULL;
if (isset($_POST['made_by']))			$made_by = trim($_POST['made_by']);     //else $made_by = NULL;
if (isset($_POST['made_date']))			$made_date = trim($_POST['made_date']); //else $made_date = NULL;

if (isset($_POST['t_color1']))			$t_color1 = trim($_POST['t_color1']);      //else $t_color1 = 'purple';
if (isset($_POST['t_color2']))			$t_color2 = trim($_POST['t_color2']);      //else $t_color2 = 'black';
if (isset($_POST['t_text']))			$t_text = trim($_POST['t_text']);         // else $t_text = 'white';
if (isset($_POST['des_color']))			$des_color = trim($_POST['des_color']);   // else $des_color = 'black';
if (isset($_POST['des_text']))			$des_text = trim($_POST['des_text']);     // else $des_text = 'white';

if (isset($_POST['Slide_title']))       {$Slide_title = $_POST['Slide_title'];} else {$Slide_title = array();}
if (isset($_POST['Slide_des']))         {$Slide_des = $_POST['Slide_des'];}     else {$Slide_des = array();}
if (isset($_POST['slide_id']))          {$slide_id = $_POST['slide_id'];}       else {$slide_id = array();}

if (isset($_POST['perk_name']))         {$perk_name = $_POST['perk_name'];}     else {$perk_name = array();}
if (isset($_POST['perk_desc']))         {$perk_desc = $_POST['perk_desc'];}     else {$perk_desc = array();}
if (isset($_POST['perk_id']))           {$perk_id = $_POST['perk_id'];}         else {$perk_id = array();}
if (isset($_POST['perk_pic']))          {$perk_pic = $_POST['perk_pic'];}       else {$perk_pic = array();}

//$perk_names = isset($_POST['perk_name']) ? $_POST['perk_name'] : array();
//$perk_descs = isset($_POST['perk_desc']) ? $_POST['perk_desc'] : array();

//$Slide_titles = isset($_POST['Slide_title']) ? $_POST['Slide_title'] : array();
//$Slide_dess = isset($_POST['Slide_des']) ? $_POST['Slide_des'] : array();
//$Slide_pics = isset($_POST['Slide_pic']) ? $_POST['Slide_pic'] : array();


//foreach($_POST as $keyx => $value) echo "<p align='center'>$keyx = $value<br>"; 
function displayPostData($data, $prefix = '') {
    foreach ($data as $key => $value) {
        if (is_array($value)) { displayPostData($value, $prefix . $key . '[]');}
        else {echo "<p align='center'>$prefix$key = $value<br>";}
    }
}

displayPostData($_POST);

switch($task) {

    case "preview":   
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';
        echo"   
 <section>
        <input type='hidden' name='club_id' value='$club_id'> 
        <div class='top'  style='background-image:radial-gradient($t_color1 40%, $t_color2);' >
                <div class='imageHeader'>
                    <img style='width:100%; height: 100px; object-fit: cover;' src='$imageUrl$c_pic'  alt='xzc'>
                </div>
            <div class='nametag'>
            <h1 style='color:$t_text;' >$c_name</h1>
            <p  style='color:$t_text;' > $c_tag</p>
            </div>
            <div class='buttonSection'>
                <div >
                <button class='contactButton'><i style='color:white;' class='fa fa-envelope'></i> Contact Us</button>   
                <button class='joinButton'>Join Now</button></div>
            </div>      
        </div>


        <div class='clubInfo'  style='background-color:$des_color;'>
            <p  style='color: $des_text;' >$c_desc</p>
        </div> </section>  
        <section>
        <div class='listOfBenefitsGrid'>";

                for ($i = 0; $i < count($perk_id); $i++) {
                    $imageUrl = 'https://drive.google.com/uc?export=view&id=';
                    //$perk_id[$i];
           echo"
           <input type='hidden' name='perk_id' value='$perk_id[$i]'>
            <div class='listOfBenefits'>
                <div class='benefitsIcon'>
                    <img src='$imageUrl$perk_pic[$i]' alt='Per_pic'>
                </div>
                <div class='listOfBenefitsDesciption'>
                    <h3>$perk_name[$i]</h3>
                    <p>$perk_desc[$i]</p>
                </div>
            </div>  ";}

            echo"</div> </section>  
            
            <section> 
            <div class='slideshow-container'>";

            for ($i = 0; $i < count($slide_id); $i++) {
                    $imageUrl = 'https://drive.google.com/uc?export=view&id=';
           echo"
           <input type='hidden' name='perk_id' value='$slide_id[$i]'>
            <div class='mySlides fade'>
            <div class='numbertext'> " . ($i+1) . "</div>
            <img src='$imageUrl' style='width:100%' alt='Per_pic'>
            <div class='text'>$Slide_title[$i]<br>$Slide_des[$i]</div>
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

</section>";     break;

case "Finish":   
                include('Supabase_connect.php');

                $query = 'UPDATE "club_page" SET "c_name" = \'' .$c_name. '\',"c_tag" = \'' .$c_tag. '\',
                "c_desc" = \'' .$c_desc. '\',"c_members" = \'' .$c_members. '\',
                "t_color1" = \'' .$t_color1. '\',"t_color2" = \'' .$t_color2. '\',"t_text" = \'' .$t_text. '\',
                "des_color" = \'' .$des_color. '\',"des_text" = \'' .$des_text. '\'
                WHERE "club_page"."club_id" = \'' . $club_id . '\';';
                $result = pg_query($conn, $query);
                if ($result) { echo"Your Club updated. $club_id";
                          
                
                for ($i = 0; $i < count($perk_id); $i++) {
                    $query2 = 'UPDATE "club_perk" SET "p_name" = \'' . $perk_name[$i] . '\', "p_desc" = \'' . $perk_desc[$i] . '\'
                                WHERE "club_perk"."club_id" = \'' . $club_id . '\' AND "perk_id" = \'' . $perk_id[$i] . '\';';
                    $result2 = pg_query($conn, $query2);
                    if ($result2) {
                        echo "Perk ID " . $perk_id[$i] . " updated.";
                    } else {
                        echo "Unable to update perk ID " . $perk_id[$i] . ": " . pg_last_error($conn);
                    }
                }


                for ($i = 0; $i < count($slide_id); $i++) {
                    $query3 = 'UPDATE "club_slide" SET "S_title" = \'' . $Slide_title[$i] . '\', "S_des" = \'' . $Slide_des[$i] . '\'
                                WHERE "club_slide"."club_id" = \'' . $club_id . '\' AND "slide_id" = \'' . $slide_id[$i] . '\';';
                    $result3 = pg_query($conn, $query3);
                    if ($result3) {
                        echo "Slide ID " . $slide_id[$i] . " updated.";
                    } else {
                        echo "Unable to update slide ID " . $slide_id[$i] . ": " . pg_last_error($conn);
                    }
                }
                
                }
                else { echo"Unable to Make update" . pg_last_error($conn);}
                
                echo"ooooook"; break;
case "test":
    include('Supabase_connect.php');

    $query = 'SELECT * FROM "club_page" WHERE "club_id" = \'' . $club_id . '\';';
    $result = pg_query($conn, $query);
    if (!$result) { echo "Query Error [$query] " . pg_last_error($conn);}
    
    $query2 = 'SELECT * FROM "club_perk" WHERE "club_id" =\'' . $club_id . '\';';
    $result2 = pg_query($conn, $query2);
    if (!$result2) { echo "Query Error [$query2] " . pg_last_error($conn);}

    $query3 = 'SELECT * FROM "club_slide" WHERE "club_id" =\'' . $club_id . '\';';
    $result3 = pg_query($conn, $query3);
    if (!$result3) { echo "Query Error [$query3] " . pg_last_error($conn);}

    while ($row = pg_fetch_assoc($result2)) {
        $perk_id[] = $row['perk_id'];
        $perk_name[] = $row['p_name'];
        $perk_desc[] = $row['p_desc'];
        $perk_pic[] = $row['p_pic'];
        $perk_color[] = $row['color'];
    }

    while ($row = pg_fetch_assoc($result3)) {
        $slide_id[] = $row['slide_id'];
        $Slide_title[] = $row['S_title'];
        $Slide_des[] = $row['S_des'];
        $Slide_pic[] = $row['S_pic'];
    }

    if (pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);
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
        $des_text = $row['$des_text']; }

/*
        $max_entries = 4;
                for ($i = 0; $i < $max_entries; $i++) {

                   $perk_name = $_POST['perk_name']; // Assuming S_title is an array of values
                   $perk_desc = $_POST['perk_desc']; // Assuming S_des is an array of values

        
                    $Per_pic = isset($perk_pic[$i]) ? $perk_pic[$i] : null;
                    $Per_name = isset($perk_name[$i]) ? $perk_name[$i] : null;
                    $Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;

                    while ($row = pg_fetch_assoc($result2)) {
                        $perk_id = $row['perk_id'];
                        $per_name = $row['p_name'];
                        $per_desc = $row['p_desc'];
                        $per_pic = $row['p_pic'];
                       // $club_id = $row['club_id'];
                        $color = $row['color'];}
                    }
*/
        echo"yyyyyyyyyeeeeeeeeeesssssss";
        break;


}

echo " <div class='club_make'>";
echo "    <div class='add_club_info'> 
<form action='edit_club.php' method='post' enctype='multipart/form-data'>
<table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='4'>

<input type='hidden' name='club_id' value='$club_id'>
<tr><td width='30%'>Club Name</td><td ><input type='text' name='c_name' value='$c_name'  size='40'></td>
<tr><td>Background color </td><td><input type='color' name='t_color1' value='$t_color1' >       
<input type='color' name='t_color2' value='$t_color2' ></td>
<tr><td>Text color </td><td><input type='color' name='t_text' value='$t_text' ></td>

<tr><td>Club Tag </td><td><input type='text' name='c_tag' value='$c_tag' rows='10'  size='50'></td>
<tr><td>Club Description</td><td><textarea name='c_desc' value='$c_desc' size='500' cols='40' rows='10' >$c_desc</textarea></td>
<tr><td>Background color </td><td><input type='color' name='des_color' value='$des_color' ></td>
<tr><td>Text color </td><td><input type='color' name='des_text' value='$des_text' ></td>

<tr><td>Club Members</td><td><input type='number' name='c_members' value='$c_members'   size='12'></td>
<tr><td>Upload Club Photo(JPG, GIF, PNG or TIF File only):
    <td> <input type='file' name='image' value='$c_pic'>$c_pic</td></tr>
    <input type='hidden' name='c_pic' value='$c_pic'>
    <tr><td></td>
    <td><br></td>
    </tr>";

    $max_entries = 4;
    $i = 0;
   
                for ($i = 0; $i < $max_entries; $i++) {
                    $per_pic = isset($perk_pic[$i]) ? $perk_pic[$i] : null;
                    $per_name = isset($perk_name[$i]) ? $perk_name[$i] : null;
                    $per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;
        echo "
            <input type='hidden' name='perk_id[]' value='" . (isset($perk_id[$i]) ? $perk_id[$i] : "") . "'>
        <tr>
            <td>Perk No " . ($i+1) . "</td>
        </tr>
        <tr>
            <td>Perk Pic</td>
            <td><input type='file' name='perk_pic[]' value='$per_pic' size='50'>$per_pic</td>
            <input type='hidden' name='perk_pic[]' value='$per_pic'>
        </tr>
        <tr>
            <td>Perk Name</td>
            <td><input type='text' name='perk_name[]' value='$per_name' size='50'></td>
        </tr>
        <tr>
            <td>Perk Description</td>
            <td><input type='text' name='perk_desc[]' value='$per_desc' size='50'></td>
        </tr>";
    }

    echo "  <tr><td></td>
    <td><br></td>
    </tr>";

    
    $max_ent = 3;

    for ($j = 0; $j < $max_ent; $j++) {
        $ss_pic = isset($Slide_pic[$j]) ? $Slide_pic[$j] : null;
        $ss_des = isset($Slide_des[$j]) ? $Slide_des[$j] : null;
        $ss_title = isset($Slide_title[$j]) ? $Slide_title[$j] : null;
    echo "
        <input type='hidden' name='slide_id[]' value='" . (isset($slide_id[$j]) ? $slide_id[$j] : "") . "'>
        <tr>
            <td>Slide No " . ($j + 1) . "</td>
        </tr>
        <tr>
            <td>Slide Title</td>
            <td><input type='text' name='Slide_title[]' value='$ss_title' size='50'></td>
        </tr>
        <tr>
            <td>Slide Description</td>
            <td><input type='text' name='Slide_des[]' value='$ss_des' size='50'></td>
        </tr>
        <tr>
            <td>Slide Pic</td>
            <td><input type='file' name='Slide_pic[]' value='$ss_pic' size='50'>$ss_pic</td>
        </tr>";
}

    echo "  <tr><td></td>
    <td><br></td>
    </tr>";

    echo "
<tr><td></td><td><input type='submit' name='task' value='Finish' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'>
<input type='submit' name='task' value='preview' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'></td>

</table></form></div>  <section>";



?>