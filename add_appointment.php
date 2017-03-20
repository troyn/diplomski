<?php session_start();?>
<?php require "includes/header.php"; ?>
  
<title>Dodavanje termina</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="add_appointment.php" class="btn btn-info" role="button">Dodavanje termina</a>
			<a href="view_appointments.php" class="btn btn-primary" role="button">Pregled termina</a>
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
        <div class>
		<form>
			<select class = "form-control" name="activities" onchange="showUser(this.value)">
			<option value="">Odaberite aktivnost:</option>
		<?php 
			$query = get_activities();
			while ($activity = mysql_fetch_array($query)) {
				echo "<option value= \"" . $activity['id'] . "\">" . $activity['activity'] . "</option>";
			}
	
		  ?>
		  </select>
		</form>
		</div>
		<br />
		
		<div id = "employee-list"><select class = "form-control"></select></div> <br />
		<div id = "month-list"><select class = "form-control"></select></div> <br />
		<div id = "day-list"><select class = "form-control"></select></div> <br />
		<div id = "hour-list"><select class = "form-control"></select></div> <br />
		<div id = "button"></div>
		<div id = "info"></div>
		
		<script src = "js/jquery-3.1.1.js"></script>
		<script src = "js/global.js"></script>
		
      </div>

      <hr>

<?php require "includes/footer.php" ?>