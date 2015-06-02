<?php
		
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
		
					$name=$_POST['name']; 
					$location=$_POST['address']; 
					$contact=$_POST['phone']; 
					$lat=$_POST['lat'];
					$long=$_POST['long']; 
					$img=$_POST['images']; 
					$desc=$_POST['description']; 
					$id=$_POST['id'];
					
					
		
		mysqli_query($conn,"UPDATE resto set name ='{$name}'  WHERE id ='{$id}'");
		mysqli_query($conn,"UPDATE resto set location = '{$location}' WHERE id ='{$id}'");
		mysqli_query($conn,"UPDATE resto set contact = '{$contact}' WHERE id ='{$id}'");
		mysqli_query($conn,"UPDATE resto set latitude = '{$lat}' WHERE id ='{$id}'");
		mysqli_query($conn,"UPDATE resto set longtitude = '{$long}' WHERE id ='{$id}'");
		mysqli_query($conn,"UPDATE resto set image = '{$img}' WHERE id ='{$id}'");
		mysqli_query($conn,"UPDATE resto set description = '{$desc}' WHERE id ='{$id}'");
		
		
		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
			echo $sql;
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			
		}
		
		header("location:adminpage.php");

		mysqli_close($conn);
		
		
	?>  