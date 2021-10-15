<?php 

	//Katie Taylor - March 14, 2020
        include 'header.php';
?>
<div id="success"><?php
	
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
        			<div id="column0"><?php include 'menu.php'?></div> 
                        	  
        			
				<div id="column1"><h2>Welcome furriends!</h2>
        
                     			<p>Ultimutt Animal Rescue is a non-profit organization established to rescue,
                     			rehabilitate, and rehome unwanted animals to qualified, loving homes. We provide
                     			our animals with medical treatment, shelter, food, and love all which is supported
                     			by the generosity of the community.</p>
                
                     			<p>For information on adoption and upcoming events please navigate to our menu at the top of the page.</p>
					
					<?php 
					//if (empty($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
						echo "<br/><br/>Are you interested in becoming an Ultimutt Animal Rescue member? 
						<a href='https://www.cs.odu.edu/~ktaylo/cs312/project/registration.php'>Register now!</a><br/>";
						//<button onclick="window.location.href = 'https://www.cs.odu.edu/~ktaylo/cs312/project/registration.php';">Register</button> 
						//echo '<a href="https://www.cs.odu.edu/~ktaylo/cs312/project/registration.php">Register</a>';
						echo '<br/>Already a member? <a href="https://www.cs.odu.edu/~ktaylo/cs312/project/login.php">Login here!</a><br/>';
						//<button onclick="window.location.href = 'https://www.cs.odu.edu/~ktaylo/cs312/project/login.php';">Login</button>
						//echo '<a href="https://www.cs.odu.edu/~ktaylo/cs312/project/login.php">Login</a>';
					//}
					//if(isset($_SESSION['logged_in'])) {	
						echo '<br/><form method ="post" action="logout_action.php"><input type="submit" value="Logout"></form>';
					//}
					?>
				</div>
			
			<img src="indexIMG.png"  width=1100 height=722 alt="Dachshund Puppy"/> 
			
                        <div id="footer">Ultimutt Animal Rescue is a 501(c)(3) non-profit organization.
                         Copyright © 2020 · All Rights Reserved · Ultimutt Animal Rescue.</div>
                </div>
        </body>	
