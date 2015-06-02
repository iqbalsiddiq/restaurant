
<!DOCTYPE html>
<?php
session_start();
?>
<html>
  <head>
    <title>MyRestaurant</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8J-TzM_vlFM6jijUQ9DcaNvmsm9yx1U"></script>
		
    <link rel="shortcut icon" href="icon/icons.png" />
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
		<link href="css/lightbox.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet" />
	<script src = "cd.js"></script>
	
	
	<?php
		
        $now = time(); // Checking the time now when home page starts.?>
	<script type="text/javascript">
	var x = <?php echo json_encode($_SESSION['expired']-$now);?>;
	var wrong = false;
	</script>
	<?php
	if(isset($_SESSION['name'])){
				
				echo "<script>timess(x);</script>";
				
				}
			
		
		$servername = "localhost";
		$username = "root";
		$password = "123";
		$dba="test1";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password,$dba);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if(!isset($_POST['search1']))
			{
				header("Location:maptest.php");
			}
	$sql="SELECT * FROM resto WHERE name LIKE '".$_POST['search1']."%' OR location LIKE '".$_POST['search1']."%' OR contact LIKE '".$_POST['search1']."%'";
	$result = mysqli_query($conn, $sql);
		$aa=0;
		if (mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_assoc($result)){ 
			$names[$aa]=$row["name"];
			$add[$aa]=$row["location"];
			$contact[$aa]=$row["contact"];
			$latitude[$aa]=$row["latitude"];
			$longtitude[$aa]=$row["longtitude"];
			$image[$aa]=$row["image"];
			$desc[$aa]=$row["description"];
			$aa++;
		 }
		}
		
		?>
		<script type="text/javascript">
	var totalRow=<?php echo mysqli_num_rows($result)?>;
	var iMax = totalRow;
	var jMax = 4;
	var locations = new Array();
		for (i=0;i<iMax;i++) {
			locations[i]=new Array();
				for (j=0;j<jMax;j++) {
					 locations[i][j]=0;
					}
			}
	</script>
		
  </head>
  <body>
 	
		<div class="row">
			<div class="col-md-12">
				<img id="banner1" src="Banner/back.png" alt="Banner Image"/>
				<a href="maptest.php"> 
				<img id="banner" src="Banner/myrest.png" alt="Banner Image" />
				</a>
				<div class=" left rounded">
				<form name "form1" method="post" action="search1.php">
					<input name="search1"type="text" class="search left rounded" />
					<div class="tombol1">
					<input type="image" src="icon/search.png" alt="Submit" name="Submit"/></div>
					</form>
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
					<div class="rightc">
						<table class="ss">
							<tr>
								<td>
								<?php
									if (! empty($_SESSION['name']))
										{
											 echo "Dear ", $_SESSION["name"]," are at";
										}else{
											 echo "You are at" ;
										}?>
									
								</td>
								<td><p id="local"></p>
								</td>
							</tr>
						</table>
						</div>
					
				<div class="col-md-6 col-md-offset-1">
					<h1>Location</h1>
					<div id="map"></div>
				</div>
				
				<div class="col-md-4 col-md-offset-1">
				<?php
				if (! empty($_SESSION['admin']))
					{
						?>
						<a href="adminpage.php"> 
						<h1>Restaurant</h1></a> 
						<?php
					}else{
						?>
						<a href="loginadmin.php"> 
						<h1>Restaurant</h1></a> 
						<?php
					}?>
					
					<div class="row">
						<div class="col-md-4">
							<table class ="ww">
								<?php 
								if (mysqli_num_rows($result) > 0){
									 
									
									for($x=0;$x<mysqli_num_rows($result);$x++)
									{
										
										?>
									<script type="text/javascript">
										wrong=false;
										locations[<?php echo $x;?>][0]="<h4><?php echo $names[$x];?></h4>";
										locations[<?php echo $x;?>][1]=(<?php echo $latitude[$x];?>);
										locations[<?php echo $x;?>][2]=(<?php echo $longtitude[$x];?>);
										locations[<?php echo $x;?>][3]=('icon/red_Marker<?php echo $x?>.png');
										
										</script>
								<tr>
									<td id="poscon">
										<div id="Aicon">
											<img id="iconA" src="icon/blue_Marker<?php echo $x?>.png" class="rotate90" alt="a icon">
										</div>
									</td>	
									<td id ="nameRes" >
										<a  href="jack.jsp"><p id="resname"><?php echo $names[$x];?></p></a>
										<p id="addres"><?php echo $add[$x];?><br/><?php echo $contact[$x];?></p>	
										<img src="icon/moreinfo.png" alt="moreinfo" width="100" height="30" onclick="toggle1(this,<?php echo $x;?>);"/>
										<div id="<?php echo $x;?>" style="display:none;">
										<p id="desc"><?php echo $desc[$x];?></p>
										</div>										
									
										
									</td>
									<?php $img=explode('#',$image[$x],4);?>
									<td id= "picRes">
										<a href="Picture/<?php echo $img[0]?>" data-lightbox="resto1">
										<img src="Picture/<?php echo $img[0]?>" alt="jackpot" width="120" height="120"></a>
										<a href="Picture/<?php echo $img[1]?>" data-lightbox= "resto1" title="Jackpot1"></a>
										<a href="Picture/<?php echo $img[2]?>" data-lightbox= "resto1" title="Jackpot2"></a>
										<a href="Picture/<?php echo $img[3]?>" data-lightbox= "resto1" title="Jackpot3"></a>
						
									</td>
								</tr>
								<script type="text/javascript">
								function toggle1(el,x){
									var contentId = document.getElementById(x);
									if(el.className!="hide")
									{
										el.src="icon/hide.png"
										el.className="hide";
									}
									else if(el.className=="moreinfo")
									{
										el.src="icon/moreinfo.png"
										el.className="moreinfo";
									}
									else if(el.className!="moreinfo")
									{
										el.src="icon/moreinfo.png"
										el.className="moreinfo";
									}
									else if(el.className=="hide")
									{
										el.src="icon/hide.png"
										el.className="hide";
									}
									contentId.style.display == "none" ? contentId.style.display = "block" : 
								contentId.style.display = "none"; 
									return false;
								}  </script>
								<?php }
									} else {?>
										<script type="text/javascript">
										wrong=true;
										
										</script>
										<?php echo "0 results";
									}mysqli_close($conn);?>
				
							</table>
						</div>
				</div>
			
		</div>
		<script src = "prac1.js"></script> 
		</div>
		
	
  </body>
</html>