



<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
    include('check_logon.php');
	include('menubar.php');
	include('FSC_connect.php');


?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="create_club.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>
<section>

<?php
//$club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date
$dd= date("Y-m-d");
$i=1;

if (isset($_POST['task']))			$task = $_POST['task'];						else $task = "First";
if (isset($_GET['r']))				{$task = $_GET['r'];}	
if (isset($_POST['club_id']))			$club_id = trim($_POST['club_id']);	    else $club_id = NULL;
if (isset($_POST['c_name']))			$c_name = trim($_POST['c_name']);       else $c_name = NULL;
if (isset($_POST['c_tag']))				$c_tag = trim($_POST['c_tag']);         else $c_tag = NULL;
if (isset($_POST['c_desc']))			$c_desc = trim($_POST['c_desc']);       else $c_desc = NULL;
//if (isset($_POST['c_pic']))			    $c_pic = trim($_POST['c_pic']);         else $c_pic = NULL;
if (isset($_POST['c_members']))			$c_members = trim($_POST['c_members']); else $c_members = NULL;
if (isset($_POST['made_by']))			$made_by = trim($_POST['made_by']);     else $made_by = NULL;
if (isset($_POST['made_date']))			$made_date = trim($_POST['made_date']); else $made_date = NULL;

//if (isset($_POST['p_name']))			      $p_name = ($_POST['p_name']);     else $p_name = 0;
//if (isset($_POST['p_desc']))			      $p_desc = ($_POST['p_desc']);     else $p_desc = 0;
//if (isset($_POST['p_pic']))			          $p_pic = ($_POST['p_pic']);       else $p_pic = 0;


if (isset($_POST['p']))			$p = trim($_POST['p']); else $p = NULL;
if (isset($_POST['addd'])) {
    $number = $_POST['number'];
  } else $number = NULL;

if(isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    //$file_ext = strtolower(end(explode('.', $file_name)));
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));


    $valid_exts = array("jpg", "jpeg", "png","tif","gif<br>");
    
    if(in_array($file_ext, $valid_exts)) {
      $upload_path = "./upload/club_page/" . $file_name;
      move_uploaded_file($file_tmp, $upload_path);
      echo "File uploaded successfully.<br>";
    } else {
        $file_name =NULL;
      echo "Invalid file type. JPG, GIF, PNG or TIF files are allowed.<br>";
    }
  }
  

//foreach($_POST as $keyx => $value) echo "$keyx = $value<br>";
echo " <div class='club_make'>";
echo "    <div class='add_club_info'> <form action='create_club.php' method='post' enctype='multipart/form-data'>
<table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='4'>
<tr><td width='30%'>Club Name</td><td ><input type='text' name='c_name' value='$c_name'  size='40'></td>
<tr><td>Club Tag </td><td><input type='text' name='c_tag' value='$c_tag' rows='10'  size='50'></td>
<tr><td>Club Description</td><td><textarea name='c_desc' value='$c_desc' size='500' cols='40' rows='10' >$c_desc</textarea></td>
<tr><td>Club Members</td><td><input type='number' name='c_members' value='$c_members'   size='12'></td>
<tr><td>Upload Club Photo(JPG, GIF, PNG or TIF File only):
        <td> <input type='file' name='image' ></td>";
        $max_entries = 2;
         if (isset($p_name[$i])) {               $perk_name = $p_name[$i]; }         else { $perk_name = null;}
            if (isset($p_desc[$i])) {               $perk_desc = $p_desc[$i]; }         else { $perk_desc = null;}
            if (isset($p_pic[$i])) {                $perk_pic = $p_pic[$i]; }           else { $perk_pic = null;}
        // Loop through the number of entries
        for ($i = 1; $i <= $max_entries; $i++) {
           
            echo "
<tr>  <td>Perk No $i</td>
<tr><td>Perk pic </td><td> <input type='text' name='p_pic[]' value='$perk_pic'  size='50'></td>
<tr><td>Perk Name </td><td><input type='text' name='p_name[]'  value=' $perk_name'  size='50'></td>
<tr><td>Perk information </td><td><input type='text' name='p_desc[]' value=' $perk_desc' size='50'></td>";
        }
        echo "
<tr><td></td><td><input type='submit' name='task' value='Finish' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'>
<input type='submit' name='task' value='preview' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'></td>
</table></form></div>";

switch($task) {

case "signup": 
                echo "    <form action='home.php' method='post'>
                <table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='2'>
                <tr><td width='30%'>User Name</td><td ><input type='text' name='user_name' value='$user_name' rows='4' cols='10'  size='12'></td>
                <tr><td>Password </td><td><input type='number' name='pass_code' value='$pass_code'   size='12'></td>
                <tr><td>Amount</td><td><input type='number' name='account_balance' value='$account_balance'   size='12'></td>
                <tr ><td>Account Type    </td>
                <td ><input type='radio' name='account_type' value='Checking' >Checking
                <input type='radio' name='account_type' value='Savings' >Savings</td></tr>
                <td></td><td><input type='submit' name='task' value='Finish' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'></td>
                </table></form>";
    
                //INSERT INTO `bank` (`account_number`, `user_name`, `pass_code`, `account_type`, `role`, `account_balance`, `date`) VALUES (NULL, '', '', '', NULL, '', NULL)
                echo"goooood"; break;
case "Finish": 	    include('FSC_connect.php');

                    $query ="INSERT INTO `club_page` (`c_name`, `c_tag`, `c_desc`, `c_pic`, `c_members`) 
                    VALUES ( '$c_name', '$c_tag', '$c_desc', '$file_name', '$c_members')";
                    $result = mysqli_query($mysqli, $query);
                    if ($result) { $club_id = mysqli_insert_id($mysqli); echo"Your NEW Club Created. $club_id";
                    
                    $pics = $_POST['p_pic'];
                    $names = $_POST['p_name'];
                    $descs = $_POST['p_desc'];
                    
                    $products = array_combine(range(1, count($pics)), array_map(null, $pics, $names, $descs));
                    
                    foreach ($products as $id => $product) {
                        $_pic = $product[0];
                        $_name = $product[1];
                        $_desc = $product[2];
                    $query2 ="INSERT INTO `club_perks` (`perk_id`, `p_name`, `p_desc`, `p_pic`, `club_id`, `color`) 
                    VALUES (NULL,  '$_name', '$_desc', '$_pic', '$club_id', NULL)";
                    $result2 = mysqli_query($mysqli, $query2);
                    if ($result2) echo"Your NEW Club Created.";
                    else { echo"Unable to Make Account" . mysqli_error($mysqli);}}
                    
                    
                    
                    
                    }
                    else { echo"Unable to Make Account" . mysqli_error($mysqli);}
                    
/*
                    */
                    echo"ooooook"; break;

case "First": break;
case "preview": 
        echo"<div class='club_right'><div class='club_Container'>
                <div class='image_Container'>
                <img class='club_Icon' src=\"./upload/club_page/$file_name\"  alt=\"Avatar\">
                </div>
                <div class='information'>
                    <h1 ><a style='text-decoration:none; color:white;' href='./club_home_page.php'>$c_name</a></h1>
                    <p >$c_tag</p>
                </div>
                <div class='member_Counter'>
                    <h1 class='counter_Text'><i class='fas fa-user-friends'></i> Members: $c_members</h1>
                </div>
            </div>   </div></div>
 <section>
            <div class='top'>
                <div class='imageHeader'>
                    <img style='width:100%; height: 100px; object-fit: cover;' src=\"./upload/club_page/$file_name\"  alt=\"Avatar\" alt=''>
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
        </div> 
        <div class='listOfBenefitsGrid'>";


            $pics = $_POST['p_pic'];
            $names = $_POST['p_name'];
            $descs = $_POST['p_desc'];
            
            $products = array_combine(range(1, count($pics)), array_map(null, $pics, $names, $descs));
            
            foreach ($products as $id => $product) {
                $_pic = $product[0];
                $_name = $product[1];
                $_desc = $product[2];
            echo "
       
            <div class='listOfBenefits'>
                <div class='benefitsIcon'>
                    <img src='./ClubHomePage/ClubHomePagePictures/network-icon.jpg' alt='$_pic'>
                </div>
                <div class='listOfBenefitsDesciption'>
                    <h3>$_name</h3>
                    <p>$_desc</p>
                </div>
            </div>  ";}

            echo"</div> </section>  ";  break;

case "ad_club": 
   
            echo "    <form action='create_club.php' method='post'>
            <table width='550' align='center' style='background-color: #FAF0E6'  cellpadding='4'>
            <tr><td width='30%'>Club Name</td><td ><input type='text' name='c_name' value='$c_name'  size='40'></td>
            <tr><td>Club Tag </td><td><input type='text' name='c_tag' value='$c_tag' rows='10'  size='50'></td>
            <tr><td>Club Description</td><td><textarea name='c_desc' size='500' cols='40' rows='10' >"; echo"$c_desc </textarea></td>
            <tr><td>Club Members</td><td><input type='number' name='c_members' value='$c_members'   size='12'></td>
            <tr><td>Upload Club Photo(JPG, GIF, PNG or TIF File only):
                    <td><input type='file' name='image' value='$c_pic'></td>
            <tr><td></td><td><input type='submit' name='task' value='Finish' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'>
            <input type='submit' name='task' value='preview' style=' font-size: 15px; margin: 1px 10px; display:inline-block; padding: 5px; border: 2px solid black;' size='08'></td>
            </table></form>";


    //INSERT INTO `bank` (`account_number`, `user_name`, `pass_code`, `account_type`, `role`, `account_balance`, `date`) VALUES (NULL, '', '', '', NULL, '', NULL)
    echo"goooood"; break;
}

?>

</section>

    </body>



<?php


include('footer.php');

?>
