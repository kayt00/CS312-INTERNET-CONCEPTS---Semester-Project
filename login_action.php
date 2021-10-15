<?php

        //Katie Taylor - April 2, 2020
        session_start();

        $errors = [];
	$row = [];
        $user = $pwd = $hashed_pwd = " ";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["userid"])) { //user name validation - extra precaution
                        $errors['userErr']  = "\n*User name is required."; //I have user id flagged as 'required' in form
                } else {
                        $user = test_input($_POST["userid"]);
                        if (!preg_match("/^[a-z0-9_-]{3,15}$/",$user)) {
                                $errors['userErr']  = "\n*User id must contain 3-15 characters with any lower case character, digit or special symbols '_' '-' only.";
                        }
                }
                if (empty($_POST["password"])) { //password validation - extra precaution
                        $errors['pwdErr']  = "\n*Password is required."; //I have password flagged as 'required' in form
                } else {
                        $pwd = test_input($_POST["password"]);
                        if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pwd)) {
                                $errors['pwdErr']  = "\n*Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.";
                        }
                }

		if (empty($errors)) { // if input validation passed
			$db = new SQLite3('project.db');
			$command = "SELECT pwdHash FROM users WHERE uname='" .$user ."'";
			$result = $db->query($command); // obtain pwdHash for user record from database
			$row = $result->fetchArray(SQLITE3_ASSOC);
			$hashed_pwd = $row['pwdHash'];
			$valid = password_verify($pwd, $hashed_pwd); // check input pwd against hash in database record
			$db->close();

			if ($valid) { // if credentials are correct
				$_SESSION['userid'] = $user;
				$_SESSION['logged_in'] = TRUE;
                	        $_SESSION['success'] = 'You have been successfully logged in.';
  	              	        require('index.php');
				exit();
                	} else {
				unset($_SESSION['userid']);
				unset($_SESSION['logged_in']);
				$_SESSION['invalid'] = 'Invalid credentials. Please try a different user id or password.';
				require('login.php');
				exit();
			}
		} else { //if "error" array not empty, input doesn't pass validation
        		$_SESSION['errors'] = $errors;
                	require('login.php');
			exit();
        	}
	}

	function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

?>
