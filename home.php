



<?php
// home.php - Home Page 
// Written by:  Prof. Kaplan, November 2021
	$dd= date("Y-m-d");
// Output
	include('session.php');
	include('menubar.php');
	include('header.php');
	//include('bcs350_mysqli_connect.php');
/*
	if (isset($_POST['task']))							$task = $_POST['task'];								else $task = "First";
	if (isset($_POST['account_type']))					$account_type = trim($_POST['account_type']);	else $account_type = NULL;
	if (isset($_POST['user_name']))						$user_name = trim($_POST['user_name']);         else $user_name = NULL;
	if (isset($_POST['pass_code']))						$pass_code = trim($_POST['pass_code']);          else $pass_code = NULL;
	if (isset($_POST['account_balance']))				$account_balance = trim($_POST['account_balance']); else $account_balance = NULL;
	//foreach($_POST as $keyx => $value) echo "$keyx = $value<br>"; 

	echo"   <form action='home.php' method='post'>
	<table width='650' align='center' cellpadding='5' >
	<td align='center'>
		<button name='task' value='signup' style='background-color: #32CD32; font-size: 20px; margin: 1px 10px; display:inline-block; padding: 20px; border: 1px solid black;'><b>SIGN UP</b></button>

	</td>
	</table></form>";
	//<input type='submit' name='task' value='signup'>
	//<input type='submit' name='task' value='signup' style='background-color: #32CD32; margin: 1px 10px; display:inline-block; padding: 20px; border: 1px solid black;'>
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
		case "Finish": 
							include('bcs350_mysqli_connect.php');
							$query = "INSERT INTO `bank` (`user_name`, `pass_code`, `account_type`, `role`, `account_balance`, `date`) 
							VALUES ('$user_name', '$pass_code', '$account_type', 'user', '$account_balance', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="Your NEW Account Created.";
							else { $msg="Unable to Make Account" . mysqli_error($mysqli);}
							echo"ooooook"; break;

		case "First": break;
	}
	//else{echo"nooo";}

	*/
?>

	<body>


<div class="slideshow-container">

			<div class="mySlides fade">
			<div class="numbertext">1 / 3</div>
			<img src="./Homepage/Pictures/FSC Campus Center.jpg" style="width:100%">
			<div class="text">Campus Center</div>
			</div>

			<div class="mySlides fade">
			<div class="numbertext">2 / 3</div>
			<img src="./Homepage/Pictures/FSC Fountain.jpg" style="width:100%">
			<div class="text">FSC Fountain</div>
			</div>

			<div class="mySlides fade">
			<div class="numbertext">3 / 3</div>
			<img src="./Homepage/Pictures/FSC Quinton Hall.jpg" style="width:100%">
			<div class="text">Quintyne Hall</div>
			</div>
			<div class="prev" onclick="plusSlides(-1)">❮</div>
			<div class="next"  onclick="plusSlides(1)">❯</div>
			<br>
			<div class="do" style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span> 
				<span class="dot" onclick="currentSlide(2)"></span> 
				<span class="dot" onclick="currentSlide(3)"></span> 
			</div>

</div>
<br>


		

<script src="autoSlide.js"></script>
<script src="clickSlide.js"></script>
</body>

<?php


	include('footer.php');
?>