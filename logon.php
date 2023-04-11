

<body>


<?PHP
// logon.php - Website Logon
// Written by:  Charles Kaplan, November 2021
	
// Start Session	
	include('session.php');
	include('header.php');
	
// Variables 
//	$msg 		= NULL;								// Error Message
	$td 		= "width='20%' align='right'";		// Attributes for 1st column
	$tf 		= "width='80%' align='left'";		// Attributes for 2nd column
	$pgm		= 'logon.php';
	$width		= '800';
  
// Get Form Input  
	if (isset($_POST['user_name']))		$user_name	= trim($_POST['user_name']);		else $user_name 	= NULL;
	if (isset($_POST['pass_code']))		$pass_code 	= trim($_POST['pass_code']);		else $pass_code 	= NULL;
		
// Verify Input
	if (isset($_POST['logon'])) {
		if ($user_name == NULL) 		{$msg = "user_name is missing<br>"; }
		if ($pass_code == NULL) 		{$msg = "pass_code is missing<br>"; }
		
// LOGON		
		if ($msg == NULL) {
			
// Query Student Using the user_name			
			//include('bcs350_mysqli_connect.php');
			//include('FSC_connect.php');
			include('Supabase_connect.php');
			
			//$query = "SELECT account_number, account_type, pass_code, role 
			//		  FROM bank 
			//		  WHERE user_name = '$user_name'";
			//$result = mysqli_query($mysqli, $query);
		//	if (!$result) echo "Query Error [$query] " . mysqli_error($mysqli);
			
// If user_name is FOUND, Verify pass_code		
if (pg_num_rows($result) > 0) {
	$row = pg_fetch_row($result);
	$User_id = $row[0];
	$F_Name = $row[1];
	$L_Name = $row[2];
	$user_name = $row[3];
	$Pass_Code2 = $row[4];
	$Role = $row[5];
	$Year = $row[6];
	$Major = $row[7];
	$Email = $row[8];
	$Phone = $row[9];
	$Date = $row['created_at'];






		//	if (mysqli_num_rows($result) > 0) {
		//		list($User_id, $F_Name, $L_Name, $user_name, $Pass_Code2, $Role, $Year,$Major , $Email , $Phone, $Date, $Status) = mysqli_fetch_row($result);
				
// If pass_code matches, Complete LOGON				
				if ($pass_code == $Pass_Code2) {
					$_SESSION['logon']		= TRUE;
					$_SESSION['user_name'] 	= $user_name;
					$_SESSION['user'] 		= $user = "$user_name";
					$_SESSION['role']		= $Role; 
					$_SESSION['date']		= $Date; 
					$_SESSION['User_id']	= $User_id; 
					$msg					= "<font color='green'><b>$user Logon Successful</b></font>";
					$logon 					= TRUE;
					}
				else {$msg = "Invalid pass_code"; }
				}
			else {$msg = "user_name [$user_name] is invalid"; }
			}
		}
  
// OUTPUT Logon Screen
	if ($msg == NULL)  	{$msg = "Enter User ID and pass_code";}
	else if (!$logon){ $msg = "<font color='red'>$msg Please try again</font>";	}
	include('menubar.php');
	//include('header.php');
/*	 echo "<p align='center'>Website Logon
		  <p><form action='$pgm' method='post' autocomplete='off' align='center'>
		  <table width='$width' align='center'>
		  <tr><td $td>User ID</td>		<td $tf><input type='text'     name='user_name'   value='' size='60' maxlength='80' autocomplete='off' required></td></tr>
		  <tr><td $td>pass_code</td>		<td $tf><input type='pass_code' name='pass_code' value='' size='12' maxlength='12' autocomplete='off' required></td></tr>
		  </table>
		  <p align='center'><input type='submit' name='logon' value='LOGON' style='background-color:lightgreen;font-weight:bold'>
		  <p><table align='center' width='$width'><tr><td $td>Message</td><td $tf><b>$msg</b></td></tr></table>
		  </form>"; */


	echo"
	
<div id='myDIV' class='modal'>
  
<form class='modal-content animate' action='logon.php' method='post' >

  <div class='container'>
	<label for='uname'><b>Username</b></label>
	<input type='text' placeholder='Enter Username' name='user_name'   value=''  >

	<label for='psw'><b>Password</b></label>
	<input type='Password' placeholder='Enter Password' name='pass_code' value='' >
	  
	<button type='submit'  name='logon' value='LOGON' >Login</button>
	<label>
	  <input type='checkbox' checked='checked' name='remember'> Remember me
	</label>
  </div>

  <div class='container' style='background-color:#f1f1f1'>
	<button type='button' onclick='myFunction()' class='cancelbtn'>Cancel</button>
	<span class='psw'>Forgot <a href='#'>password?</a></span>
  </div>
  <div class='con' style='background-color:#f1f1f1'>
	<p>Message: $msg</p>
  </div>
</form>
</div>
<script src='click.js'></script>

</body>
</html>
		
	";
	//include('footer.php');		  


//include('test00.php');

	//INSERT INTO `bank` (`account_number`, `user_name`, `pass_code`, `account_type`, `role`, `account_balance`, `date`) VALUES ('1001', 'dm', '2222', 'Checking', 'admin', '10000', '2022-12-12');
?>




<!--
<div id="myDIV" class="modal" style="display: none;">
  
  <form class="modal-content animate" action="home.php" method="post" autocomplete='off'>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name='user_name'   value='' autocomplete='off' required>

      <label for="psw"><b>Password</b></label>
      <input type="Password" placeholder="Enter Password" name='pass_code' value=''  autocomplete='off' required>
        
      <button type="submit"  name='logon' value='LOGON' >Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="myFunction()" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script src="click.js"></script>
</body>
</html>


echo'
	
<div id="myDIV" class="modal">
  
<form class="modal-content animate" action="logon.php" method="post" >

  <div class="container">
	<label for="uname"><b>Username</b></label>
	<input type="text" placeholder="Enter Username" name="user_name"   value=""  required>

	<label for="psw"><b>Password</b></label>
	<input type="Password" placeholder="Enter Password" name="pass_code" value=""  required>
	  
	<button type="submit"  name="logon" value="LOGON" >Login</button>
	<label>
	  <input type="checkbox" checked="checked" name="remember"> Remember me
	</label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
	<button type="button" onclick="myFunction()" class="cancelbtn">Cancel</button>
	<span class="psw">Forgot <a href="#">password?</a></span>
  </div>
  <div class="con" style="background-color:#f1f1f1">
	<button type="button">Message</button>
	<p> '; echo"$msg"; 
	echo' </p>
  </div>
</form>
</div>


<script src="click.js"></script>
</body>
</html>
	
	
	';