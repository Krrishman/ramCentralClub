


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
    <?php
// Output
	$color="black";
	$dd= date("Y/m/d");
	
	$cat	= array('id', 'date_created', 'amount');
	$sort	= array('Ascending', 'Descending');
	if (isset($_POST['orderby'])) 	$orderby = $_POST['orderby'];	else $orderby = 'id';
	if (isset($_POST['ad'])) 		$ad 	 = $_POST['ad'];		else $ad 	  = NULL;
	if ($ad == 'Descending')		$desc	 = 'DESC';				else $desc	  = NULL;

	echo" <table width='650' align='center' cellpadding='5' style='background-color: #FAF0E6; padding: 5px;'>
	<tr>
		<td ><a href='update.php?r=deposit'><button style='background-color: #32CD32; margin: 0px 5px;display:inline-block;padding: 5px; border: 1px solid black;'>Deposit</button></a></td>
		<td style='margin: 10px;'><a href='update.php?r=withdraw'><button style='background-color: #32CD32; margin: 0px 5px;display:inline-block;padding: 5px; border: 1px solid black;'>Withdraw</button></a></td>
		<td ><a href='update.php?r=transfer'><button style='background-color: #32CD32; display:inline-block; padding: 5px; border: 1px solid black;'>Transfer</button></a></td>
		<td ><a href='update.php?r=pay'><button style='background-color: #32CD32; margin: 1px 10px;display:inline-block; padding: 5px; border: 1px solid black;'>Pay</button></a></td>
	</tr>
	</table>";

	echo "<form action='bank.php' method='POST' align='center' > 
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


    $query1 = 'SELECT * FROM "transaction" where "account_number"= 1000 ORDER BY '.$orderby.' '.$desc.'';
    $result1 = pg_query($conn, $query1);
    if (!$result1) { echo "Query Error [$query1] " . pg_last_error($conn);}

//	$query = "SELECT * FROM `transaction` 
//	WHERE `account_number` = '$account_number' ORDER BY $orderby $desc";
//	$result = mysqli_query($mysqli, $query);
//	if (!$result) echo "Query Error [$query] " . mysqli_error($mysqli);

	echo " <table style='background-color: #FAF0E6' width='650' align='center' rules='all' border='frame' cellpadding='2'>
	<tr>
	<th >ID</th> 
	<th >Date</th>
	<th >Reason</th>
	<th >Amount</th>
	</tr>";


// Process Query Results
//while(list($id, $account_number, $reason,$sign, $amount, $date_created) = mysqli_fetch_row($result)) {


    echo "<div class='events-Gridrr'>";
    while ($row = pg_fetch_assoc($result1)) {
        $id = $row['id'];
        $account_number = $row['account_number'];
        $reason = $row['reason'];
        $sign = $row['sign'];
        $c_pic = $row['c_pic'];
        $amount = $row['amount'];
        $date_created = $row['date_created'];
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';

		$n=number_format($amount,2);
if ($reason=="Pay Bill"){$color="#191970";}
else if ($reason=="Shopping"){$color="#DA70D6";}
else if ($reason=="Travel"){$color="#FFA500";}
else if ($reason=="Food"){$color="#FF4500";}
else if ($reason=="Deposit"){$color="#green";}
else if ($reason=="Transfer"){$color="#663399";}
else if ($reason=="Withdraw"){$color="#DC143C";}
else($color="black");
		echo "<tr>
		
		<td align='center'><font color='$color'>$id</td>
		<td align='left'><font color='$color'>$date_created</td>
		<td align='center'><font color='$color'>$reason</td>
		<td align='center'><font color='$color'>$sign $n</td>
		</tr>";
}

echo "</table><br>
<table width='650' align='center'>
<tr><td><center>Good job</center></td></tr>";



//INSERT INTO `transaction` (`id`, `account_number`, `reason`, `amount`, `date_created`) VALUES (NULL, '', '', '', '')


?>
    </body>

<?php

	echo "<p align='center'>This is a Transacrion webpage, LOGON is required";
include('footer.php');

?>

