<?php

        //Katie Taylor - March 12, 2020
	session_start();
	ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $ename = $sponsor = $description = $date = $time = " "; //varaibles to hold input values
        $errors = [];                                            //array to hold erroy messages

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) { //event name validation - extra precaution 
                        $errors['enameErr']  = "\n*Event name is required."; //I have event name flagged as 'required' in <form>
                } else {
                        $ename = test_input($_POST["name"]);
                        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$ename)) {
                                $errors['enameErr']  = "\n*Only letters, numbers, and white space allowed for event name.";
                        }
                }
                if (empty($_POST["sponsor"])) { //sponsor name validation - extra precaution
                        $errors['sponsorErr'] = "\n*Sponsor name is required."; //I have sponsor name flagged as 'required' in <form>
                } else {
                         $sponsor = test_input($_POST["sponsor"]);
                        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$sponsor)) {
                               $errors['sponsorErr'] = "\n*Only letters, numbers, and white space allowed for sponsor name.";
                        }
                }
                if (empty($_POST["description"])) { //description validation - extra precaution 
                        $errors['descriptionErr']  = "\n*Event description is required."; //I have event description flagged as 'required' in <form>
                } else {
                        $description = test_input($_POST["description"]);
			if (!preg_match("/^[A-Za-z0-9 ]*$/", $description)) {
				 $errors['descriptionErr']  = "\n*Only letters, numbers, and whitespace allowed in event description."; 
			}
                }
                if (empty($_POST["date"])) { //date validation
                        $errors['dateErr'] = "\n*Date field is required.";
                } else {
                         $date = test_input($_POST["date"]);
			 if (!preg_match("/^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/",$date)) {
                                $errors['dateErr']  = "\n*Only integer values allowed for event date.";
                         }
                }
		if (empty($_POST["time"])) { //date validation
                        $errors['timeErr'] = "\n*Time field is required.";
                } else {
                         $time = test_input($_POST["time"]);
                         if (!preg_match("/^\d{1,2}:\d{2}([ap]m)?$/",$time)) {
                                $errors['timeErr']  = "\n*Only integer values allowed for event time.";
                         }
                }
    

                if(empty($errors)) { //if "errors" array empty after input validation -> no errors found
                /*      $string = $date . ' @ '. $time . '*' . $sponsor . ': ' . $ename . '*' .  $description;
                        $fp = fopen("/home/ktaylo/secure_html/cs312/project/events.txt", "a+");
                        fwrite($fp, $string."\n"); //write concenated string of input data to output file
                        fclose($fp);
		*/      
			$db = new SQLite3('project.db');  // open the DB
			$command = "INSERT INTO event VALUES('".$ename ."', '".$sponsor ."', '".$description ."', '".$date ."', '".$time ."')";
			$result = $db->exec($command); // insert new event into database
		
			if ($result) {
                        	$_SESSION['success'] = "Event successfully created.";
				require('index.php');
				exit();
			}
			$db->close();
		
                }
                else{ //if "error" array not empty,
                        $_SESSION['errors'] = $errors;
			require('new_event.php');
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
