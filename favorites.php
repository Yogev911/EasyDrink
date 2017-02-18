
    <!DOCTYPE html>
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
    <?php
    include "DataBaseUtil.php";
    connect();
    if (!empty($_GET["id"])) {
        $val = updateSavedCocktail($_GET["id"], $_GET["glassId"],$_GET["alcoholOne"],$_GET["alcoholOneAmount"],$_GET["alcoholTwo"],$_GET["alcoholTwoAmount"],$_GET["juiceOne"],$_GET["juiceOneAmount"],$_GET["juiceTwo"],$_GET["juiceTwoAmount"],$_GET["ice"]);
    }
    ?>
    <!-- Nav -->
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
        <section class="sideNavUser">
            <?php
            $userConnected = getUserObj(305166860);
            echo '<h3><img class="userImg" src="'.$userConnected->pic.'">  '.$userConnected->name.'</h3>';
            ?>
            <a class="btn logInOutBtn"><span class="glyphicon glyphicon-log-out"></span></a>
        </section>
        <ul>
            <li class="active"><a href="favorites.php"><span class="glyphicon glyphicon-star"></span> Favorites</a></li>
            <li><a href="recent.php"><i class="fa fa-history"></i> Recent</a></li>
            <li><a href="MakeYourOwn.php"><i class="fa fa-flask"></i> Customize</a></li>
            <li><a href="foryou.php"><i class="fa fa-user"></i> For you</a></li>
            <li><a href="ourpicks.php"><span class="glyphicon glyphicon-glass"></span> Our picks</a></li>
            <li><a href="Trendy.php"><span class="glyphicon glyphicon-sunglasses"></span> Trendy</a></li>
        </ul>
    </div>
    <!-- END Side Nav -->
    <header>
        <h1><span class="glyphicon glyphicon-star"></span> Favorites</h1>
        <p>Here are you Favorites Cocktails</p>
    </header>
    <main class="wrapper">
        <ul class="list-group drinkList">
            <?php

            global $defaultUserId;
            $drinkArr = getThinCocktailsByUserIdFromTbl($defaultUserId, "tbl_219_favorits");
            $arrSize = count($drinkArr);
            for ($i = 0; $i < $arrSize; $i++) {
                echo '
                            <li class="list-group-item">
                                <img src="images/Glass' . $drinkArr[$i]->glass . '.jpg"  alt="glass">
                                <label class="drinkName">' . substr($drinkArr[$i]->name, 0, 20) . '</label>
                                <label class="drinkDescription">' . substr($drinkArr[$i]->description, 0, 50) . '...</label>
                                <section class="drinkLiBtnGroup">
                                    <form action="CheckOut.php" methud="get"><input type="hidden" name="id" value="' . $drinkArr[$i]->cocktail_id . '"><button class="btn btn-lg btn-primary">Buy</button></form>
                                    <form action="Edit.php" methud="get"><input type="hidden" name="id" value="' . $drinkArr[$i]->cocktail_id . '"><button class="btn btn-lg btn-success">Edit</button></form>
                                </section>
                                <label class="drinkPrice">10$</label>
                                <div class="clear"> </div>
                            </li>';
            }
            disconnect()
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
    </body>
    </html>


    <?php
    /**
     * Created by PhpStorm.
     * User: Ori
     * Date: 2/13/2017
     * Time: 7:21 PM
     */ ?>