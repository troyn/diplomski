<?php
include "/connection.php";
include "/functions.php";
session_start();


			
			# $mysqltime = date ("Y-m-d H:i:s");
			$fusername = $_POST['username'];
			$fpassword = $_POST['password'];
			#echo $fusername;
			#echo $fpassword;
			$pwdhash = md5($fpassword);
			#echo $pwdhash;
			mysql_query("SELECT * FROM users
						WHERE email='" . $fusername
						. "' AND password='" . $pwdhash . "';");
			$rows = mysql_affected_rows();
			#echo "<p>Rows: " . $rows . "</p>";
			#echo $rows;
			if($rows != 1)
			{
				echo "<p>Login failed!</p>";
				mysql_query("SELECT * FROM users WHERE
					email='" . $fusername . "';");
				$rows2 = mysql_affected_rows();
				if($rows2 == 0)
					echo "<p>Invalid username</p>";
				else
				{
					mysql_query("SELECT * FROM users WHERE
					password='" . $pwdhash . "';");
					$rows3 = mysql_affected_rows();
					if($rows3 == 0)
						echo "<p>Invalid password</p>";
				}
			}
			else
			{
				$query = mysql_query("SELECT id FROM users WHERE email = '{$fusername}' AND password = '{$pwdhash}'");
				$res = mysql_fetch_array($query);
				$auth = get_user_authority_by_id($res['id']);
				
				$_SESSION['authority'] = $auth;
				$_SESSION['id'] = $res['id'];
				if ($auth == 0) {
					redirect_to("../users.php");	
				} else redirect_to("../staff.php");
				// echo "<p>Login successful!</p>";
				//mysql_query("UPDATE user_table SET last_login = NOW() WHERE username='" . $fusername . "';");
			}  
			?>

