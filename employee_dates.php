<?php session_start();
	require "includes/header.php";
	if ($_SESSION['authority'] == 0 OR (!isset($_SESSION['authority']))) redirect_to("index.php");
	
?>
  
<title>Termini</title>

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
	
	<div class="jumbotron">
      <div class="container">
        <h1>FERITOS Consulting!</h1>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet . Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
	<br/>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
			
			<table class = "table table-hover">
				<thead>
				 <tr>
				 <th>Aktivnost</th>
				 <th>Vrijeme termina</th>
				 <th>Korisnik</th>
				 <th></th>
				 </tr>
				</thead>
			
			
			<?php
				
				if (isset($_GET['dt'])) date_done($_GET['dt']);
			
			
			
				$query = get_employee_dates($_GET['id']);
				$query2 = get_employee_by_id($_GET['id']);
				$employee = mysql_fetch_array($query2);
				echo "<strong>Dogovoreni termini zaposlenika: " . $employee['name'] . "</strong><br /><br />";
				while ($row = mysql_fetch_array($query)) {
					if ($row['finish'] == 0) {
						$activity = get_activity_by_id($row['activity']);
						$user = get_user_by_id($row['user']);
						$activity = mysql_fetch_array($activity);
						$user = mysql_fetch_array($user);
						
						echo "<tr><td>" . $activity['activity'] . "</td><td>" . fix_date($row['start']) . "</td><td>" . $user['name'] . "</td><td>" . 
							 "<a href = \"employee_dates.php?dt=" . $row['id'] . "\">Termin održan</a>" . "</td></tr>";
					}
				}
			?>
			</table>
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