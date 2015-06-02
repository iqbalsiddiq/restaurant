
<!DOCTYPE html>
<?php
session_start();
?>
<html>
  <head>
    <title>MyRestaurant</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8J-TzM_vlFM6jijUQ9DcaNvmsm9yx1U"></script>
		
    
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
		<link href="css/lightbox.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet" />
	<link href="kk.css" rel="stylesheet" />
	<script src = "cd.js"></script>
	<script src = "toggle.js"></script>
	<script src = "popup.js"></script>
	<?php
		
        $now = time(); // Checking the time now when home page starts.?>
	<script type="text/javascript">
	var x = <?php echo json_encode($_SESSION['expired']-$now);?>;</script>
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
		
		
		$sql = "SELECT name,location,contact,latitude,longtitude,image,description,id FROM resto";
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
			$ids[$aa]=$row["id"];
			$aa++;
		 }
		} else {
			echo "0 results";
		}

		mysqli_close($conn);
	?>  
	<script type="text/javascript">		
			function check_empty() {
				if (document.getElementById('name').value == "" || document.getElementById('name').value.length < 4) {
				alert("Fill Name Fields and at Least 4 Character !");
				return false;
				} else {
				document.getElementById('form').submit();
				alert("Form Submitted Successfully...");
				}
				}
				//Function To Display Popup
				function div_show(x) {
				document.getElementById(x).style.display = "block";
				}
				//Function to Hide Popup
				function div_hide(x){
				document.getElementById(x).style.display = "none";}
				
				function div_show1() {
				document.getElementById('nrestoo').style.display = "block";
				}
				//Function to Hide Popup
				function div_hide1(){
				document.getElementById('nrestoo').style.display = "none";
		}
				function remove1(x){
					var r=confirm('Are you sure?');
					if (r == true) {
						$(x).submit();
					} else{
						
					}
					
				}
				
</script>
  </head>
  <body>
  <?php
				if ( empty($_SESSION['admin']))
					{
						header("location:loginadmin.php");
					}?>
 	
		<div class="row">
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
			<?php 
					for($x=0;$x<mysqli_num_rows($result);$x++)
						{?>
			<div id="restoo<?php echo $x; ?>">
				
				<div id="popupContact">
				
				
				<form action="edit.php" id="form" method="post" name="form" >
				<img id="close" src="icon/close.png" onclick ="div_hide('restoo<?php echo $x; ?>')">
				<h2>Edit Details</h2>
				<hr>
				<p>Name:</p><input  name="name" type="text" class="forms" value="<?php echo $names[$x];?>" required pattern=".{4,}"required title="4 characters minimum">
				<p>Address:</p><input name="address"  type="text" class="forms" value="<?php echo $add[$x];?>" required pattern=".{4,}"required title="4 characters minimum">
				<p>Phone:</p><input name="phone"  type="text" class="forms" value="<?php echo $contact[$x];?>" required pattern=".{4,}"required title="4 characters minimum">
				<p>Latitude:</p><input name="lat"  type="text" class="forms" value="<?php echo $latitude[$x];?>" required pattern=".{4,}"required title="4 characters minimum">
				<p>Lontitude:</p><input name="long"  type="text" class="forms" value="<?php echo $longtitude[$x];?>" required pattern=".{4,}"required title="4 characters minimum">
				<p>Images:</p><input name="images"  type="text" class="forms" value="<?php echo$image[$x]?>" required pattern=".{4,}"required title="4 characters minimum">
				<p>Description:</p><textarea name="description" required pattern=".{4,}"required title="4 characters minimum" ><?php echo $desc[$x];?></textarea>
				<input type="hidden" name="id" value="<?php echo $ids[$x];?>">
				<input type="image" src="icon/subb.png" alt="Submit" width="100" height="40"value="Submit" >
				<input type='image'src="icon/clear.png" value='Reset' name='reset' onclick="return resetForm(this.form);"width="100" height="40" id="clear">
				</form>
				</div>
				
			</div>
			<?php } ?>
			<div id="nrestoo">
				
				<div id="popupContact">
				
				
				<form action="new.php" id="form" method="post" name="form" >
				<img id="close" src="icon/close.png" onclick ="div_hide1()">
				<h2>Edit Details</h2>
				<hr>
				<p>Name:</p><input  name="name" type="text" class="forms" pattern=".{4,}" required title="4 characters minimum">
				<p>Address:</p><input name="address"  type="text" class="forms" pattern=".{4,}" required title="4 characters minimum">
				<p>Phone:</p><input name="phone"  type="text" class="forms"  pattern=".{4,}" required title="4 characters minimum">
				<p>Latitude:</p><input name="lat"  type="text" class="forms"  pattern=".{4,}" required title="4 characters minimum">
				<p>Lontitude:</p><input name="long"  type="text" class="forms" pattern=".{4,}" required title="4 characters minimum">
				<p>Images:</p><input name="images"  type="text" class="forms" pattern=".{4,}" required title="4 characters minimum">
				<p>Description:</p><textarea name="description" pattern=".{4,}" required title="4 characters minimum"> </textarea>
				<input type="hidden" name="id" value="">
				<input type="image" src="icon/subb.png" alt="Submit" width="100" height="40"value="Submit" >
				<input type='image'src="icon/clear.png" value='Reset' name='reset' onclick="return resetForm(this.form);"width="100" height="40" id="clear">
				</form>
				</div>
				<form id="remove1" style="display:none" action="remove.php" method="post">
				<input type="hidden" name="wid" value="4" />
				</form>
			</div>
			
			<div class="row">
			
				<div class="col-md-7 col-md-offset-4">
					<table class="minad">
					
			<?php 
					for($x=0;$x<mysqli_num_rows($result);$x++)
						{?>
							<tr bgcolor="#FF6666">
								<td>
								<p id="resname"><?php echo $names[$x];?></p>
								</td>
								<td id="popup">
								<a  href="#" onclick="div_show('restoo<?php echo $x ?>');"><p id="resname">Edit</p></a>
								</td>
								<td id="popupi">
								<a  href="#" onclick="remove1(remove4<?php echo $ids[$x];?>)"><p id="resname">Remove</p></a>
								<form id="remove4<?php echo $ids[$x];?>" style="display:none" action="remove.php" method="post">
								<input type="hidden" name="zid" value="<?php echo $ids[$x];?>" />
								</form>
								</td>
							</tr>
							<?php } ?>
									
						</table>
						<input type="image" src="icon/add.png" onclick="div_show1();" >
				</div>
				
		</div>
		
	
  </body>
</html>