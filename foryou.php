<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trendy</title>
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
<nav class="navbar navbar-inverse navbar-fixed-top">
    <button type="button" class="navbar-toggle collapsed hamburger" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
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
    <ul>
        <li><a href="recent.php"><i class="fa fa-history"></i> Recent</a></li>
        <li><a href="MakeYourOwn.php"><i class="fa fa-flask"></i> Customize</a></li>
        <li class="active"><a href="foryou.php"><i class="fa fa-user"></i> For you</a></li>
        <li><a href="ourpicks.php"><span class="glyphicon glyphicon-glass" ></span> Our picks</a></li>
        <li><a href="Trendy.php"><span class="glyphicon glyphicon-sunglasses" ></span> Trendy</a></li>
    </ul>
</div>
<!-- END Side Nav -->
<header>
    <h1><i class="glyphicon glyphicon-sunglasses" aria-hidden="true"></i> For You</h1>
    <p>Drink most recommended four specially for you</p>
</header>
<main>
    <ul id="og-grid" class="og-grid">
        <?php
        include "DataBaseUtil.php";
        $drinkArr = getCocktailByIdFromTbl();
        for ($i = 0; $i < 3; $i++) { //There are 3 drinks of the day
            echo '
                <li>
                    <a href="#" data-largesrc=" ' . $drinkArr[$i]->$img_src . '" data-title="" data-description="">
                        <img src="' . $drinkArr[$i]->$tumb_src . '" alt="img02">
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <section class="thumbnail-description-header">
                                <h3>' . $drinkArr[$i]->$name . '</h3>
                             </section>
                            <section class="thumbnail-description-content">
                                <p>' . $drinkArr[$i]->$description . '</p>
                            </section>
                            <section class="thumbnail-description-buttons">
                                <button class="btn btn-primary">Buy</button>
                                <button class="btn btn-info">Customize</button>
                            </section>
                        </div>
                    </div>
                </li>';
        }
        ?>
    </ul>
    <section class="headerSlogen">
        <h2>Drink of the Week</h2>
    </section>
    <?php
    include "DataBaseUtil.php";
    //Getting Drinks from DB
    $drinkArr = getCocktailByIdFromTbl("1122","tbl_219_for_you");

    //Now printing them
    $arrSize = count($drinkArr);
    for ($i = 0; $i < $arrSize; $i++) { //There are 7 drinks of the day
        echo '
                <li>
                    <a href="#" data-largesrc=" ' . $drinkArr[$i]->img_src . '" data-title="" data-description="">
                        <img src="' . $drinkArr[$i]->tumb_src . '" alt="img02">
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <section class="thumbnail-description-header">
                                <h3>' . $drinkArr[$i]->name . '</h3>
                             </section>
                            <section class="thumbnail-description-content">
                                <p>' . $drinkArr[$i]->description . '</p>
                            </section>
                            <section class="thumbnail-description-buttons">
                                <button class="btn btn-primary">Buy</button>
                                <button class="btn btn-info">Customize</button>
                            </section>
                        </div>
                    </div>
                </li>';
    }
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