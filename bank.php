


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
	$_id=1;

	$cat	= array('id', 'date_created', 'amount');
	$sort	= array('Ascending', 'Descending');
	if (isset($_POST['orderby'])) 	$orderby = $_POST['orderby'];	else $orderby = 'id';
	if (isset($_POST['ad'])) 		$ad 	 = $_POST['ad'];		else $ad 	  = NULL;
	if ($ad == 'Descending')		$desc	 = 'DESC';				else $desc	  = NULL;

	echo" <table width='650' align='center' cellpadding='5' style='background-color: #FAF0E6; padding: 5px;'>
	<tr>
		<td ><button style='background-color: #32CD32; margin: 0px 5px;display:inline-block;padding: 5px; border: 1px solid black;'
        onclick='showM($_id)' >Deposit</button></a></td>
		<td style='margin: 10px;'><a href='bank.php?r=withdraw'><button style='background-color: #32CD32; margin: 0px 5px;display:inline-block;padding: 5px; border: 1px solid black;'>Withdraw</button></a></td>
		<td ><a href='bank.php?r=transfer'><button style='background-color: #32CD32; display:inline-block; padding: 5px; border: 1px solid black;'>Transfer</button></a></td>
		<td ><a href='bank.php?r=pay'><button style='background-color: #32CD32; margin: 1px 10px;display:inline-block; padding: 5px; border: 1px solid black;'>Pay</button></a></td>
	</tr>
	</table>
    <form method='post' action='bank.php?j=$_id'>
			<table class='deposit' id='deposit_$_id'>
			<tr ><th width='30%'>Username</th><td><input type='text' name='user_name' value='$user_name'></td></tr>
			<tr ><th width='30%'>Password</th><td><input type='text' name='Pass_Code' value='$Pass_Code'></td>
			<td><button type='submit' name='pass' value='Update User Pass' >Submit</button></td></tr>
			</form></table>
            
            
            ";
    echo'
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="touggle.js"></script>
            <br>';
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


switch($task) {
	case "user_name_change":	
							echo "    <form action='update.php' method='post'>
							<input type='hidden' name='account_number' value='$account_number'> 
							<table width='550' align='center' style='background-color: #FAF0E6'>
							<tr><td>Username    </td><td><input type='text' name='user_name' value='$user_name'   size='08'></td>
							<td align='center'><input type='submit' name='task' value='submit'></td></tr>
							</table></form>";
							break;

	case "Error":		$color = "red"; break;


	case "transfer":
						echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Transfer Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<tr><td>Receiver Account Number    </td><td><input type='number' name='acc' value='$acc'   size='08'></td>
						<td align='center'><input type='submit' name='task' value='send money'></td></tr>
						</table></form>";
						break;
	case "send money":
						//include('check_acc.php');
						$query = "SELECT * FROM `bank`
									WHERE `bank`.`account_number` = $acc";
						$result = mysqli_query($mysqli, $query);
						if (mysqli_num_rows($result)== 0) {$msg="Wrong Account Number";break;}
						else {

						$query = "UPDATE `bank` SET `account_balance` = account_balance + $add
									WHERE `bank`.`account_number` = '$acc'";
						$result = mysqli_query($mysqli, $query);
						//if (mysqli_num_rows($result)== 0) {break;}
						if ($result > 0) { $msg="We are Sending $add $ To $acc";
							$query = "INSERT INTO `transaction` (`id`, `account_number`, `sign`, `reason`, `amount`, `date_created`)
							VALUES (NULL, '$acc','+', 'transfer', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="$add $ Send.";
							else { $msg="Unable to Send MONEY" . mysqli_error($mysqli);}
											$query = "UPDATE `bank` SET `account_balance` = account_balance - $add
													WHERE `bank`.`account_number` = '$account_number'";
											$result = mysqli_query($mysqli, $query);
											if ($result) {$msg="WE take $add $ from Your Account";
												$query = "INSERT INTO `transaction` (`id`, `account_number`,`sign`, `reason`, `amount`, `date_created`)
												VALUES (NULL, '$account_number', '-','Transfer', '$add', '$dd')";
												$result = mysqli_query($mysqli, $query);
												if ($result) $msg="WE took  $add $ fund Your Account";
												else { $msg="Unable to Take MONEY" . mysqli_error($mysqli);}
											}
											else { $msg="MONEY Failed" . mysqli_error($mysqli);}
						}
						else { $msg="Wrong Account Number" . mysqli_error($mysqli);}
					}
					
						break;
	case "deposit":		echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<td align='center'><input type='submit' name='task' value='add money'></td></tr>
						</table></form>";
						break;
	case "add money":
						$query = "UPDATE `bank` SET `account_balance` = account_balance + $add
									WHERE `bank`.`account_number` = '$account_number'";
						$result = mysqli_query($mysqli, $query);
						if ($result) {$msg="Deposit Added";
							$query = "INSERT INTO `transaction` (`id`, `account_number`, `sign`,`reason`, `amount`, `date_created`)
							VALUES (NULL, '$account_number','+', 'Deposit', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="$add $ Added to Your Bank";
							else { $msg="Deposit Failed" . mysqli_error($mysqli);}
						
						}
						else { $msg="Deposit Failed" . mysqli_error($mysqli);}
				
						break;
	case "withdraw":
						echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<td align='center'><input type='submit' name='task' value='take money'></td></tr>
						</table></form>";
						break;
	case "take money":
						$query = "UPDATE `bank` SET `account_balance` = account_balance - $add
									WHERE `bank`.`account_number` = '$account_number'";
						$result = mysqli_query($mysqli, $query);
						if ($result) {echo "ROW ID $user_name Updated<br>";
							$query = "INSERT INTO `transaction` (`id`, `account_number`,`sign`, `reason`, `amount`, `date_created`)
							VALUES (NULL, '$account_number','-', 'Withdraw', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="Withdraw Updated";
							else { $msg="Withdraw Failed" . mysqli_error($mysqli);}
						}
						else { $msg="Withdraw Failed" . mysqli_error($mysqli);}
					
						break;
	case "pay": 		echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<tr ><td>Pay    </td>
						<td ><input type='radio' name='type' value='Pay Bill' >Pay Bill
						<input type='radio' name='type' value='Shopping' >Shopping
						<input type='radio' name='type' value='Travel'  >Travel
						<input type='radio' name='type' value='Food'  >Food
						<input type='radio' name='type' value='Other'  >Other
						<input type='submit' name='task' value='Pay Bill'  size='08'></td></tr>
						</table></form>";
						break;
	case "Pay Bill":
						$query = "UPDATE `bank` SET `account_balance` = account_balance - $add
									WHERE `bank`.`account_number` = '$account_number'";
						$result = mysqli_query($mysqli, $query);
						if ($result) {echo "ROW ID $user_name Updated<br>";
							$query = "INSERT INTO `transaction` (`id`, `account_number`,`sign`, `reason`, `amount`, `date_created`)
							VALUES (NULL, '$account_number','-', '$type', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result)$msg="Payment Updated";
							else { $msg="Payment Failed" . mysqli_error($mysqli);}
						}
						else { $msg="Payment Failed" . mysqli_error($mysqli);}
						
						break;
	}


//INSERT INTO `transaction` (`id`, `account_number`, `reason`, `amount`, `date_created`) VALUES (NULL, '', '', '', '')


?>
    </body>

<?php

	echo "<p align='center'>This is a Transacrion webpage, LOGON is required";
include('footer.php');

?>

