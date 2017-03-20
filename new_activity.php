<?php session_start();
	if ($_SESSION['authority'] == 0 OR (!isset($_SESSION['authority']))) redirect_to("index.php");
	
	require "includes/header.php";
	
	if (isset($_POST['activity']) && isset($_POST['price'])) {
		$return = add_activity($_POST['activity'], $_POST['price']);
		}
		
?>
  
<title>Dodavanje aktivnosti</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="delete_activity.php" class="btn btn-primary" role="button">Upravljanje aktivnostima</a>
			<a href="new_activity.php" class="btn btn-info" role="button">Dodavanje Aktivnosti</a>
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
		if (isset($return)) {
			if ($return == 1) echo "<strong>Aktivnost je uspješno dodana!</strong>";
			if ($return == 0) echo "<strong>Aktivnost nije uspješno dodana.</strong>";
		};
	  ?> 
	     <br />
	     <form action = "new_activity.php" method ="post">
			<div class="form-group">
				<label for="activity">Ime aktivnosti:</label>
				<input type="text" class="form-control" name="activity">
			</div>
			<div class="form-group">
				<label for="price">Cijena termina:</label>
				<input type="text" placeholder="kn" class="form-control" name="price">
			</div>
  		<button type="submit" class="btn btn-default">Unos</button>
		</form>
      </div>

      <hr>

      
<?php require "includes/footer.php" ?>
