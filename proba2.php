<?php require "includes/header.php";

$id = 24;
get_employee_dates($id);
if (mysql_affected_rows() > 0) echo "petar";
else echo "mater";




/*
$act = 25;
$emp = 20;
$query = get_dates_of_activity_by_employee($act, $emp);
while ($row = mysql_fetch_array($query)) echo $row['start'];



/*
$id = 26;
$nr = 0;
$query = get_dates_of_activity($id);
while ($row = mysql_fetch_array($query)) $nr += 1;
echo $nr;

$query = get_activity_by_id($id);
$act = mysql_fetch_array($query);
$income = $nr * $act['price'];
echo $income;



/*$id = 21;

$query = mysql_query("SELECT * FROM `dates` WHERE `dates`.`id` = {$id}");
$info = mysql_fetch_array($query);
echo $info['start'];
echo "<br />";
	
	
$employee = get_employee_by_id($info['employee']);
$employeeinfo = mysql_fetch_array($employee);
$employeename = str_replace(' ', '', $employeeinfo['name']);
echo $employeename ;	
echo "<br />";
	
$dt1 = new DateTime($info['start']);
$h = $dt1->format('H');
$dt = $dt1->format('Y-m-d');
echo "SAT:" . $h . "<br />";
echo "DATUM:" . $dt . "<br />";
echo "EMP ID:" . $employeeinfo['id'];

$query2 = mysql_query("UPDATE {$employeename}{$employeeinfo['id']} SET `{$h}` = 5 WHERE `date` = '{$dt}' ");


function delete_date($id) {
	$query = mysql_query("SELECT * FROM `dates` WHERE `dates`.`id` = {$id}");
	$info = mysql_fetch_array($query);
	$employee = get_employee_by_id($info['employee']);
	$employeeinfo = mysql_fetch_array($employee);
	
	$employeename = str_replace(' ', '', $employeeinfo['name']);
	$dt1 = new DateTime($info['start']);
    $h = $dt1->format('H');
	
	$query2 = mysql_query("UPDATE {$employeename}{$employeeinfo['id']} SET `{$h}` = 1 WHERE `date` = date('{$info['start']}') ");
	
	if ($query2) {
	
	$query3 = mysql_query("DELETE FROM `dates` WHERE `dates`.`id` = {$id} ");
	if ($query3) {
		return 1;
} else return 0; };
}

/*	
	if ($query2) {
	
	$query3 = mysql_query("DELETE FROM `dates` WHERE `dates`.`id` = {$id} ");
	if ($query3) {
		return 1;
} else return 0; };
}




/*$activity = 25;

$query = mysql_query("SELECT * FROM dates where activity = {$activity} AND finish = '0'");
	$rows = mysql_affected_rows();
	if ($rows > 0) echo $rows;




/*$activity = 1;
$query = mysql_query("SELECT * FROM dates where activity = {$activity} AND finish = '0'");
$rows =  mysql_affected_rows();
echo $rows;




/*if (isset($_GET['id']) === true && isset($_GET['dt']) === true && isset($_GET['sh']) === true) {
				$emp = get_employee_by_name($_GET['id']);
				$employee = mysql_fetch_array($emp);
				set_shift($_GET['dt'], $employee['id'], $_GET['sh']);
				
				$url = "../show_dates.php?id=" . $GET['id'] . 
			};
								
/*$query = get_employee_month($employee['id'], 5);
while ($dates = mysql_fetch_array($query)) {
				$fixed = fix_date($dates['date']);
				echo "<tr><td>" . $fixed . "</td><td>";	
};




/*$employeeid = 16;
$month = 5;


$query = get_employee_month($employeeid, $month);

while ($row = mysql_fetch_array($query)) {
	
	$date = fix_date($row['date']);
	echo $date;
}






/*$id = 1;
$query = mysql_fetch_array(get_activity_by_id($id));
echo $query['activity'];
	


/*$date = "02/02/2017 10:00"; 

$dt = new DateTime($date);
$date1 = $dt->format('Y-m-d H:i');
$time = $dt->format('H');

echo $date . "<br />";
echo "datum: " . $date1. "<br />";
echo "vrijeme: " . $time . " sati";	
  
$day = "29";
$month = "01";
$year = "2017";
$time = "10";  
  
$date2t = $month . "/" . $day . "/" . $year . " " . $time. ":00";	
echo "<br />" . $date2t;
$dt1 = new DateTime($date2t);
$dt1 = $dt1->format('Y-m-d H:i');

  
  
//	s$setup = setup_date($_SESSION['id'], $_SESSION['employee'], $_SESSION['day'], $_SESSION['month'], 2017, $_SESSION['hour'], $_SESSION['activity'], $employeename);

/*function setup_date($customerid, $employeeid, $day, $month, $year, $time, $activityid, $employeename) {
	
	$date1 = $year . "-" . $month . "-" . $day . " "
	
	
	
	$query = mysql_query("INSERT INTO dates (employee, activity, user, start) VALUES ('$employeeid', '$activityid', '$customerid', '$date1')");
	
	$employeename = str_replace(' ', '', $employeename);
	
	$query2 = mysql_query("UPDATE {$employeename}{$employeeid} SET `{$time}` = 1 WHERE `date` = '{$date1}'");

	if ($query2) return 1;
	else return 0;
	
		
} */
?>


