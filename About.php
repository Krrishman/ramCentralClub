

<?php
//user=postgres password=[YOUR-PASSWORD] host=db.albvpiascovyowczwqez.supabase.co port=5432 dbname=postgres
// Variables
/*
$mysql_host			= 'db.albvpiascovyowczwqez.supabase.co';
$mysql_userid		= 'postgres';
$mysql_password		= 'Krrishman0#';
$mysql_database		= 'postgres';
$db = pg_connect("host=db.albvpiascovyowczwqez.supabase.co port=5432 dbname=postgres user=postgres password=Krrishman0#");
$result = pg_query($db, "SELECT * FROM User");
// Connect to the MySQL and the Phone Book Database
echo "<table>";
while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['F_Name'] . "</td>";
echo "<td align='center' width='200'>" . $row['L_Name'] . "</td>";
echo "<td align='center' width='200'>" . $row['User_Name'] . "</td>";
echo "<td align='center' width='200'>" . $row['Role'] . "</td>";
echo "</tr>";}echo "</table>";

try {$dbuser = 'postgres';
    $dbpass = 'Krrishman0#';
    $dbhost = 'db.albvpiascovyowczwqez.supabase.co';
    $dbname='postgres';
    $connec = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    }catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
    }
    $sql = 'SELECT * FROM User';
    foreach ($connec->query($sql) as $row) 
    {
    print $row['F_Name'] . " ";
    print $row['L_Name'] . "-->";
    print $row['User_Name'] . "<br>";
    }
    
    $dsn = 'pgsql:host=db.albvpiascovyowczwqez.supabase.co;port=5432;dbname=postgres;user=postgres;password=Krrishman0#';

    try {
        $pdo = new PDO($dsn);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
    
    // Prepare a SQL query
    $stmt = $pdo->prepare('SELECT * FROM User');
    
    // Execute the query
    $stmt->execute();
    
    // Print the results
    while ($row = $stmt->fetch()) {
        print_r($row);
    }
    
    require "vendor/autoload.php";

    $service = new PHPSupabase\Service(
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImFsYnZwaWFzY292eW93Y3p3cWV6Iiwicm9sZSI6ImFub24iLCJpYXQiOjE2NzcwNDk1MzcsImV4cCI6MTk5MjYyNTUzN30.GPMlnXEDxeIjFcPw9IrJTkxzSc8QhC4kbwWXJpeaPPQ", 
        "https://albvpiascovyowczwqez.supabase.co"
    );

    $query = $service->initializeQueryBuilder();

    try{
        $listProducts = $query->select('*')
                    ->from('User')
                    ->execute()
                    ->getResult();
        foreach ($listProducts as $product){
            echo $product->User_id . ' - ' . $product->F_Name . '($' . $product->L_Name . ') <br />';
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
*/





?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="cclub_Page.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>

<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
    include('check_logon.php');
	include('menubar.php');
	//include('FSC_connect.php');
	include('Supabase_connect.php');
/*
	$cat	= array('club_id', 'made_date', 'c_members');
	$sort	= array('Ascending', 'Descending');
	if (isset($_POST['orderby'])) 	$orderby = $_POST['orderby'];	else $orderby = 'club_id';
	if (isset($_POST['ad'])) 		$ad 	 = $_POST['ad'];		else $ad 	  = NULL;
	if ($ad == 'Descending')		$desc	 = 'DESC';				else $desc	  = NULL;
    foreach($_POST as $keyx => $value) echo "$keyx = $value<br>"; 


	echo "<form action='about.php' method='POST' align='center' > 
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

	echo " <table style='background-color: #FAF0E6' width='650' align='center' rules='all' border='frame' cellpadding='2'>
	<tr>
	<th >ID</th> 
	<th >Date</th>
	<th >Reason</th>
	<th >Amount</th>
	</tr>";

    echo "<div class='club_Grid'>";
// Process Query Results 
while(list($club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date) = mysqli_fetch_row($result)) {
/*		$n=number_format($amount,2);
if ($reason=="Pay Bill"){$color="#191970";}
else if ($reason=="Shopping"){$color="#DA70D6";}
else if ($reason=="Travel"){$color="#FFA500";}
else if ($reason=="Food"){$color="#FF4500";}
else if ($reason=="Deposit"){$color="#green";}
else if ($reason=="Transfer"){$color="#663399";}
else if ($reason=="Withdraw"){$color="#DC143C";}
else($color="black");

		echo "<tr>
		
		<td align='center'>$club_id</td>
		<td align='left'>$c_name</td>
		<td align='center'>$c_tag,$c_desc</td>
		<td align='center'>$c_pic, $c_members</td>
        <td align='center'>$made_by</td>
        <td align='center'>$made_date</td>
		</tr>";

      
        echo"<div class='club_Container'>
            <div class='image_Container'>
                <img class='club_Icon' src='ClubPictures/Psychology club.jpeg' alt=''>
            </div>
                <div class='information'>
                    <h1 ><a style='text-decoration:none; color:white;' href='./club_home_page.php'>$c_name</a></h1>
                    <p >$c_tag</p>
                </div>
            <div class='member_Counter'>
                <h1 class='counter_Text'><i class='fas fa-user-friends'></i> Members: $c_members</h1>
            </div>
        </div>";


}
echo "</div><br>";
echo "</table><br>
<table width='650' align='center'>
<tr><td><center>Good job</center></td></tr>";
*/
//$club_id, $c_name, $c_tag,$c_desc, $c_pic, $c_members, $made_by, $made_date

echo " <table style='background-color: #FAF0E6' width='650' align='center' rules='all' border='frame' cellpadding='2'>
	<tr>
	<th >ID</th> 
	<th >Date</th>
	<th >Reason</th>
	<th >Amount</th>
	</tr>";

    echo "<div class='club_Grid'>";

while ($row = pg_fetch_row($result)) {
    $User_id = $row['User_id'];
	$F_Name = $row['F_Name'];
	$L_Name = $row['L_Name'];
	$user_name = $row['user_name'];
	$Pass_Code = $row['Pass_Code'];
	$Role = $row['Role'];
	$Year = $row[6];
	$Major = $row[7];
	$Email = $row[8];
	$Phone = $row[9];
	$Date = $row['created_at'];

    // Use the fetched values as needed
   // echo "Club ID: " . $club_id . "<br>";
   // echo "Club Name: " . $c_name . "<br>";
   // echo "Club Tag: " . $c_tag . "<br>";
   // ... (use other fetched values as needed)

	echo "<tr>
		
		<td align='center'>$User_id</td>
		<td align='left'>$F_Name</td>
		<td align='center'>$L_Name</td>
		<td align='center'>$user_name</td>
        <td align='left'>$Pass_Code</td>
		<td align='center'>$Role</td>
		<td align='center'>$Year</td>

		</tr>";
}

echo "</table><br>
<table width='650' align='center'>
<tr><td><center>Good job</center></td></tr>";




?>


