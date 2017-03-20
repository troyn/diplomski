<?php
include "/connection.php";
include "/functions.php";


			
			# $mysqltime = date ("Y-m-d H:i:s");
			$femail = $_POST['email'];
			$fpassword = $_POST['password'];
			$fphone = $_POST['phone'];
			$pwdhash = md5($fpassword);
			$fname = $_POST['name'];
			
					
			$query = mysql_query("INSERT INTO users (email, phone, password, authority, name)
						VALUES ('$femail', '$fphone', '$pwdhash', 0, '$fname')");
						

			if($query) {
				redirect_to("../index.php");
			}
?>

