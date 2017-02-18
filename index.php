<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EasyDrink</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="includes/styles/bootstrap.min.css">
        <link href="includes/styles/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="includes/styles/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="includes/scripts/bootstrap.min.js"></script>
        <script src="includes/scripts/scripts.js"></script>
        <!--Thumbnail grid  (More in the and of body) -->
        <link rel="stylesheet" type="text/css" href="includes/styles/thumbnail.css" />
        <script src="includes/scripts/modernizr.custom.js"></script>

    </head>
    <body id="index">
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
        <!-- END Side Nav -->
        <section class="customizeGif"></section>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><span class="glyphicon glyphicon-star"></span> </strong> Cocktail saved !
        </div>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><span class="glyphicon glyphicon-warning-sign"></span> </strong> Cocktail already on favorites
        </div>
        <main>
            <section class="customize-poster" href="MakeYourOwn.html">
                <h2><i class="fa fa-flask" aria-hidden="true"></i>CREATE YOUR POISON</h2>
                <p>Customize your drink just the way you like it .</p>
                <a class="btn btn-info" href="MakeYourOwn.php">Create Now</a>
            </section>
            <section class="slogan">
                <h2>IT WAS NEVER THAT EASY TO GET A DRINK</h2>
            </section>
            <ul id="og-grid" class="og-grid">
                <?php
                $drinkArr = getThinCocktailObjArray();
                $arrSize = count($drinkArr);
                for ($i = 0;  ($i < 15) && ($i < $arrSize) ;  $i++) { //There are 10 drinks in index page
                    if ((($drinkArr[$i]->trendy == 1) || ($drinkArr[$i]->our_picks == 1))) {
                        echo '
                <li>
                    <a href="#" data-largesrc=" ' . $drinkArr[$i]->img_src . '">
                        <img src="' . $drinkArr[$i]->tumb_src . '" alt="img02">
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <section class="thumbnail-description-header">
                                <h3>' . $drinkArr[$i]->name;
                        if ($drinkArr[$i]->trendy == 1)
                            echo '<span class="label label-info"><i class="glyphicon glyphicon-sunglasses" aria-hidden="true"></i> Trendy</span> ';
                        if ($drinkArr[$i]->our_picks == 1)
                            echo '<span class="label label-success"><span class="glyphicon glyphicon-glass">OurPicks</span>';
                        echo '</h3>
                             </section>
                            <section class="thumbnail-description-content">
                                <p>' . $drinkArr[$i]->description . '</p>
                            </section>
                            <section class="thumbnail-description-buttons">
                                <button class="btn btn-sm btn-warning saveBtn" data-id="' . $drinkArr[$i]->cocktail_id . '"><span class="glyphicon glyphicon-star"></span> Save</button>
                                <form action="CheckOut.php" methud="get"><input type="hidden" name="id" value="' . $drinkArr[$i]->cocktail_id . '"><button class="btn btn-lg btn-primary">Buy</button></form>
                                <form action="MakeYourOwn.php" methud="get"><input type="hidden" name="id" value="' . $drinkArr[$i]->cocktail_id . '"><button class="btn btn-lg btn-success">Customize</button></form>
                            </section>
                        </div>
                    </div>
                </li>';
                    }
                }
                disconnect();
                ?>
            </ul>
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