<?php 
	session_start();
	require "../includes/connection.php";
	require "../includes/functions.php";

	
	if (isset($_POST['act']) === true && empty($_POST['act']) === false) {
		
		echo "<table class = \"table\">
				<thead>
				 <tr>
				 <th>Aktivnost</th>
				 <th>Broj termina</th>
				 <th>Prihod</th>
				 </tr>
				</thead>";
		
		if ($_POST['act'] == "all") {
			
			$query = get_activities();
			$totalnr = 0;
			$totalincome = 0;
			
			$totalnrall = 0;
			$totalincomeall = 0;
			
			while ($row = mysql_fetch_array($query)) {
				$nr = 0;
				$query2 = get_dates_of_activity($row['id']);
				
				while ($row2 = mysql_fetch_array($query2)) {
					$nr += 1;
				}
				
				$income = $nr * $row['price'];
				$totalnr += $nr;
				$totalincome += $income;
				
				$totalnrall += $nr;
				$totalincomeall += $income;
				
				echo "<tr><td>" . $row['activity'] . "</td><td>" . $nr . "</td><td>" . $income . " kn</td></tr>";
				
			}
				echo "<tr class = \"success\"><td><strong>UKUPNO:</strong></td><td><strong>" . $totalnrall . "</strong></td><td><strong>" . $totalincomeall . " kn</	strong></td></tr>";
				echo "</table>";
			
		}
		
		

		else {
		$nr = 0;
		$query = get_activity_by_id($_POST['act']);
		$activity= mysql_fetch_array($query);
		$query2 = get_dates_of_activity($_POST['act']);
		
		while ($row = mysql_fetch_array($query2)) {
			$nr += 1;
		}
		
		$income = $nr * $activity['price'];
		
		echo "<tr><td>" . $activity['activity'] . "</td><td>" . $nr . "</td><td>" . $income . " kn" . "</td></tr></table>";
		}

	}
	
	
	if (isset($_POST['emp']) === true && empty($_POST['emp']) === false) {
		
		
				
		if ($_POST['emp'] == "all") {
			
			echo "<table class = \"table\">
				<thead>
				 <tr>
				 <th>Zaposlenik</th>
				 <th>Broj termina</th>
				 <th>Prihod</th>
				 </tr>
				</thead>";

			$query = get_employees();
			
			$totalnrall = 0;
			$totalincomeall = 0;
					
			while ($employee = mysql_fetch_array($query)) {
				$totalnr = 0;
				$totalincome = 0;
				$query2 = get_activities();
				while ($activity = mysql_fetch_array($query2)) {
					$actnr = 0;
					$query3 = get_dates_of_activity_by_employee($activity['id'], $employee['id']);
					while (mysql_fetch_array($query3)) {
					$actnr += 1;
					}
					$totalincome += $actnr * $activity['price'];
					$totalnr += $actnr;
					
					$totalnrall += $actnr;	
					
				}
				$totalincomeall += $totalincome;
				
			 
			 echo "<tr><td>" . $employee['name'] . "</td><td>" . $totalnr . "</td><td>" . $totalincome . " kn</td></tr>";
		
			}
			echo "<tr class = \"success\"><td><strong>UKUPNO:</strong></td><td><strong>" . $totalnrall . "</strong></td><td><strong>" . $totalincomeall . " kn</	strong></td></tr>";
			echo "</table>";
		}
		
		else {
			
			/*echo "<table class = \"table\">
				<thead>
				 <tr>
				 <th>Zaposlenik</th>
				 <th>Ukupno termina</th>
				 <th>Ukupni prihod</th>
				 </tr>
				</thead>"; 
				
			$totalnr = 0;
			$totalincome = 0;*/
			$query = get_employee_by_id($_POST['emp']);
			$employee = mysql_fetch_array($query);
			$query2 = get_activities();
			
			/*while ($activity = mysql_fetch_array($query2)) {
					$actnr = 0;
					$query3 = get_dates_of_activity_by_employee($activity['id'], $employee['id']);
					while (mysql_fetch_array($query3)) {
						$totalnr += 1;
						$actnr += 1;
					}
					$totalincome += $actnr * $activity['price'];
				}
			 
			 echo "<tr><td>" . $employee['name'] . "</td><td>" . $totalnr . "</td><td>" . $totalincome . " kn</td></tr>";
			 echo "</table>";  */
			
			echo "<table class = \"table\">
				<thead>
				 <tr>
				 <th>Aktivnosti zaposlenika: " . $employee['name'] . "</th>
				 <th>Broj termina aktivnosti</th>
				 <th>Prihod aktivnosti</th>
				 </tr>
				</thead>";
				
				$query = get_activities();
				$totaldates = 0;
				$totalincome = 0;
				
				while ($activity = mysql_fetch_array($query)) {
					$actnr = 0;
					$actincome = 0;
					$query2 = get_dates_of_activity_by_employee($activity['id'], $employee['id']);
					while (mysql_fetch_array($query2)) {
						$actnr += 1;
						}
					$actincome += $actnr * $activity['price'];
					echo "<tr><td>" . $activity['activity'] . "</td><td>" . $actnr . "</td><td>" . $actincome . " kn</td></tr>";
					$totaldates += $actnr;
					$totalincome += $actincome;
				}
				
				echo "<tr class = \"success\"><td><strong>UKUPNO:</strong></td><td><strong>" . $totaldates . "</strong></td><td><strong>" . $totalincome . " kn</	strong></td></tr>";
				echo "</table>";
			
			
			
		}
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>