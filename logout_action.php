<?php
	//Katie Taylor - April 2, 2020
        session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		unset($_SESSION['userid']);
        	unset($_SESSION['logged_in']);
		$_SESSION['success'] = "You have been successfully logged out.";
		require('login.php');
		exit();
	}
?>
