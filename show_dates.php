<?php session_start();
	require "includes/header.php";
	if ($_SESSION['authority'] == 0 OR (!isset($_SESSION['authority']))) redirect_to("index.php");
	
?>
  
<title>Tablica vremena</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="delete_activity.php" class="btn btn-primary" role="button">Upravljanje aktivnostima</a>
			<a href="manage_employee.php" class="btn btn-primary" role="button">Upravljanje zaposlenicima</a>
			<a href="show_dates.php" class="btn btn-info" role="button">Tablica vremena</a>
			<a href="stats.php" class="btn btn-primary" role="button">Statistike</a>
			<a href="logout.php" class="btn btn-danger" role="button">Odjava</a>
			
		  </form>
        </div><!--/.navbar-collapse -->
	    </div>
    </nav>
	<br/>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	   	<?php
			if (isset($_POST['id'])) {
			$emp = get_employee_by_name($_POST['id']);
			$employee = mysql_fetch_array($emp);
			echo "<strong>Vremenska tablica zaposlenika za mjesec " . $_POST['mth'] . " - " . $employee['name'] . "<br />" . "Legenda: 2 - ne radi, 1 - radi-termin zauzet,
			0 - radi-termin slobodan</strong>";
			$month = get_month($_POST['mth']);
			$dates = get_dates_by_employee_id_month($employee['id'], $month);
		
			echo "<table class = \"table\">
				<thead>
				 <tr>
					<th>Datum</th>
					<th>8h</th>
					<th>9h</th>
					<th>10h</th>
					<th>11h</th>
					<th>12h</th>
					<th>13h</th>
					<th>14h</th>
					<th>15h</th>
					<th>16h</th>
					<th>17h</th>
					<th>18h</th>
					<th>19h</th>
					<th>20h</th>
				 </tr>
			</thead>";
			while ($row2 = mysql_fetch_array($dates)) {
			echo "<tr><td>" . fix_date($row2['date']) . "</td><td>" . $row2['8'] . "</td><td>" . $row2['9'] . "</td><td>" . $row2['10'] . "</td><td>" . $row2['11']
				. "</td><td>" . $row2['12'] . "</td><td>" . $row2['13'] . "</td><td>" . $row2['14'] . "</td><td>" . $row2['15'] . "</td><td>" . $row2['16'] .
				"</td><td>" . $row2['17'] . "</td><td>" . $row2['18'] . "</td><td>" . $row2['19'] . "</td><td>" . $row2['20'] .	"</td></tr>";
			}}
			else {
				
				$employees = get_employees();
				echo "<div class=\"form-group\">
					<form action = \"show_dates.php\" method =\"post\">
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
			}?>
			
		</div>

  		<hr>

      </div> <!-- /container -->
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
mysql_close($connection);
?>