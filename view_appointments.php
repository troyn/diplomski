<?php session_start();?>
<?php require "includes/header.php";
	  if (!isset($_SESSION['authority'])) redirect_to("index.php"); 
?>
  
<title>Pregled termina</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="add_appointment.php" class="btn btn-primary" role="button">Dodavanje termina</a>
			<a href="view_appointments.php" class="btn btn-info" role="button">Pregled termina</a>
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
			if (isset($_GET['del'])) {
				$delete = delete_date($_GET['del']);
			}
		
		
			$query = get_dates_by_user($_SESSION['id']);
			if (sizeof($query) == 0) echo "<strong>Nemate dogovorenih termina!</strong>";
				else {	
					echo " <div class=\"col-md-8\">";
					if (isset($delete) === true && ($delete == 1)) echo "<p><strong>Uspješno ste otkazali termin!</strong></p>";
					echo "<table class = \"table table-hover\">
					<thead>
					<tr>
					<th>Datum</th>
					<th>Aktivnost</th>
					<th>Zaposlenik</th>
					<th>Opcije</th>
					</tr>
					</thead>";
					while ($appointment = mysql_fetch_array($query)) {
						$employee = mysql_fetch_array(get_employee_by_id($appointment['employee']));
						$activity = mysql_fetch_array(get_activity_by_id($appointment['activity']));
						echo "<tr><td>" . $appointment['start'] . "</td><td>" . $activity['activity'] . "</td><td>" . $employee['name'] . "</td><td>"
						. "<a href = \"view_appointments.php?del=" . $appointment['id'] . "\">Otkaži termin</a></tr>";
				
				}
				echo "</div><div class = \"col-md-4\"></div>";
				};
		?>
		<br />
	
      </div>

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