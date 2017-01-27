<?php
	include('db.php');
		
	//get data from DB to display
    $query1  = "SELECT * FROM tbl_test order by title desc";
    $result = mysqli_query($connection, $query1);
    if(!$result) { 
        die("DB query failed.");
    }
	
	//if data was sent, save it and display in the list
	if(isset($_POST['title']))
	{
		// escape variables for security
		$ttle = mysqli_real_escape_string($connection, $_POST['title']);
		$txt  = mysqli_real_escape_string($connection, $_POST['txt']);
		
		//SET: insert new data to DB
		$query2 = "insert into tbl_test(title,txt) values ('$ttle','$txt')";
		$result = mysqli_query($connection, $query2);
		
		//GET: get data again
		$query2 = "SELECT * FROM tbl_test order by title desc";
    	    $result = mysqli_query($connection, $query2);
	}
	
	//GET: get data again
   	echo "<ul>";
   	while($row = mysqli_fetch_assoc($result)) {//results are in an associative array. keys are cols names
       //output data from each row
       echo "<li><h2>" . $row["title"] . "</h2><h3>" .$row["txt"] ."</h3></li>";
   	}
	echo "</ul>";

	//release returned data
	mysqli_free_result($result);
	
	//close DB connection
	mysqli_close($connection);
?>