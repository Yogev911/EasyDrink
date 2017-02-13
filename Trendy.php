<?php
/**
 * Created by PhpStorm.
 * User: Yogev Heskia
 * Date: 13/02/2017
 * Time: 20:36
 */
	include('php/insert-and-view-no-refresh/db.php');

	//get data from DB to display
    $query1  = "SELECT * FROM tbl_219_testing";
    $result = mysqli_query($connection, $query1);
    if(!$result) {
        die("DB query failed.");
    }

	//if data was sent, save it and display in the list
//	if(isset($_POST['title']))
//    {
//        // escape variables for security
//        $ttle = mysqli_real_escape_string($connection, $_POST['title']);
//        $txt  = mysqli_real_escape_string($connection, $_POST['txt']);
//
//        //SET: insert new data to DB
//        $query2 = "insert into tbl_test(title,txt) values ('$ttle','$txt')";
//        $result = mysqli_query($connection, $query2);
//
//        //GET: get data again
//        $query2 = "SELECT * FROM tbl_test order by title desc";
//        $result = mysqli_query($connection, $query2);
//    }

	//GET: get data again
//   	echo "<ul>";
//   	while($row = mysqli_fetch_assoc($result)) {//results are in an associative array. keys are cols names
//        //output data from each row
//        echo "<li><h2>" . $row["title"] . "</h2><h3>" .$row["txt"] ."</h3></li>";
//    }
//	echo "</ul>";
//$row = mysqli_fetch_assoc($result);
echo "
<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>Trendy</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"stylesheet\" href=\"includes/styles/bootstrap.min.css\">
        <link href=\"includes/styles/font-awesome.min.css\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"includes/styles/style.css\">
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
        <script src=\"includes/scripts/bootstrap.min.js\"></script>
        <script src=\"includes/scripts/scripts.js\"></script>
        <!--Thumbnail grid-->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"includes/styles/thumbnail.css\" />
        <script src=\"includes/scripts/modernizr.custom.js\"></script>

    </head>
    <body>
        <nav class=\"navbar navbar-inverse navbar-fixed-top\">
            <button type=\"button\" class=\"navbar-toggle collapsed hamburger\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a href=\"index.html\" id=\"logo\">EasyDrink</a>
            <button class=\"navbar-toggle collapsed search-toggle\">
                <span class=\"glyphicon glyphicon-search \"></span>
            </button>
        </nav>
        <!-- END Nav -->
        <!-- Side Nav -->
        <div id=\"mySidenav\" class=\"sidenav\">
            <button class=\"btn closebtn\">&times;</button>
            <ul>
                <li><a href=\"#\"><i class=\"fa fa-history\"></i> Recent</a></li>
                <li><a href=\"MakeYourOwn.html\"><i class=\"fa fa-flask\"></i> Customize</a></li>
                <li><a href=\"#\"><i class=\"fa fa-user\"></i> For you</a></li>
                <li><a href=\"#\"><span class=\"glyphicon glyphicon-glass\" ></span> Our picks</a></li>
                <li><a href=\"#\"><span class=\"glyphicon glyphicon-sunglasses\" ></span> Trendy</a></li>
            </ul>
        </div>
        <!-- END Side Nav -->
        <header>
            <h1><i class=\"glyphicon glyphicon-sunglasses\" aria-hidden=\"true\"></i> Trendy</h1>
        </header>
        <main>
            <section class=\"headerSlogen\">
                <h2>Our Trendy Drinks</h2>
            </section>
            <ul id=\"og-grid\" class=\"og-grid\">";
            while($row = mysqli_fetch_assoc($result)){
                echo "
                <li>
                    <a href=\"#\" data-largesrc=\"" .$row["imgSrc"]. "\" data-title=\"\" data-description=\"\">
                        <img src=\"" .$row["tumbSrc"]. "\" alt=\"img02\"/>
                    </a>
                    <div class=\"thumbnail-content\">
                        <div>
                            <h3>" .$row["imgName"]. "</h3>
                            <p>" .$row["imgDisc"]. "</p>
                            <button class=\"btn btn-primary\">Buy</button>
                            <button class=\"btn btn-info\">Customize</button>
                        </div>
                    </div>
                </li>";
            }

        echo "
            </ul>
        </main>
        <footer>
            <section class=\"contact\">
                <a href=\"#\" class=\"fbLink\"></a>
                <a href=\"#\" class=\"youtubeLink\"></a>
            </section>
            <section class=\"rights\">
                <p>© Copyright 2017 Yogev&Ori LTD. All right reserved.</p>
            </section>
        </footer>
        <script src=\"includes/scripts/grid.js\"></script>
    </body>
</html>";

	//release returned data
	mysqli_free_result($result);

	//close DB connection
	mysqli_close($connection);
?>