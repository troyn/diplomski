<?php session_start();
	if ($_SESSION['authority'] == 0 OR (!isset($_SESSION['authority']))) redirect_to("index.php");
	
	require "includes/header.php";
?>
  
<title>Postavljanje smjena</title>

   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
          	<a href="manage_employee.php" class="btn btn-info" role="button">Upravljanje zaposlenicima</a>
			<a href="new_employee.php" class="btn btn-primary" role="button">Dodavanje zaposlenika</a>
			<a href="staff.php" class="btn btn-primary" role="button">Nazad</a>
			<a href="logout.php" class="btn btn-danger" role="button">Odjava</a>
			
		  </form>
        </div><!--/.navbar-collapse -->
	    </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>FERITOS Consulting!</h1>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet . Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php
			if (isset($_GET['id']) === true && isset($_GET['dt']) === true && isset($_GET['sh']) === true) {
				$emp = get_employee_by_name($_GET['id']);
				$employee = mysql_fetch_array($emp);
				set_shift($_GET['dt'], $employee['id'], $_GET['sh']);
				
			}
		
		
		
			if (!isset($_GET['id']) === true && !isset($_GET['mth']) === true) {
				$employees = get_employees();
				echo "<div class=\"form-group\">
					<form action = \"set_shifts.php\" method =\"get\">
					  <label for=\"id\">Odaberite zaposlenika:</label>	
					  <select class=\"form-control\" name=\"id\">";
					
				while ($employee = mysql_fetch_array($employees)) {
					echo "<option>" . $employee['name'] . "</option>";
				}
				echo "</select><br />";
				echo "<label for=\"mnth\">Odaberite mjesec:</label>	
					  <select class=\"form-control\" name=\"mth\">
						 <option>Siječanj</option>
						 <option>Veljača</option>
						 <option>Ožujak</option>
						 <option>Travanj</option>
						 <option>Svibanj</option>
						 <option>Lipanj</option>
						 <option>Srpanj</option>
						 <option>Kolovoz</option>
						 <option>Rujan</option>
						 <option>Listopad</option>
						 <option>Studeni</option>
						 <option>Prosinac</option>
						 </select><br />
						 <button type=\"submit\" class=\"btn btn-default\">Ispis</button>
						</form>";
				
			} else {
				
				
				
								
				$emp = get_employee_by_name($_GET['id']);
				$employee = mysql_fetch_array($emp);
				$mth = get_month($_GET['mth']);
				$query = get_employee_month($employee['id'], $mth);
				

									
			echo "<table class = \"table table-hover\">
					<thead>
					<tr>
					<th>Datum</th>
					<th>Trenutna smjena</th>
					<th>Postavi smjenu</th>
					</tr></thead>";
			while ($dates = mysql_fetch_array($query)) {
				$fixed = fix_date($dates['date']);
				echo "<tr><td>" . $fixed . "</td><td>";
				switch ($dates['shift']) {
					case "0":
						echo "<Strong>Nije postavljeno</strong>";
						break;
					case "1":
						echo "Prva smjena";
						break;
					case "2":
						echo "Druga smjena";
						break; 
				}
				if ($dates['n'] == "1") {echo "<strong> - neradni dan</strong>";};
				echo "</td><td>" . "<a href = \"set_shifts.php?id=" . $_GET['id'] . "&dt=" . $dates['date'] . "&sh=0&mth=" . $_GET['mth'] . "\">Ne radi</a>" . "&emsp;&emsp;";
				echo "<a href = \"set_shifts.php?id=" . $_GET['id'] . "&dt=" . $dates['date'] . "&sh=1&mth=" . $_GET['mth'] . "\">Prva smjena</a>" . "&emsp;&emsp;";
				echo "<a href = \"set_shifts.php?id=" . $_GET['id'] . "&dt=" . $dates['date'] . "&sh=2&mth=" . $_GET['mth'] . "\">Druga smjena</a>";
				echo "</td></tr>";	
			}
			echo "</table>";
			}
		?>
          
      </div>

      <hr>

      
<?php require "includes/footer.php" ?>
