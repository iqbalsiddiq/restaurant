<?php
session_start();
session_destroy();
header("location:maptest.php");
?>