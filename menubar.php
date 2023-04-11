<?php
// menubar.php - Navigation Bar for Enrollments
// Written by: Sayed Haque, March 2023
//include('session.php');
// Varaiables
	$headr		= array('Home' , 'Club' , 'Event' , 'About');
	$logg 		= array('logon' => '#ffc21c');
	$pages		= array( 
						'bank' 			=> 'lightgreen',
						'profile' 		=> 'yellow', 
						'admin'			=> 'orange');
	$restricted	= array('bank','profile', 'admin');
	$role_pages = array('admin');
	$role_value = 'admin'; 
	#color: #006f71
	#color: #6d55a4
	#color: #2fc5f4
	#color: #ffc21c
	#color: #f5f5f5
	#color: rgb(0, 100, 86)
	#color: rgb(25, 118, 210)
	#rgba(1, 79, 81, 0.85)

	$btn='color: black; padding: 10px 15px;  border: none; cursor: pointer;';
// Output
	echo "<p><table width='1366' align='center' cellpadding='5' 
	style='background-color:rgba(1, 79, 81, 1); position:fixed; z-index: 2; margin-left:182px; top:0%; padding: 0px 10px'>";
	echo "<td style='font-size: 14px; color: white;'>
	<b >Farmingdale State Collage <br align='center'> RamCentral</b><br> \n
	<p>Welcome $user,  $role </p></td>";
	foreach($headr as $ki) {
		echo "<td><a href='$ki.php'  style='text-decoration: none; color: white; font-weight:bold;'>
			  <p align='center' >" . ucfirst($ki) . "</p>
			  </a></td> \n";
		}

	foreach($pages as $key => $value) {
		if (($key == 'logon') AND ($logon)) $key = 'logoff';
		if (in_array($key, $restricted) AND (!$logon)) continue;
		if (in_array($key, $role_pages) AND ($role != $role_value)) continue;
		echo "<td align='center'><a href='$key.php'>
			  <button style='background-color:$value; font-weight:bold; $btn '>" . ucfirst($key) . "</button>
			  </a></td> \n";
		}
		foreach($logg as $k => $v) {
			if (($k == 'logon') AND ($logon)) {$k = 'logoff'; $link='logoff.php'; $lg='#';}
			else{$link='logon.php'; $lg="onclick='myFunction()'";}

			echo "<td align='center'><a href='$link'>
				  <button id='login-btn' $lg 
				  style='background-color:$v; font-weight:bold; $btn '>" . ucfirst($k) . "</button>
				  </a></td> \n";
			}


	echo "</tr></table>";
	//include('test00.php');
	//include('logon.php');
?>
<!--
<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="loginclick.css">
    </head>
<body>

<div id="myDIV" class="modal" style="display: none;">
  
  <form class="modal-content animate" action="/action_page.php" method="post">

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
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

	-->