<?php
	//create a mySQL DB connection:
	$dbhost = "182.50.133.146";
	$dbuser = "auxstudDB6c";
	$dbpass = "auxstud6cDB1!";
	$dbname = "auxstudDB6c";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);//mysqli_connect is a newer version of mysql_connect. Its for mysql > ver 4.1.3
	
	//testing connection success
    if(mysqli_connect_errno()) {
    	die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
?>