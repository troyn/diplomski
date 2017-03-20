<?php session_start();
	if ($_SESSION['authority'] == 0 OR (!isset($_SESSION['authority']))) redirect_to("index.php");
	
	require "includes/header.php";

	if (isset($_GET['act'])) {
		$return = delete_activity($_GET['act']);
	}
?>
  
<title>Upravljanje aktivnostima</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action = "login.php" method ="post">
            <a href="delete_activity.php" class="btn btn-info" role="button">Upravljanje aktivnostima</a>
			<a href="new_activity.php" class="btn btn-primary" role="button">Dodavanje Aktivnosti</a>
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
			
			
			if (isset($_GET['price']) && !isset($_POST['price'])) { 
				$activities = get_activity_by_id($_GET['price']);
				$row = mysql_fetch_array($activities);
				echo 	"<form class=\"form-inline\" method = \"post\">
						  <div class=\"form-group\">
							 <label for=\"email\">Postavi cijenu za aktivnost: " . $row['activity'] . ": </label>
							 <input type=\"text\" class=\"form-control\" name=\"price\">
						  </div>";
				echo "<button type=\"submit\" class=\"btn btn-default\">Postavi</button></form>";
				echo "<br /><br />";
			}
			
			if (isset($_POST['price'])) {
								change_activity_price($_GET['price'], $_POST['price']);
								echo "<strong>Cijena je uspješno promijenjena.</strong><br /><br />";
			}
		?>
		<?php
		
		if (isset($return)) {
			if ($return == 1) echo "<strong>Aktivnost je uspješno obrisana.</strong>" . "<br /> <br />";
			if ($return == 0) echo "<strong>Došlo je do greške pri brisanju aktivnosti.</strong>" . "<br /> <br />";
			if ($return == 2) echo "<strong>Nije moguće obrisati aktivnost koja ima nedovršenih termina!</strong>" . "<br><br />";
		}
		echo "<table class = \"table table-hover\">
					<thead>
					<tr>
					<th>Aktivnost</th>
					<th>Cijena</th>
					<th></th>
					<th></th>
					</tr>
					</thead>";
		$activities = get_activities();
		while ($row = mysql_fetch_array($activities)) {	
			echo  "<tr><td>" . $row["activity"] . "</td><td>" . $row['price'] . " kn</td><td>" . "<a href=\"delete_activity.php?price=" . $row['id'] . "\">Promijeni cijenu</a></td><td>" . "<a href=\"delete_activity.php?act=" . $row['id'] . "\">Obriši aktivnost</a></td>";
		}
			
		?>
		
		
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
