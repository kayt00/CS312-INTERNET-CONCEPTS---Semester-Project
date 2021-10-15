<?php

        //Katie Taylor - March 12, 2020
        include 'header.php';
?>
	<body>
                <div id="container">
                        <div id="header">
                                <h1>Ultimutt Animal Rescue</h1>
                        </div>

                <div id="column0"><?php include 'menu.php' ?></div>
		
		<div id="column3">
			<?php
			      /*if (isset($_SESSION['message'])) {
         			  echo $_SESSION['message'];
                		  unset($_SESSION['message']);
        		      }*/
			      if (isset($_SESSION['errors'])) {
                			foreach ($_SESSION['errors'] as $result) {
                			   echo($result);
               		      		}
               			 unset($_SESSION['errors']);
        		      }
			?>
		<h2>Registration Form</h2>
		<form method="post" action="registration_action.php" onsubmit="return validate();">
        		<fieldset>
                        	First name:<br>
                        	<input type="text" name="firstname" id="fname" size="24" title="Names should include characters & whitespace only" 
				required placeholder="Jane" pattern="[a-zA-Z ]*$">*<br><br>
                        	Last name:<br>
                        	<input type="text" name="lastname" id="lname" size="24" title="Names should include characters & whitespace only" 
				required placeholder="Doe" pattern="[a-zA-Z ]*$">*<br><br>
                        	Age:<br>
                                <input  type="number" name="age" id="age" title="accepted age range 1-110" 
				placeholder="18" min="1" max="110">*<br><br>
				Email:<br>
                        	<input type="email" name="email" id="email" title="Emails should include special characters '@' and '.'" 
				required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        	size="35" placeholder="e.g. ilovecats@gmail.com">*<br><br>
                        	User Id:<br>
                                <input type="text" name="userid" id="userid" size="100" title="Must contain 3 to 15 characters with any lower case character, digit or special symbols '_' '-' only"  
				required pattern="^[a-z0-9_-]{3,15}$" 
				placeholder="Must contain 3 to 15 characters with any lower case character, digit or special symbols '_' '-' only">*<br><br>
				Password:<br>
                                <input type="password" name="password" id="pwd" size="100" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
     				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
				placeholder="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">*<br><br>
				Confirm Password:<br>
                                <input type="password" name="passwordConfirm" id="pwd2" size="100" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
				placeholder="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >*<br><br>
				
				<script type="text/javascript">
                                        document.getElementById('pwd2').addEventListener("change", validate); 
                                        function validate() {
                                                var pwd = document.getElementById('pwd').value;
                                        	var pwd2 = document.getElementById('pwd2').value;
						if(pwd != pwd2) {
							window.alert("Passwords do not match");
							console.log(pwd.value);
                                                        console.log(pwd2.value);
							return false;
                                                } else {
							return true;
                                                }
                                        }
                                </script>
				Favororite Pet:<br>
                                <select name="pet" id="pet">
                                <option value="cat" selected>Cat</option>
                                <option value="dog">Dog</option>
                                <option value="bird">Bird</option>
                                <option value="fish">Fish</option>
                                <option value="rodent">Rodent</option>
                                <option value="reptile">Reptile</option>
                                <option value="other">Other</option>
                                </select><br><br>
				Membership:<br>
                        	<input type="radio" name="membership" value="donation">I would like to receive up to date emails regarding the 
				current supplies needed by the Ultimutt Animal Rescue for donation.<br>
                        	<input type="radio" name="membership" value="adoption">I would like to receive up to date emails regarding the      
                                current and upcoming adoption events held by the Ultimutt Animal Rescue.<br>
                        	<input type="radio" name="membership" value="both" checked>I would like to receive up to date information on both.<br><br>
                	</fieldset>
        		<div><input type="submit" name="submit" id="submit" value="Submit"></div>
	       </form>
		</div>
		<div id="footer">Ultimutt Animal Rescue is a 501(c)(3) non-profit organization.
                         Copyright © 2020 · All Rights Reserved · Ultimutt Animal Rescue.</div>
		</div>
	</body>
