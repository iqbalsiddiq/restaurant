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
		
					
					$id=$_POST['zid'];
					
					
		
		$sql=("DELETE FROM resto WHERE id ='$id'");
		
		
		
		if (mysqli_query($conn, $sql)) {
			echo $sql;
		} else {
			
			echo $id;
		}
		
		header("location:adminpage.php");

		mysqli_close($conn);
		
		
	?>  