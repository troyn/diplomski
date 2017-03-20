<?php 
	session_start();
	require "../includes/connection.php";
	require "../includes/functions.php";

	/*$a = $_GET['a'];
	$result = get_employees_of_activity($a);

	while ($row = mysql_fetch_array($result)) {
		echo $row['name'];
	} */
	if (isset($_POST['act']) === true && empty($_POST['act']) === false)
	{
		$result = get_employees_of_activity($_POST['act']);
		echo "<form><select class = \"form-control\" name=\"employees\" onchange=\"showMonth(this.value)\">
				<option value=\"\">Odaberite zaposlenika:</option>";
		while ($employee = mysql_fetch_array($result)) {
			 echo "<option value= \"" . $employee['id'] . "\">" . $employee['name'] . "</option>";		
		}
		echo "</select></form>";
		 
		$_SESSION['activity'] =  $_POST['act'];


	}
	
	if (isset($_POST['emp']) === true && empty($_POST['emp']) === false) {
		
		echo "<form><select class = \"form-control\" name =\"mth\" onchange=\"showDay(this.value)\">
				<option value=\"\">Odaberite mjesec:</option>";
		
		  echo "<option value = \"1\">Siječanj</option>
				<option value = \"2\">Veljača</option>
				<option value = \"3\">Ožujak</option>
				<option value = \"4\">Travanj</option>
				<option value = \"5\">Svibanj</option>
				<option value = \"6\">Lipanj</option>
				<option value = \"7\">Srpanj</option>
				<option value = \"8\">Kolovoz</option>
				<option value = \"9\">Rujan</option>
				<option value = \"10\">Listopad</option>
				<option value = \"11\">Studeni</option>
				<option value = \"12\">Prosinac</option>";		
	
		echo "</select></form>";
		
		$_SESSION['employee'] =  $_POST['emp'];
		
	}
	
	if (isset($_POST['mth']) === true && empty($_POST['mth']) === false) {
		
		$number = cal_days_in_month(CAL_GREGORIAN, $_POST['mth'], 2017);
		
		echo "<form><select class = \"form-control\" name =\"day\" onchange=\"showFree(this.value)\">
				<option value=\"\">Odaberite dan:</option>";
				
		for ($k = 1 ; $k <= $number; $k++){ 
			echo "<option value= \"" . $k . "\">" . $k . "." . "</option>";		
		}
		
		echo "</select></form>";
		
		$_SESSION['month'] =  $_POST['mth'];
	
	}
	
	if (isset($_POST['day']) === true && empty($_POST['day']) === false) {
		
		
				
		$query = get_hours_of_employee_date($_SESSION['employee'], $_SESSION['month'], $_POST['day']);
		$hour = mysql_fetch_array($query);
		
		echo "<form><select class = \"form-control\" name =\"day\" onchange=\"showOver(this.value)\">
				<option value=\"\">Odaberite sat:</option>";
				
		if ($hour['8'] == "0") echo "<option value= \"" . "8" . "\">" . "8h" . "</option>";	
		if ($hour['9'] == "0") echo "<option value= \"" . "9" . "\">" . "9h" . "</option>";
		if ($hour['10'] == "0") echo "<option value= \"" . "10" . "\">" . "10h" . "</option>";
		if ($hour['11'] == "0") echo "<option value= \"" . "11" . "\">" . "11h" . "</option>";
		if ($hour['12'] == "0") echo "<option value= \"" . "12" . "\">" . "12h" . "</option>";
		if ($hour['13'] == "0") echo "<option value= \"" . "13" . "\">" . "13h" . "</option>";
		if ($hour['14'] == "0") echo "<option value= \"" . "14" . "\">" . "14h" . "</option>";
		if ($hour['15'] == "0") echo "<option value= \"" . "15" . "\">" . "15h" . "</option>";
		if ($hour['16'] == "0") echo "<option value= \"" . "16" . "\">" . "16h" . "</option>";
		if ($hour['17'] == "0") echo "<option value= \"" . "17" . "\">" . "17h" . "</option>";
		if ($hour['18'] == "0") echo "<option value= \"" . "18" . "\">" . "18h" . "</option>";
		if ($hour['19'] == "0") echo "<option value= \"" . "19" . "\">" . "19h" . "</option>";
		if ($hour['20'] == "0") echo "<option value= \"" . "20" . "\">" . "20h" . "</option>";
				
		echo "</select></form>";
		
		$_SESSION['day'] =  $_POST['day'];
		
	}
	
	if (isset($_POST['hr']) === true && empty($_POST['hr']) === false) {
		
		echo "<button id = \"play\" type=\"submit\" class=\"btn btn-default\" onclick = \"buttonClick()\">Dogovorite Termin</button>";
		
		$_SESSION['hour'] =  $_POST['hr'];
	}
	
	if (isset($_POST['button']) === true && empty($_POST['button']) === false) {
		
		$query = get_employee_by_id($_SESSION['employee']);
		$row = mysql_fetch_array($query);
		$employeename = $row['name'];
		
		$setup = setup_date($_SESSION['id'], $_SESSION['employee'], $_SESSION['day'], $_SESSION['month'], 2017, $_SESSION['hour'], $_SESSION['activity'], $employeename);
		if ($setup == 1) echo "<br /><strong>Uspješno ste dogovorili termin.</strong>";
	}
	
	
?>




