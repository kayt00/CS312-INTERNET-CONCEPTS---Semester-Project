<?php

        //Katie Taylor - April 2, 2020
        include 'header.php';
?>
<div id="success"><?php
	if (isset($_SESSION['errors'])) {
        	foreach ($_SESSION['errors'] as $result) {
                	echo($result);
                }
                unset($_SESSION['errors']);
        }
        if (isset($_SESSION['invalid'])) {
        	echo $_SESSION['invalid'];
        	unset($_SESSION['invalid']);
        }
        if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
        }
?></div>
	<body>
                <div id="container">
                        <div id="header">
                                <h1>Ultimutt Animal Rescue</h1>
                        </div>

                <div id="column0"><?php include 'menu.php' ?></div>

		<div id="column3">
                <h2>Login</h2>
                <form method="post" action="login_action.php">
                        <fieldset>
				User Id:<br>
                                <input type="text" name="userid" id="userid" size="100" title="Must contain 3 to 15 characters with any lower case character, digit or special symbols '_' '-' only"  
                                required pattern="^[a-z0-9_-]{3,15}$" 
                                placeholder="Must contain 3 to 15 characters with any lower case character, digit or special symbols '_' '-' only">*<br><br>
                                Password:<br>
                                <input type="password" name="password" id="password" size="100" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                placeholder="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">*<br><br>
                         <div><input type="submit" value="Submit"></div>
                         </fieldset>
                </form><br><br><br>
		</div>
		
		</div>
                <div id="footer">Ultimutt Animal Rescue is a 501(c)(3) non-profit organization.
                         Copyright © 2020 · All Rights Reserved · Ultimutt Animal Rescue.</div>
                </div>
        </body>
