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
                <div id="neweventbutton"><button class="newevent" onclick="window.location.href = 'https://www.cs.odu.edu/~ktaylo/cs312/project/new_event.php';">Create New Event</button>
                </div>
                <div id="column4"><h6>Upcoming Events & Fundraisers:</h6>
                <table>
		<row><th>Name</th><th>Sponsor</th><th>Description</th><th>Date</th><th>Time</th></row>
		<?php
			$event = [];
			$db = new SQLite3('project.db');  // open the DB
  			$query = 'SELECT * FROM event ORDER BY day, time'; // get all events sorted by day & time
  			$result = $db->query($query); // execute the query
  			while ($event = $result->fetchArray(SQLITE3_ASSOC) ) {  // get next row
  			  echo '<tr><td>'. $event['name']. '</td><td>'. $event['sponsor']. '</td><td>'. $event['text']. '</td><td>'. $event['day']. '</td><td>'. $event['time']. '</td></tr>';
  			}
			$db->close();

			/*$myfile = fopen("events.txt", "r") or die("Unable to open file!");
			
			while(!feof($myfile)) {
				$event = $value = fgets($myfile);
				$key = substr($event, 0, 13);
				$key = str_replace("-", "", $key);
				$array[$key] = $value;
			}
			
			fclose($myfile);

			ksort($array);
				
			$file = fopen("events.txt", "w") or die("Unable to open file!");
			foreach ($array as $key => $val) {
 				fwrite($file, $val);
			}
			fclose($file);

			$sortedFile = fopen("events.txt", "r") or die("Unable to open file!");

			while(!feof($sortedFile)) {
                      		$string = "<br>" . fgets($sortedFile) . "<br>";
                       		$tok = strtok($string, "*a");
                       		while ($tok !== false) {
                              		echo $tok . "<br>";
                                        $tok = strtok("*");
                                }
                        }
                        fclose($sortedFile);*/				
                ?>
		</table>
		</div>
		<div id="footer">Ultimutt Animal Rescue is a 501(c)(3) non-profit organization.
                         Copyright © 2020 · All Rights Reserved · Ultimutt Animal Rescue.</div>
        	</div>
        </body>
