<!DOCTYPE html>
<?php
session_start();

?>
<html>
  <head>
    <title> Login </title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link href="style.css" rel="stylesheet" />
  </head>
  <body>
		<div class="row">
			<div class="col-md-12">
				<img id="banner1" src="Banner/back.png" alt="Banner Image"/>
				<a href="maptest.php"> 
				<img id="banner" src="Banner/myrest.png" alt="Banner Image" />
				</a>
				<div class=" left rounded">
					<input type="text" class="search left rounded" value=" " />
				</div>
			</div>
		</div>
		
		<div class="rowlogin">
				<form action="verify.php" method="post">
				<div class="col-md-3 col-md-offset-5">
					<h2>Not a member? Join Now</h2>
					
					<input type="text" name="name"  class="username" ><br/>
					<input type="password" name="pass"  class="password"><br/>
					<span class="error"> <?php echo $_SESSION['error1']; session_destroy();?></span><br>
					<p>Forget my password</p>
					<p>Stay Logged in for : 
					<select name="duration">
						<option value="10">10 Sec</option>
						<option value="86400" selected >1 Day</option>
						
					</select></p>
					<div id="button">
						<input type="image" src="icon/button.png" alt="Submit" width="100" height="40">
						<a href="login.html"> 
						<img src="icon/clear.png" alt="clear" width="100" height="40"></a> 
					</div>
					</form>
				</div>
		</div>
		



  </body>
</html>