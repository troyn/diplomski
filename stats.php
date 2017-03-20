<?php session_start(); ?>
<?php require "includes/header.php"; ?>
<?php
	if ($_SESSION['authority'] == 0 OR (!isset($_SESSION['authority']))) redirect_to("index.php");
?>
  
<title>Statistike</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="delete_activity.php" class="btn btn-primary" role="button">Upravljanje aktivnostima</a>
			<a href="manage_employee.php" class="btn btn-primary" role="button">Upravljanje zaposlenicima</a>
			<a href="show_dates.php" class="btn btn-primary" role="button">Tablica vremena</a>
			
			
			<a href="stats.php" class="btn btn-info" role="button">Statistike</a>
			<a href="logout.php" class="btn btn-danger" role="button">Odjava</a>
			
		  </form>
        </div><!--/.navbar-collapse -->
	    </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
	    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	  <br />
        <table class = "table">
				<thead>
				 <tr>
				 <td>Aktivnosti</td>
				 <td>Zaposlenici</td>
				 </tr>
				</thead>
				<td>
					<form>
						<select class = "form-control" name="activities" onchange="showStatsAct(this.value)">
						<option value="">Odaberite aktivnost:</option>
						<option value ="all">Sve aktivnosti:</option>
					<?php 
						$query = get_activities();
						while ($activity = mysql_fetch_array($query)) {
							echo "<option value= \"" . $activity['id'] . "\">" . $activity['activity'] . "</option>";
						}
				
					  ?>
					  </select>
					  </form>
					  </td>
				<td>
					<form>
						<select class = "form-control" name="employees" onchange="showStatsEmp(this.value)">
						<option value="">Odaberite zaposlenika:</option>
						<option value ="all">Svi zaposlenici:</option>
					<?php 
						$query = get_employees();
						while ($employee = mysql_fetch_array($query)) {
							echo "<option value= \"" . $employee['id'] . "\">" . $employee['name'] . "</option>";
						}
				
					  ?>
					  </select>
					  </form>
				</td>
			
		</table>
		
		<div id = "activity"></div><br />
		<div id = "employee"></div>
		
		<script src = "js/jquery-3.1.1.js"></script>
		<script src = "js/global.js"></script>
      </div>

      <hr>

      
<?php require "includes/footer.php" ?>
