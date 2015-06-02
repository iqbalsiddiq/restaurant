<!DOCTYPE html>
<?php
session_start();

?>

<html>
  <head>
     <title> Nandos's </title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8J-TzM_vlFM6jijUQ9DcaNvmsm9yx1U"></script>
 
	<link href="style.css" rel="stylesheet" />
	<script src = "cd.js"></script>
	
	
	
	<?php
		
        $now = time(); // Checking the time now when home page starts.?>
	<script type="text/javascript">
	var x = <?php echo json_encode($_SESSION['expired']-$now);?>;</script>
	<?php
	if(isset($_SESSION['name'])){
				
				echo "<script>timess(x);</script>";
				
				}
			
		
		
?>
	
  </head>
  <body>
			<div class="row">
			<div class="rightc">
						<table class="ss">
							<tr>
								<td>
								<?php
									if (! empty($_SESSION['name']))
										{
											 echo "You are logged in as ", $_SESSION["name"] ;
										}else{
											 echo "You are not logged in" ;
										}?>
									
								</td>
							</tr>
						</table>
						</div>
			<div class="col-md-12">
				<img id="banner1" src="Banner/back.png" alt="Banner Image"/>
				<a href="maptest.php"> 
				<img id="banner" src="Banner/myrest.png" alt="Banner Image" />
				</a>
				<div class=" left rounded">
					<input type="text" class="search left rounded" value=" " />
			</div> 
			<div class="tombol">
			<?php
				if (! empty($_SESSION['name']))
					{
						?>
						<a href="logout.php"> 
						<img src="icon/logout.png" alt="login" width="100" height="40"></a> 
						<?php
					}else{
						?>
						<a href="login.php"> 
						<img src="icon/loginmer.png" alt="login" width="100" height="40"></a> 
						<?php
					}?>
			</div>
				</div>
			</div>
		<div class="row">
			
				<div class="col-md-6 col-md-offset-3">
					<table class="nanddos">
		
						<tr>
						<td><h1>Nando's</h1></td>
						</tr>
						<tr>
			
							<td>
								<div class="img"><img src="nandos/sch.PNG" alt="nandos" width="252" height="461"></div>
							</td>
							<td>
								<div class="img2"><img src="nandos/placeholder.png" alt="nandos" width="300" height="208"></div>
							</td>
							<td>
								<div class="img3"><img src="nandos/adsd.png" alt="nandos" width="300" height="420" class="rotate2"></div>
							</td>
						</tr>
                
					</table>
				</div>
				
		</div>
				 <script src = "prac1.js"></script>
  </body>
</html>