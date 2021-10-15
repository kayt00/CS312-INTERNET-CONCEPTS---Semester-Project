<?php

        //Katie Taylor - February 13, 2020
	include 'header.php';
?>

        <body>
		<div id="container">
                        <div id="header">
                                <h1>Ultimutt Animal Rescue</h1>
                        </div>
 		
		<div id="column0"><?php include 'menu.php' ?></div>
	      
		<div id="column1">
			<h5>Volunteers play a central role in the delivery of the the  Ultimutt Rescue’s mission of compassion, 
	     		and we strive to create a rewarding experience for those who dedicate their time and energy our cause. 
	      		Through collaboration and communication, staff and volunteers work together to create a positive and 
	     		productive shelter environment, providing quality care to our animals and humane education to our community. 
	      		Volunteers lend their skills and talents to aid the Ultimutt Rescue staff in all areas of our organization, 
	      		proving to be an indispensable resource to the Ultimutt Rescueand the community in which we serve.</h5>

         		<h4>Please fill in your information on the right if you are interested in becoming a volunteer for the Ultimutt Animal Rescue!</h4>
		</div>
			
		<div id="column2">
			<?php
                              if (isset($_SESSION['errors'])) {
                                        foreach ($_SESSION['errors'] as $result) {
                                           echo($result);
                                        }
                                 unset($_SESSION['errors']);
                              }
                        ?>
			<form method="post" action="volunteer_action.php">
        			<fieldset>
                        		First name:<br>
                        		<input type="text" name="firstname" size="24" required placeholder="Jane">*<br><br>
                        		Last name:<br>
                        		<input type="text" name="lastname" size="24" required placeholder="Doe">*<br><br>
                        		Email:<br>
                        		<input type="email" name="email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        			size="35" placeholder="e.g. ilovecats@gmail.com">*<br><br>
					
					<div><input type="submit" value="Submit"></div>
				</fieldset>
			</form><br><br><br></div>
		
		<div id="footer">Ultimutt Animal Rescue is a 501(c)(3) non-profit organization.
                         Copyright © 2020 · All Rights Reserved · Ultimutt Animal Rescue.</div>

		</div>
	</body>
