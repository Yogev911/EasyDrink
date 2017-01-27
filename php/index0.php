<!DOCTYPE html>
<html>
	<head>
	        <meta charset="utf-8"> 
	    	<title>some page 0</title>
	     	<link href="includes/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	    <div id="wrapper">
	        <?php echo "<aside>
			  	<h2>title goes here</h2>
	        	<p>description goes here</p>
			</aside>"; ?>
            
            <?php echo 2+3; ?><br>
            not good: no echo: <?php  2+3; ?>
	    </div>
	</body>
</html>