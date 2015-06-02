<?php

	class MySQLDatabase{
	var $link;
		function connect($user, $password, $database){
			$this->link = mysqli_connect('localhost', $user, $password);
			if(!$this->link){
				die('Not connected : ' . mysqli_error());
			}
			$db = mysqli_select_db($database, $this->link);
			 if(!$db){
			 die ('Cannot use : ' . mysqli_error());
			 }
			 return $this->link;

		}
		function disconnect(){
			mysqli_close($this->link);

		}
	}
?>