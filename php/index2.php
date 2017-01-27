<?php 
    //create a mySQL DB connection:
	$dbhost = "182.50.133.146";
	$dbuser = "auxstudDB6c";
	$dbpass = "auxstud6cDB1!";
	$dbname = "auxstudDB6c";


	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }
?>
<?php 
    //get data from DB
    $query = "SELECT * FROM tbl_test";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }
?>
<!DOCTYPE html>
<html>
	<head>
	        <meta charset="utf-8"> 
	    	<title>some page 2</title>
	     	<link href="includes/style.css" rel="stylesheet">
	</head>
	<body>
	    <div id="wrapper">
	        <?php 
	           //use return data (if any)
	           while($row = mysqli_fetch_row($result)) {//returns standard array of results. keys are ints
	               //output data from each row
	               echo "<section><h2>";
	               var_dump($row);
                   echo "</h2></section>";
	           }
	        echo "<section>
			  	<h2>more html can go here</h2>
			</section>";
			?>
			<?php 
			//release returned data
			mysqli_free_result($result);
            ?>
	    </div>
	</body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>