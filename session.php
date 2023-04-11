<?php
// session.php - Start Session and Retrieve Session Variables
// Written by: Charles Kaplan

// Start Session
	session_start();
	
// Retrieve Session Variables
	if (isset($_SESSION['logon'])) {
		$logon = TRUE;
		$user = $_SESSION['user'];
		$role = $_SESSION['role'];
		$user_name = $_SESSION['user_name'];
		$date = $_SESSION['date'];
		$User_id = $_SESSION['User_id'];
		}
	
	else {
		$logon = FALSE;
		$user = 'Guest';
		$role = NULL; 
		}
?>