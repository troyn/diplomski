<?php session_start();?>
<?php require "includes/header.php"; ?>
  
<title>FERITOS Consulting</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action = "login.php" method ="post">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name ="username">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control"name = "password">
            </div>
            <button type="submit" class="btn btn-success">Prijava</button>
			<a href="register.php" class="btn btn-info" role="button">Registracija</a>
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
        <div>
		<form>
			<select name="activities" onchange="showUser(this.value)">
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
		
		<div id = "employee-list"></div> <br />
		<div id = "month-list"></div> <br />
		<div id = "day-list"></div> <br />
		<div id = "hour-list"></div> <br />
		<div id = "info"></div> <br />


		<script src = "js/jquery-3.1.1.js"></script>
		<script src = "js/global.js"></script>
		
      </div>

      <hr>

<?php require "includes/footer.php" ?>