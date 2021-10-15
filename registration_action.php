<?php

        //Katie Taylor - March 12, 2020
	session_start();

 	$errors = [];
        $fname = $lname = $age = $email = $user = $pwd = $pet = $member = " ";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["firstname"])) { //first name validation - extra precaution 
                        $errors['fnameErr']  = "\n*First name is required."; //I have firstname flagged as 'required' in <form>
                } else {
                        $fname = test_input($_POST["firstname"]);
                        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                                $errors['fnameErr']  = "\n*Only letters and white space allowed for first name.";
                        }
                }
                if (empty($_POST["lastname"])) { //last name validation - extra precaution
                        $errors['lnameErr'] = "\n*Last name is required."; //I have last name flagged as 'required' in <form>
                } else {
                         $lname = test_input($_POST["lastname"]);
                        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                               $errors['lnameErr'] = "\n*Only letters and white space allowed for last name.";
                        }
                }
		if (empty($_POST["age"])) { //age validation - extra precaution 
                        $errors['ageErr']  = "\n*Age is required."; //I have age flagged as 'required' in <form>
                } else {
                        $age = test_input($_POST["age"]);
                        if (!preg_match("/[0-9]*/",$fname)) {
                                $errors['ageErr']  = "\n*Only integer values allowed for age.";
                        }
                }
                if (empty($_POST["email"])) { //email validation - extra precaution
                        $errors['emailErr'] = "\n*Email is required."; //I have email name flagged as 'required' in <form>
                } else {
                         $email = test_input($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                              $errors['emailErr'] = "\n*Invalid email format.";
                        }
                }
		if (empty($_POST["userid"])) { //user name validation - extra precaution 
                        $errors['userErr']  = "\n*User name is required."; //I have user id flagged as 'required' in <form>
                } else {
                        $user = test_input($_POST["userid"]);
                        if (!preg_match("/^[a-z0-9_-]{3,15}$/",$user)) {
                                $errors['userErr']  = "\n*User id must contain 3-15 characters with any lower case character, digit or special symbols '_' '-' only.";
                        }
                }
		if (empty($_POST["passwordConfirm"])) { //password validation - extra precaution 
                        $errors['pwdErr']  = "\n*Password is required."; //I have password flagged as 'required' in <form>
                } else {
                        $pwd = test_input($_POST["passwordConfirm"]);
                        if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pwd)) {
                                $errors['pwdErr']  = "\n*Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.";
                        }
                }
		if (empty($_POST["pet"])) { //pet validation - extra precaution 
                        $errors['petErr']  = "\n*Pet is required."; //I have 'cat' checked in <form>
                } else {
                        $pet = test_input($_POST["pet"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$pet)) {
                                $errors['petErr']  = "\n*Only letters and white space allowed for pet.";
                        }
                }
		if (empty($_POST["membership"])) { //membership validation - extra precaution 
                        $errors['membershipErr']  = "\n*Membership type is required."; //I have 'both' selected in <form>
                } else {
                        $member = test_input($_POST["membership"]);
                }

                if(empty($errors)) { //if "errors" array empty after input validation -> no errors found
                     /* $string = $fname . ' ' . $lname . ' ' .  $age . ' ' . $email . ' ' . $user . ' ' . $pwd . ' ' . $pet . ' ' . $member;
                        $fp = fopen("/home/ktaylo/secure_html/cs312/project/registrations.txt", "a+");
                        fwrite($fp, $string."\n"); //write concenated string of input data to output file
                        fclose($fp);
		      */
			$hash_pwd = password_hash($pwd, PASSWORD_DEFAULT); // create password hash w/built in salt

			$db = new SQLite3('project.db');  // open the DB
                        $command = "INSERT INTO users VALUES('".$fname ."', '".$lname ."', '".$age ."', '".$email ."', '".$user ."', '".$hash_pwd ."', '".$pet ."', '".$member ."')";
                        $result = $db->exec($command); // add user to database if no errors after input validation

                        if ($result) {
				$_SESSION['success'] = 'You have been successfully registered as a member of the Ultimutt Animal Rescue. Thanks for joining!:-)';
				require('index.php');
				exit();
			}
			$db->close();
                }
                else{ //if "error" array not empty,
                        $_SESSION['errors'] = $errors;
			require('registration.php');
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
