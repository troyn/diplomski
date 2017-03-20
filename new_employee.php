<?php require "includes/header.php"; ?>
<?php
	if (!empty($_POST['activity'])) {
		//foreach($_POST['activity'] as $check) {}
		$size = count($_POST['activity']);
		if ($size < 4) {
		$return = add_employee($_POST['name'], $_POST['activity'][0], $_POST['activity'][1], $_POST['activity'][2] );
		} else $sizecount = 1;
	}
?>
  
<title>Dodavanje zaposlenika</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="manage_employee.php" class="btn btn-primary" role="button">Upravljanje zaposlenicima</a>
			<a href="new_employee.php" class="btn btn-info" role="button">Dodavanje zaposlenika</a>
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
	  
		<?php	  if (isset($return)) {
					if ($return == 1) echo "<strong>Zaposlenik je uspješno dodan.</strong>" . "<br /> <br />";
					if ($return == 0) echo "<strong>Došlo je do greške pri unosu zaposlenika.</strong>" . "<br /> <br />";
					}
					
				  if (isset($sizecount)) echo "<strong>Greška pri unosu, zaposlenik može imati najviše 3 aktivnosti!<strong>" . "<br /> <br />";
		
		?>
        
		<form action = "new_employee.php" method ="post">
			<div class="form-group">
				<label for="activity">Ime zaposlenika:</label>
				<input type="text" class="form-control" name="name">
			</div>
		<label>Aktivnosti:</label>
		<?php
			$activities = get_activities();
			while ($row = mysql_fetch_array($activities)) {
			echo "<div class =\"checkbox\"><label><input type=\"checkbox\" name = \"activity[]\" value=\"" . $row['id'] . "\">" . $row['activity'] . "</label></div>";
		}
		?>
				
  		<button type="submit" class="btn btn-default">Unos</button>
		</form>

      <hr>

      
<?php require "includes/footer.php" ?>
