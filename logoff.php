<?PHP
// logoff.php - Logoff
// Written by:  Charles Kaplan, November 2021

// Start Session 
	include('session.php');

// Logoff by Unsetting Session Variables and Destroying the Session ID
	session_unset();
	session_destroy();
	$logon = FALSE;
	$user = 'Guest'; 
	$role = NULL;
  
// Output
	include('menubar.php');
	include('header.php');
	echo "<p align='center'>LOGOFF Successful";
	include('footer.php');
?>