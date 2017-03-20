<?php

function add_activity($name, $price) {
	$query = mysql_query("INSERT INTO activities (id, activity, price) VALUES (NULL, '$name', '$price')");
						
	if ($query) {
		return 1;		
	}  else return 0;
	
	};

function get_activities() {
	$query = mysql_query("SELECT * FROM `activities`
						 ORDER BY ID ASC");
	if ($query) {
		return $query; 
		} else echo "Zahtjev za dobivanje aktivnosti nije napravljen.";
	}
	
function delete_activity($activity) {
	$query = mysql_query("SELECT * FROM dates where activity = {$activity} AND finish = '0'");
	$rows = mysql_affected_rows();
	if ($rows > 0) return 2;
	
	$query2 = mysql_query("DELETE FROM `activities` WHERE `activities`.`id` = {$activity} ");
	if ($query2) {
		return 1;
	} else return 0;

}

function add_employee($name, $act1 = NULL, $act2 = NULL, $act3 = NULL) {
	$query = mysql_query("INSERT INTO employees (name, activity1, activity2, activity3) VALUES ('$name', '$act1', '$act2', '$act3')");
	
	
	$query2 = mysql_query("SELECT * FROM employees WHERE `name` = '{$name}'");
	$row = mysql_fetch_array($query2);
	$id = $row['id'];
	
	$name = str_replace(' ', '', $name);
	mysql_query("CREATE TABLE `{$name}{$id}` ( `date` DATE NOT NULL , `n` TINYINT(1) NOT NULL, `shift` TINYINT(1) NOT NULL, 
			`8` TINYINT(1) NOT NULL , `9` TINYINT(1) NOT NULL , `10` TINYINT(1) NOT NULL ,
			`11` TINYINT(1) NOT NULL , `12` TINYINT(1) NOT NULL , `13` TINYINT(1) NOT NULL ,
			`14` TINYINT(1) NOT NULL , `15` TINYINT(1) NOT NULL , `16` TINYINT(1) NOT NULL , 
			`17` TINYINT(1) NOT NULL ,`18` TINYINT(1) NOT NULL , `19` TINYINT(1) NOT NULL , `20` TINYINT(1) NOT NULL ) 
			ENGINE = InnoDB");

	mysql_query("INSERT INTO {$name}{$id} (date)
			SELECT DATE('2017-01-01') + INTERVAL a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i DAY
			FROM ints a JOIN ints b JOIN ints c JOIN ints d JOIN ints e
			WHERE (a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i) <= 364
			ORDER BY 1");

	mysql_query("UPDATE {$name}{$id} 
			SET `8`='2', `9`='2', `10`='2', `11`='2', 
			`12`='2', `13`='2', `14`='2', `15`='2', 
			`16`='2', `17`='2',	`18`='2', `19`='2', 
			`20`='2'");

	mysql_query("UPDATE {$name}{$id} SET `n`= '1' 
			WHERE `date`= '2017-01-01' OR `date`='2017-01-06' 
			OR `date`='2017-04-16' OR `date`='2017-04-17' 
			OR `date`='2017-05-01' OR `date`='2017-06-15' 
			OR `date`='2017-06-22' OR `date`='2017-06-25' 
			OR `date`='2017-08-05' OR `date`='2017-08-15' 
			OR `date`='2017-10-08' OR `date`='2017-11-01'
			OR `date`='2017-12-25' OR `date`='2017-12-26'");
			
	mysql_query("UPDATE {$name}{$id} SET `n` = 1 WHERE dayofweek(date) = 1");
			
	if ($query) {
		return 1;
	} else return 0;
}

function get_employees(){
	$query = mysql_query("SELECT * FROM employees ORDER BY ID ASC");
	if ($query) {
		return $query; 
		} else echo "Zahtjev za dobivanje zaposlenika nije napravljen.";
	}
	
function delete_employee($id) {
	$query = get_employee_by_id($id);
	$employee = mysql_fetch_array($query);
	$name = str_replace(' ', '', $employee['name']);
	
	$query2 = mysql_query("SELECT * FROM `dates` WHERE `employee` = {$id} AND finish = '0'");
	if (mysql_affected_rows() == 0) {
		$query3 = mysql_query("DELETE FROM employees WHERE `employees`.`id` = {$id}");
		$query4 = mysql_query("DROP TABLE {$name}{$id}");
		return 1;
	} else return 0;

}

function get_employee_by_id($id) {
	$query = mysql_query("SELECT * FROM employees WHERE `employees`.`id` = {$id}");
	if ($query) {
		return $query;
	} else return 0;
	
}

function get_activities_by_employeeid($employee) {
	$query = mysql_query ("SELECT * FROM employees WHERE `employees`.`id` = {$employee}");
	$row = mysql_fetch_array($query);
	
	$query2 = mysql_query("SELECT * FROM activities WHERE `id` = {$row['activity1']} OR `id` = {$row['activity2']} OR `id` = {$row['activity3']}");
	if ($query2) {
	return $query2;
	}	else return 0;
}

function change_employee_activity($employee, $act1 = NULL, $act2 = NULL, $act3 = NULL) {
	$query = mysql_query ("UPDATE employees SET `activity1` = {$act1}, `activity2` = {$act2}, `activity3` = {$act3} WHERE `employees`.`id` = {$employee}");
	if ($query) {
		return 1;
	} else return 0;
}

function get_dates_by_employee_id_month($id, $month) {
	$query = mysql_query("SELECT * FROM employees WHERE `employees`.`id` = {$id}");
	$row = mysql_fetch_array($query);
	$name = str_replace(' ', '', $row['name']);
	
	$query2 = mysql_query("SELECT * FROM {$name}{$id} WHERE month(date) = {$month}");
	return $query2;
	
}

/* function setup_date($customerid, $employeeid, $date, $activityid, $employeename) {
	
	$dt = new DateTime($date);
	$date1 = $dt->format('Y-m-d');
	$time = $dt->format('H');
	
	$query = mysql_query("INSERT INTO dates (employee, activity, user, start) VALUES ('$employeeid', '$activityid', '$customerid', '$date')");
	
	$employeename = str_replace(' ', '', $employeename);
	
	$query2 = mysql_query("UPDATE {$employeename}{$employeeid} SET `{$time}` = 1 WHERE `date` = '{$date1}'");
		
} */

function redirect_to($location) {
	 header('Location:'. $location);
	 exit;
}

function get_user_authority_by_id($id) {
	$query = mysql_query ("SELECT authority FROM users WHERE id = {$id}");
	$return = mysql_fetch_array($query);
	return $return['authority'];
	
}

function get_month($month) {

	switch ($month) {
		case "Siječanj":
			return 1;
			break;
		case "Veljača":
			return 2;
			break;
		case "Ožujak":
			return 3;
			break;
		case "Travanj":
			return 4;
			break;
		case "Svibanj":
			return 5;
			break;
		case "Lipanj":
			return 6;
			break;
		case "Srpanj":
			return 7;
			break;
		case "Kolovoz":
			return 8;
			break;
		case "Rujan":
			return 9;
			break;
		case "Listopad":
			return 10;
			break;
		case "Studeni":
			return 11;
			break;
		case "Prosinac":
			return 12;
			break;
		}
}

function get_employee_by_name($name) {
	
	$query = mysql_query("SELECT * FROM employees WHERE name = '{$name}'");
	
	return $query;
	
}

function get_employees_of_activity($activityid) {
	$query = mysql_query("SELECT * FROM employees WHERE activity1 = {$activityid} or activity2 = {$activityid} OR activity3 = {$activityid}");
	return $query;
	
}

/*function get_free_hours_of_date($employeeid, $month, $day) {
	$query = get_employee_by_id($employeeid);
	$row = mysql_fetch_array($query);
	$name = $row['name'];
	$name = str_replace(' ', '', $name);
	
	$query2 = mysql_query("SELECT * FROM {$name}{$employeeid} WHERE month(date) = {$month} AND day(date) = {$day} AND (`8` = '0' OR `9` = '0' OR `10` = '0' 
							OR `11` = '0' OR `12` = '0' OR `13` = '0' OR `14` = '0' OR `15` = '0' OR `16` = '0' OR `17` = '0' OR `18` = '0' OR `19` = '0' OR `20` = '0')");
	$row2 = mysql_fetch_array($query2);
	echo $row2['date'];
} */

function get_hours_of_employee_date($employeeid, $month, $day) {
	$query = get_employee_by_id($employeeid);
	$row = mysql_fetch_array($query);
	$name = $row['name'];
	$name = str_replace(' ', '', $name);
	
	$query2 = mysql_query("SELECT * FROM {$name}{$employeeid} WHERE month(date) = {$month} AND day(date) = {$day}");
	return $query2;
}

function setup_date($customerid, $employeeid, $day, $month, $year, $time, $activityid, $employeename) {
	
	$date1 = $year . "-" . $month . "-" . $day;
	$date2t = $month . "/" . $day . "/" . $year . " " . $time. ":00";	
    $dt1 = new DateTime($date2t);
    $dt1 = $dt1->format('Y-m-d H:i');
	
	$query = mysql_query("INSERT INTO dates (employee, activity, user, start) VALUES ('$employeeid', '$activityid', '$customerid', '$dt1')");
	
	$employeename = str_replace(' ', '', $employeename);
	
	$query2 = mysql_query("UPDATE {$employeename}{$employeeid} SET `{$time}` = 1 WHERE `date` = '{$date1}'");

	if ($query2) return 1;
	else return 0;
	
		
}

function get_dates_by_user($user) {
	$query = mysql_query("SELECT * FROM `dates` WHERE `user` = {$user} AND `finish` = '0' ORDER BY `start` ASC");
	return $query;
}

function get_activity_by_id($id) {
	$query = mysql_query("SELECT * FROM activities WHERE `id` = {$id}");
	if ($query) {
		return $query;
	} else return 0;
}

function delete_date($id) {
	$query = mysql_query("SELECT * FROM `dates` WHERE `dates`.`id` = {$id}");
	$info = mysql_fetch_array($query);
	$employee = get_employee_by_id($info['employee']);
	$employeeinfo = mysql_fetch_array($employee);
	
	$employeename = str_replace(' ', '', $employeeinfo['name']);
	$dt1 = new DateTime($info['start']);
    $h = $dt1->format('H');
	$dt = $dt1->format('Y-m-d');
	
	$query2 = mysql_query("UPDATE {$employeename}{$employeeinfo['id']} SET `{$h}` = 0 WHERE `date` = '{$dt}'");
	
	if ($query2) {
	
	$query3 = mysql_query("DELETE FROM `dates` WHERE `dates`.`id` = {$id} ");
	if ($query3) {
		return 1;
} else return 0; };
}

function get_employee_month($employeeid, $month) {
	
	$employee = get_employee_by_id($employeeid);
	$employee = mysql_fetch_array($employee);
	
	$employeename = str_replace(' ', '', $employee['name']);
	
	$query = mysql_query("SELECT * FROM {$employeename}{$employeeid} WHERE month(date) = {$month} ORDER BY `date` ASC");
	
	return $query;
	
}

function fix_date($date) {
	$dt = new DateTime($date);
	$dt = $dt->format('d-m-Y');
	return $dt;
}

function set_shift($date, $employeeid, $shift) {
	
	$employee = get_employee_by_id($employeeid);
	$row = mysql_fetch_array($employee);
	$employeename = str_replace(' ', '', $row['name']);
	
	$query = mysql_query("UPDATE {$employeename}{$employeeid} SET `shift` = {$shift} WHERE `date` = '{$date}'");
	
	if ($shift == 1) {
		$query2 = mysql_query("UPDATE {$employeename}{$employeeid} SET `8` = '0', `9` = '0', `10` = '0', `11` = '0', `12` = '0', `13` = '0', `14` = '0' WHERE `date` = '{$date}'"); 
	} elseif ($shift == 2) {
		$query3 = mysql_query("UPDATE {$employeename}{$employeeid} SET `14` = '0', `15` = '0', `16` = '0', `17` = '0', `18` = '0', `19` = '0', `20` = '0' WHERE `date` = '{$date}'"); 
		}
	elseif ($shift == 0) {
		$query4 = mysql_query("UPDATE {$employeename}{$employeeid} SET `8` = '2', `9` = '2', `10` = '2', `11` = '2', `12` = '2', `13` = '2', 
							   `14` = '2', `15` = '2', `16` = '2', `17` = '2', `18` = '2', `19` = '2', `20` = '2' WHERE `date` = '{$date}'"); 
		}
	}

function get_dates_of_activity($id) {
	$query = mysql_query("SELECT * FROM `dates` WHERE `activity` = {$id}");
	return $query;
}

function get_employee_dates($id) {
	$query = mysql_query("SELECT * FROM `dates` WHERE `employee` = {$id} ORDER BY `start` ASC");
	return $query;
	
}

function get_dates_of_activity_by_employee($activityid, $employeeid) {
	$query = mysql_query("SELECT * FROM `dates` WHERE `employee` = {$employeeid} AND `activity` = {$activityid}");
	return $query;
}

function change_activity_price($activity, $price) {
	
	$query = mysql_query("UPDATE `activities` SET `price` = {$price} WHERE `id` = {$activity}");
	
	if ($query) return 1;
	else return 0;
	
}

function date_done($id) {
	$query = mysql_query("UPDATE `dates` SET `finish` = '1' WHERE `id` = {$id}");
}

function get_user_by_id($id) {
	$query = mysql_query("SELECT * FROM `users` WHERE `id` = {$id}");
	return $query;
}

	
?>