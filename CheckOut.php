<?php
/**
 * Created by IntelliJ IDEA.
 * User: Yogev Heskia
 * Date: 15/02/2017
 * Time: 13:10
 */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Check Out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/styles/bootstrap.min.css">
    <link href="includes/styles/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="includes/styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="includes/scripts/bootstrap.min.js"></script>
    <script src="includes/scripts/scripts.js"></script>
    <!--Thumbnail grid-->
    <link rel="stylesheet" type="text/css" href="includes/styles/thumbnail.css"/>
    <script src="includes/scripts/modernizr.custom.js"></script>

</head>
<body>
<!-- Nav -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <button type="button" class="navbar-toggle collapsed hamburger" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="index.php" id="logo">EasyDrink</a>
    <button class="navbar-toggle collapsed search-toggle">
        <span class="glyphicon glyphicon-search "></span>
    </button>
</nav>
<!-- END Nav -->
<!-- Side Nav -->
<div id="mySidenav" class="sidenav">
    <button class="btn closebtn">&times;</button>
    <section class="sideNavUser">
        <?php
        include "DataBaseUtil.php";
        connect();
        if (!empty($_GET["id"])) {
            $val = addToRecent($_GET["id"]);
            echo $val;
        }
        $userConnected = getUserObj(305166860);
        echo '<h3><img class="userImg" src="'.$userConnected->pic.'">  '.$userConnected->name.'</h3>';
        ?>
        <a class="btn logInOutBtn"><span class="glyphicon glyphicon-log-out"></span></a>
    </section>
    <ul>
        <li><a href="favorites.php"><span class="glyphicon glyphicon-star"></span> Favorites</a></li>
        <li><a href="recent.php"><i class="fa fa-history"></i> Recent</a></li>
        <li><a href="MakeYourOwn.php"><i class="fa fa-flask"></i> Customize</a></li>
        <li><a href="foryou.php"><i class="fa fa-user"></i> For you</a></li>
        <li><a href="ourpicks.php"><span class="glyphicon glyphicon-glass" ></span> Our picks</a></li>
        <li><a href="Trendy.php"><span class="glyphicon glyphicon-sunglasses" ></span> Trendy</a></li>
    </ul>
</div>
<!-- END Nav -->
<header>
    <h1><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>Check Out</h1>
</header>
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><span class="glyphicon glyphicon-star"></span> </strong> Cocktail saved !
</div>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><span class="glyphicon glyphicon-warning-sign"></span> </strong> Cocktail already on favorites
</div>
<main class="wrapper">
    <?php
    if (empty($_GET["id"])) {
        $cocktail = getCocktailPrices($_GET["alcoholOne"],$_GET["alcoholTwo"],$_GET["juiceOne"],$_GET["juiceTwo"]);
        $cocktail->alcohol1_amount = $_GET["alcoholOneAmount"];
        $cocktail->alcohol2_amount = $_GET["alcoholTwoAmount"];
        $cocktail->juice1_amount = $_GET["juiceOneAmount"];
        $cocktail->juice2_amount = $_GET["juiceTwoAmount"];
        $cocktail->price = ($cocktail->alcohol1->price * $cocktail->alcohol1_amount/10) + ($cocktail->alcohol2->price * $cocktail->alcohol2_amount/10) + ($cocktail->juice1->price * $cocktail->juice1_amount/10) + ($cocktail->juice2->price * $cocktail->juice2_amount/10);
//        $cocktail->price = 55;
    }else{
        $cocktail = getCocktailsByCocktailId($_GET["id"]);
    }
    echo '
  <div class="panel panel-default">
  <!-- Default panel contents -->
      <div class="panel-heading"><u><b>Summery</b></u></div>
      <table class="table table-hover">
        <tr class="info">
           <td>'.$cocktail->alcohol1->name.'</td>
           <td>'.$cocktail->alcohol1_amount.'ml</td>
           <td>'.$cocktail->alcohol1->price * $cocktail->alcohol1_amount/10 .'$ </td>
        </tr>
        <tr class="info">
           <td>'.$cocktail->alcohol2->name.'</td>
           <td>'.$cocktail->alcohol2_amount.'ml</td>
           <td>'.$cocktail->alcohol2->price * $cocktail->alcohol2_amount/10 .'$</td>
        </tr>
        <tr class="info">
           <td>'.$cocktail->juice1->name.'</td>
           <td>'.$cocktail->juice1_amount.'ml</td>
           <td>'.$cocktail->juice1->price * $cocktail->juice1_amount/10 .'$</td>
        </tr>
        <tr class="info">
           <td>'.$cocktail->juice2->name.'</td>
           <td>'.$cocktail->juice2_amount.'ml</td>
           <td>'.$cocktail->juice2->price * $cocktail->juice2_amount/10 .'$</td>
        </tr>
        <tr class="success">
           <td><b>Total</b></td>
           <td></td>
           <td><b>'.$cocktail->price.'$</b></td>
        </tr>
      </table>
  </div>
  <div class = "payPanel">
      <div class="panel-heading">How Do You Wanna Pay?</div>
    
  <a href="#" class="list-group-item"><span class="fa fa-paypal"></span> PayPay</a>
  <a href="#" class="list-group-item"><span class="fa fa-apple"></span> ApplePay</a>
  <a href="#" class="list-group-item"><span class="fa fa-google-wallet"></span> GooglePay</a>
  <a href="#" class="list-group-item"><span class="fa fa-credit-card-alt"></span> Credit Card  (highly Recommend)</a>
</div></div>';

    disconnect();
    ?>
</main>
<footer>
    <section class="contact">
        <a href="#" class="fbLink"></a>
        <a href="#" class="youtubeLink"></a>
    </section>
    <section class="rights">
        <p>© Copyright 2017 Yogev&Ori LTD. All right reserved.</p>
    </section>
</footer>
<script src="includes/scripts/grid.js"></script>
</body>
</html>
