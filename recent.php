<html>
    <head>
        <meta charset="UTF-8">
        <title>EasyDrink</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="includes/styles/bootstrap.min.css">
        <link href="includes/styles/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="includes/styles/style.css">
        <link rel="stylesheet" href="includes/styles/drinkList.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="includes/scripts/bootstrap.min.js"></script>
        <script src="includes/scripts/scripts.js"></script>

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
            <a href="index.html" id="logo">EasyDrink</a>
            <button class="navbar-toggle collapsed search-toggle">
                <span class="glyphicon glyphicon-search "></span>
            </button>
        </nav>
        <!-- END Nav -->
        <!-- Side Nav -->
        <div id="mySidenav" class="sidenav">
            <button class="btn closebtn">&times;</button>
            <section class="sideNavUser">
                <h3><span class="glyphicon glyphicon-user"> Shaul Gueta</h3>
                <a class="btn logInOutBtn"><span class="glyphicon glyphicon-log-out"></span></a>
            </section>
            <ul>
                <li><a href="recent.php" class="active"><i class="fa fa-history"></i> Recent</a></li>
                <li><a href="MakeYourOwn.html"><i class="fa fa-flask"></i> Customize</a></li>
                <li><a href="#"><i class="fa fa-user"></i> For you</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-glass" ></span> Our picks</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-sunglasses" ></span> Trendy</a></li>
            </ul>
        </div>
        <!-- END Side Nav -->
        <header>
            <h1><i class="fa fa-history" aria-hidden="true"></i> Recent</h1>
            <p>Your recent ordered drinks</p>
        </header>
        <main class="wrapper">
            <ul class="list-group drinkList">
                <li class="list-group-item">
                    <img src="images/Glass1.jpg"  alt="glass">
                    <label class="drinkName">WallaVodkaRedball</label>
                    <label class="drinkDescription">Vodka 10cc, orange 20cc, ice</label>
                    <section class="drinkLiBtnGroup">
                        <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-star"></span> Save</button>
                        <button class="btn btn btn-primary">Buy</button>
                        <button class="btn btn-success">Customize</button>
                    </section>
                    <label class="drinkPrice">10$</label>
                    <div class="clear"> </div>
                </li>
                <li class="list-group-item">
                    <img src="images/Glass1.jpg"  alt="glass">
                    <label class="drinkName">WallaVodkaRedball</label>
                    <label class="drinkDescription">Vodka 10cc, orange 20cc, ice</label>
                    <section class="drinkLiBtnGroup">
                        <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-star"></span> Save</button>
                        <button class="btn btn btn-primary">Buy</button>
                        <button class="btn btn-success">Customize</button>
                    </section>
                    <label class="drinkPrice">10$</label>
                    <div class="clear"> </div>
                </li>
                <li class="list-group-item">
                    <img src="images/Glass1.jpg"  alt="glass">
                    <label class="drinkName">WallaVodkaRedball</label>
                    <label class="drinkDescription">Vodka 10cc, orange 20cc, ice</label>
                    <section class="drinkLiBtnGroup">
                        <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-star"></span> Save</button>
                        <button class="btn btn btn-primary">Buy</button>
                        <button class="btn btn-success">Customize</button>
                    </section>
                    <label class="drinkPrice">10$</label>
                    <div class="clear"> </div>
                </li>
                <li class="list-group-item">
                    <img src="images/Glass1.jpg"  alt="glass">
                    <label class="drinkName">WallaVodkaRedball</label>
                    <label class="drinkDescription">Vodka 10cc, orange 20cc, ice</label>
                    <section class="drinkLiBtnGroup">
                        <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-star"></span> Save</button>
                        <button class="btn btn btn-primary">Buy</button>
                        <button class="btn btn-success">Customize</button>
                    </section>
                    <label class="drinkPrice">10$</label>
                    <div class="clear"> </div>
                </li>
            </ul>
        </main>
    </body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: Ori
 * Date: 2/13/2017
 * Time: 7:21 PM
 */?>