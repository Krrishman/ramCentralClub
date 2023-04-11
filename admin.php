<?php
// admin.php - admin, restricted access, LOGON required, Role = admin
// Written by:  Prof. Kaplan, November 2021

// Output
	include('session.php');
	include('check_logon.php');
	include('role_access.php');
	include('header.php');
	include('menubar.php');
	echo "<p align='center'>This page is for admin
		  <br align='center'>$user can access this webpage
		  <br align='center'>LOGON status = TRUE
		  <br align='center'>Role = admin";
	include('footer.php');
?>