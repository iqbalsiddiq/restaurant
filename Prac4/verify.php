<?php
		
			
			session_start();
			
			$error1=false;
			// define variables and set to empty values
			$nameErr = $passErr = "";
			$name = $pass =  "";

	
					$_SESSION['start'] = time();
					$mytime=$_POST['duration']; 
					$myusername=$_POST['name']; 
					$mypassword=$_POST['pass']; 
					$myError=$_POST['error1'];
					if($myusername=="infs" && $mypassword=="3202"){

					// Register $myusername, $mypassword and redirect to file "login_success.php"
					$_SESSION['expired'] = $_SESSION['start'] + $mytime;
					$_SESSION['name'] = $myusername;
					$_SESSION['pass'] = $mypassword;
					
					
					header("location:loginadmin.php");
					}
					else if($myusername=="admin" && $mypassword=="pass"){

					// Register $myusername, $mypassword and redirect to file "login_success.php"
					$_SESSION['expired'] = $_SESSION['start'] + $mytime;
					$_SESSION['name'] = $myusername;
					$_SESSION['admin'] = $mypassword;
					
					
					header("location:maptest.php");
					}
					else {
					header("location:login.php");
					$_SESSION['error1'] = "*Username or Password is incorrect ";
					
					}
					
				
			
		?>