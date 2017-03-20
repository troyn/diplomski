<?php require "includes/header.php"; ?>
<?php
	if (!empty($_POST['activity'])) {
		$size = count($_POST['activity']);
		if ($size < 4) {
			if ($size == 3) $return = change_employee_activity($_GET['id'], $_POST['activity'][0], $_POST['activity'][1], $_POST['activity'][2]);
			if ($size == 2) $return = change_employee_activity($_GET['id'], $_POST['activity'][0], $_POST['activity'][1], 0);
			if ($size == 1) $return = change_employee_activity($_GET['id'], $_POST['activity'][0], 0, 0);
			if ($size == 0) $return = change_employee_activity($_GET['id'], 0, 0, 0);
		} else $sizecount = 1;
	}
?>
  
<title>Aktivnosti zaposlenika</title>

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
			if (isset($return) && ($return == 1)) echo "<strong>Promjena aktivnosti uspješno je napravljena!</strong><br /><br />";
			
			$employee = get_employee_by_id($_GET['id']);
			$row = mysql_fetch_array($employee);
			$activities = get_activities_by_employeeid($row['id']);
			echo "<strong>Zaposlenik: </strong><br />" . $row['name'] . "<br /><br />" . "<strong>Trenutne aktivnosti:</strong>" . "<br />"	;
			while ($row2 = mysql_fetch_array($activities)) {
				echo $row2['activity'] . "<br />";
			}
			echo "<br /> <br /><strong>Odaberite željene aktivnosti:</strong>";
			?>
			
		
		<?php
			echo "<form action = \"employee_activity.php?id=" . $row['id'] . "\"" . "method =\"post\">";
			$activities2 = get_activities();
			while ($row3 = mysql_fetch_array($activities2)) {
			echo "<div class =\"checkbox\"><label><input type=\"checkbox\" name = \"activity[]\" value=\"" . $row3['id'] . "\">" . $row3['activity'] . "</label></div>";
		} ?>
				
  		<button type="submit" class="btn btn-default">Unos</button>
		</form>

		</div>		
  		<hr>

      
<?php require "includes/footer.php" ?>