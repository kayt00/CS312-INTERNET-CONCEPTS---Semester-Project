<?php

        //Katie Taylor - March 12, 2020
        include 'header.php';
	
	session_start();
	if (empty($_SESSION['logged_in']) || !$_SESSION['logged_in']) { // if user not logged in, redirect to login page to allow access to secure resource
		header('Location: login.php');
		exit();
	}
?>
        <body>
                <div id="container">
                        <div id="header">
                                <h1>Ultimutt Animal Rescue</h1>
                        </div>

               <div id="column0"><?php include 'menu.php' ?></div>
	       <div id="column3">
			<?php
       				if (isset($_SESSION['errors'])) {
                			foreach ($_SESSION['errors'] as $result) {
                			   echo($result);
                			}
                			unset($_SESSION['errors']);
       				 }

			?>
		<h2>New Event Form</h2>
		<form method="post" action="new_event_action.php" onsubmit="return validate()">
                        <fieldset>
				Event Name:<br>
                                <input type="text" name="name" id="name" size="24" required title="Event name should consist only of characters, numbers, and whitespace"
				pattern="[a-zA-Z0-9 ]*$">*<br><br>
                                Sponsor:<br>
                                <input type="text" name="sponsor" id="sponsor" size="24" required title="Sponsor name should consist only of characters, numbers, and whitespace" 
				pattern="[a-zA-Z0-9 ]*$" placeholder="e.g. PetSmart">*<br><br>
                                Description:<br>
                                <input type="text" size="200" required name="description" id="description" pattern="[A-Za-z0-9 ]*$" placeholder="up to 200 characters(whitespace & numbers included)">*<br><br>
                                Date:<br>
                                <input type="date" name="date" id="date">*<br><br> 
				Time:<br>
                                <input type="time" name="time" id="time">*<br><br>
                        </fieldset>
                        <div><input type="submit" value="Submit"></div>
                </form>
                </div>
		<div id="footer">Ultimutt Animal Rescue is a 501(c)(3) non-profit organization.
                         Copyright © 2020 · All Rights Reserved · Ultimutt Animal Rescue.</div>
                </div>

				<script type="text/javascript">
					document.getElementById('date').addEventListener("change", validate); 
					
					function validate() {
						var dt = document.getElementById('date').value;
						var today = new Date();
						var dd = String(today.getDate()).padStart(2, '0');
						var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
						var yyyy = today.getFullYear();

						yyyy2 = dt[0] + dt[1] + dt[2] + dt[3];
						mm2 = dt[5] + dt[6];
						dd2 = dt[8] + dt[9];
						console.log(yyyy2);
						console.log(mm2);
						console.log(dd2);
						console.log(yyyy);
						console.log(mm);
                                                console.log(dd);
						console.log(dt);
						
						if(yyyy2 < yyyy) {    
                                                        window.alert("Please select a different year for the event date. Only current and upcoming events may be added.");
                                                        return false;
                                                } else if(yyyy2 > yyyy) { 
							return true;
						} else if(yyyy2 == yyyy) {
							if(mm2 < mm) {
								window.alert("Please select a different month for the event date. Only current and upcoming events may be added.");
								return false;
							} else if(mm2 > mm) {
								return true;
							} else if(mm2 == mm) {
								if(dd2 < dd) {
									window.alert("Please select a different day for the event date. Only current and upcoming events may be added.");
									return false;
								} else {
									return true;
								}
							}


						}
					} 
				</script>
        </body>

