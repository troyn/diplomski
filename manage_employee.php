<?php session_start();
	if ($_SESSION['authority'] == 0 OR (!isset($_SESSION['authority']))) redirect_to("index.php");
	
	require "includes/header.php";
	
	if (isset($_GET['act'])) {
		if ($_GET['act'] == 1) {
			$result = delete_employee($_GET['id']);
		}
		if ($_GET['act'] == 2) {
			//get_timetable();
	}}
		
?>
  
<title>Upravljanje zaposlenicima</title>

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
			if (isset($result)) {
				if ($result == 1) echo "<strong>Zaposlenik je uspješno obrisan.</strong>";
				if ($result == 0) echo "<strong>Nije moguće obrisati zaposlenika s aktivnim terminima.</strong>";
				echo "<br /><br />";
			}
			
			$employees = get_employees();
			echo "<table class = \"table\">
				<thead></thead>";
				while ($row = mysql_fetch_array($employees)) {
			echo "<tr><td>" . $row["name"] . "</td><td><a href=\"manage_employee.php?id=" . $row['id'] . "&act=1" . "\">Obriši zaposlenika</a>" . "</td>";
			echo "<td><a href=\"employee_dates.php?id=" . $row['id'] . "\">Pogledaj termine</a>" . "</td>";
			echo "<td><a href=\"employee_activity.php?id=" . $row['id'] . "&act=3" . "\">Uredi aktivnosti</a>" . "</td>";
			echo "<td><a href = \"set_shifts.php" . "\">Postavi smjene</a></td></tr>";
		}
			echo "</table>";
		?>
  	<hr>

      
<?php require "includes/footer.php" ?>