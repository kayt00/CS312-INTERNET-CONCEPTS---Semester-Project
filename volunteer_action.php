<?php
        // Katie Taylor - March 13, 2020
	session_start();
        $errors = [];
        $fname = $lname = $email = " ";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["firstname"])) { //first name validation - extra precaution 
                        $errors['fnameErr']  = "\n*First name is required"; //I have firstname flagged as 'required' in <form>
                } else {
                        $fname = test_input($_POST["firstname"]);
                        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                                $errors['fnameErr']  = "\n*Only letters and white space allowed for first name";
                        }
                }
                if (empty($_POST["lastname"])) { //last name validation - extra precaution
                        $errors['lnameErr'] = "\n*Last name is required"; //I have last name flagged as 'required' in <form>
                } else {
                         $lname = test_input($_POST["lastname"]);
                        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                               $errors['lnameErr'] = "\n*Only letters and white space allowed for last name";
                        }
                }
                if (empty($_POST["email"])) { //email validation - extra precaution
                        $errors['emailErr'] = "\n*Email is required"; //I have email name flagged as 'required' in <form>
                } else {
                         $email = test_input($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                              $errors['emailErr'] = "\n*Invalid email format";
                        }
                }


                if(empty($errors)) { //if "errors" array empty after input validation -> no errors found
                        $string = $fname . ' ' . $lname . ' ' .  $email;
                        $fp = fopen("/home/ktaylo/secure_html/cs312/project/volunteer_data.txt", "a+");
                        fwrite($fp, $string."\n"); //write concenated string of input data to output file
                        fclose($fp);
                        $_SESSION['success'] = 'You volunteer information has been successfully sent over. Thanks for signing up!';
                        require('/home/ktaylo/secure_html/cs312/project/index.php');
			exit();
                }
                else{ //if "error" array not empty,
                        $_SESSION['errors'] = $errors;
                        require('volunteer.php');
			exit();
                        /*foreach($errors as $val){ //traverse array and print each error
                                echo $val . '<br/>';
                        }*/
                }
        }

        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }


?>
