

<body>


<?PHP
// logon.php - Website Logon

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
		
	
	if (isset($_POST['f_name']))		$f_name 	= trim($_POST['f_name']);		else $f_name 	= NULL;
	if (isset($_POST['l_name']))		$l_name 	= trim($_POST['l_name']);		else $l_name 	= NULL;
	if (isset($_POST['u_name']))		$u_name 	= trim($_POST['u_name']);		else $u_name 	= NULL;
	if (isset($_POST['p_code']))		$p_code 	= trim($_POST['p_code']);		else $p_code 	= NULL;
	if (isset($_POST['s_type']))		$s_type 	= trim($_POST['s_type']);		else $s_type 	= NULL;
	if (isset($_POST['major']))			$major 	= trim($_POST['major']);			else $major 	= NULL;
	if (isset($_POST['email']))			$email 	= trim($_POST['email']);			else $email 	= NULL;
	if (isset($_POST['number']))		$number = trim($_POST['number']);			else $number 	= 0;
	if (isset($_POST['role']))			$role 	= trim($_POST['role']);				else $role 	= NULL;



//	if (isset($_POST['click']))			$click	= trim($_POST['click']);				else $click 	= NULL;
if (isset($_POST['click'])) {   $click = trim($_POST['click']);
	if ($click == 'register') {   $msg = "Fill Out All the Info!";	}  } else { $click = NULL; }
		
// Verify Input
if (isset($_POST['register'])){

	include('Supabase_connect.php');
	$query = 'INSERT INTO "User" ( "F_Name", "L_Name", "User_Name", "Pass_Code", "Role", "Year", "Major", "Email", "Phone", "Status") 
	VALUES ('.$f_name.','. $l_name.','.$u_name.', '.$p_code.', '.$role.', '.$s_type.', '.$major.', '.$email.', '.$number.', 1)';
	$result = pg_query($conn, $query);
	if ($result) $msg="Your NEW Account Created.";
	else { $msg="Unable to Make Account\n [$query] " . pg_last_error($conn);}
	
}
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
		echo"gooodddd";
// If user_name is FOUND, Verify pass_code		

$query = 'SELECT * FROM "User" where "User_Name" = \'' . $user_name . '\'';
$result = pg_query($conn, $query);

// Check query result
if (!$result) {
  echo "faikeddddddddd";
  echo "Query Error [$query] " . pg_last_error($conn);
   // die("Query failed: " . pg_last_error($conn));
}



if (pg_num_rows($result) > 0) {
	echo"gooos";
	$row = pg_fetch_assoc($result);
	$User_id = $row['User_id'];
	$F_Name = $row['F_Name'];
	$L_Name = $row['L_Name'];
	$user_name = $row['User_Name'];
	$Pass_Code2 = $row['Pass_Code'];
	$Role = $row['Role'];
	$Year = $row[6];
	$Major = $row[7];
	$Email = $row[8];
	$Phone = $row[9];
	$Date = $row['created_at'];

	echo"  $Pass_Code2  ";




		//	if (mysqli_num_rows($result) > 0) {
		//		list($User_id, $F_Name, $L_Name, $user_name, $Pass_Code2, $Role, $Year,$Major , $Email , $Phone, $Date, $Status) = mysqli_fetch_row($result);
				
// If pass_code matches, Complete LOGON				
				if ($pass_code == $Pass_Code2) {
					echo"goood";
					$_SESSION['logon']		= TRUE;
					$_SESSION['user_name'] 	= $user_name;
					$_SESSION['user'] 		= $user = "$user_name";
					$_SESSION['role']		= $Role; 
					$_SESSION['date']		= $Date; 
					$_SESSION['User_id']	= $User_id; 
					$msg					= "<font color='green'><b>$user Logon Successful</b></font>";
					$logon 					= TRUE;
					}
				else {$msg = "Invalid pass_code[$pass_code]"; }
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
  <div class='con' id='con0'>
	<div class='container' id='container0'>
	  <label for='uname'><b>Username</b></label>
	  <input type='text' placeholder='Enter Username' name='user_name'   value=''  >
  
	  <label for='psw'><b>Password</b></label>
	  <input type='Password' placeholder='Enter Password' name='pass_code' value='' >
		
	  <button type='submit'  name='logon' value='LOGON' >Login</button>
	  <label>
		<input type='checkbox' checked='checked' name='remember'> Remember me
	  </label>
	</div>
  
	<div class='container' id='container0' style='background-color:#f1f1f1'>
	  <button type='button' onclick='myFunction()' class='cancelbtn'>Cancel</button>
	  <button type='button'  name='click' value='register' onclick='showRegister(0)' class='register'>Register</button>
	</div>
	<div class='container' id='container0' style='background-color:#f1f1f1'>
	  <p>Message: $msg</p>
	</div> </div>
	<div class='container_register' id='container_register0' style='background-color:#f1f1f1'>
	<label><b>First Name</b></label>
		<input autocomplete='off' type='text' placeholder='Enter First Name' name='f_name'   value='$f_name'>
	<label ><b>Last Name</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Last Name' name='l_name'   value='$l_name'>
	  <label ><b>Username</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Username' name='u_name'   value='$u_name'>
	  <label ><b>Password</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Password' name='p_code'   value='$p_code'>
	  <label>
		<input type='checkbox' name='role' value='student'> Are You A Regular Student
	  </label >
	  <label ><br> 
	  <input type='radio' name='s_type' value='Freshman' >Freshman
	  <input type='radio' name='s_type' value='Sophemore' >Sophemore
	  <input type='radio' name='s_type' value='Junior' >Junior
	  <input type='radio' name='s_type' value='Senior' >Senior
	  </label>
	  <label for='uname'><b>Major</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Major' name='major'   value='$major'>
	  <label for='uname'><b>Email</b></label>
	  <input autocomplete='off' type='email' placeholder='Enter Email' name='email'   value='$email'>
	  <label for='uname'><b>Phone Number</b></label>
	  <input autocomplete='off' type='number' placeholder='Enter Phone Number' name='number'   value='$number'>
	  
	  <div class='container' style='background-color:#f1f1f1'>
			<button type='button' onclick='myFunction()' class='cancelbtn'>Cancel</button>
			<button type='submit' name='register' value='register' >Submit</button>
		  <p>Message: $msg</p>
		</div>
	
  </div>
  </form>
  </div>
  <script src='click.js'></script>
  <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
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