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

</head>
<body>
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
        <h3><span class="glyphicon glyphicon-user"> Shaul Gueta</h3>
        <a class="btn logInOutBtn"><span class="glyphicon glyphicon-log-out"></span></a>
    </section>
    <ul>
        <li><a href="recent.php"><i class="fa fa-history"></i> Recent</a></li>
        <li class="active"><a href="MakeYourOwn.php"><i class="fa fa-flask"></i> Customize</a></li>
        <li><a href="foryou.php"><i class="fa fa-user"></i> For you</a></li>
        <li><a href="ourpicks.php"><span class="glyphicon glyphicon-glass"></span> Our picks</a></li>
        <li><a href="Trendy.php"><span class="glyphicon glyphicon-sunglasses"></span> Trendy</a></li>
    </ul>
</div>
<!-- END Side Nav -->
<header>
    <h1><i class="fa fa-flask" aria-hidden="true"></i> Make Your Own Poison</h1>
</header>
<div class="wrapper customize">
    <main>

        <section class="tube">
            <img src="images/measureCup.svg">
        </section>
        <form action="CheckOut.php" class="form_makeyourown">

            <?php
            include "DataBaseUtil.php";
            connect();

            if (empty($_GET["cocktail_id"])) {
                $glassArr = getGlassObjArray();
                $alcoholArr = getAlcoholObjArray();
                $juiceArr = getJuiceObjArray();
            }else {
                $cocktailObj = getCocktailsByCocktailId($_GET["cocktail_id"]);
                $glassArr = $cocktailObj->glass;
                $alcoholArr[] = $cocktailObj->alcohol1;
                $alcoholArr[] = $cocktailObj->alcohol2;
                $juiceArr[] = $cocktailObj->juice1;
                $juiceArr[] = $cocktailObj->juice2;
            }
            $glassArr = getGlassObjArray();
            $alcoholArr = getAlcoholObjArray();
            $juiceArr = getJuiceObjArray();

            if (!empty($_GET["id"])) {
                $cocktailObj = getCocktailsByCocktailId($_GET["id"]);
                $key1 = array_search($cocktailObj->alcohol1 , $alcoholArr);
                unset($alcoholArr[$key1]);
                $key2 = array_search($cocktailObj->alcohol2 , $alcoholArr);
                unset($alcoholArr[$key2]);
                $key3 = array_search($cocktailObj->juice1 , $juiceArr);
                unset($alcoholArr[$key3]);
                $key4 = array_search($cocktailObj->juice2 , $juiceArr);
                unset($alcoholArr[$key4]);
            }else{
                $glassArr = getGlassObjArray();
                $alcoholArr = getAlcoholObjArray();
                $juiceArr = getJuiceObjArray();
            }


            ?>

            <section class="scroll">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    Glass
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body ">
                                <div class="radio glassType">

                                    <?php
                                    foreach ($glassArr as $glass) {
                                        echo '<label><img src="' . $glass->img_src . '"  alt="glass"><input type="radio" name="glassId" value="' . $glass->glass_id . '">' . $glass->name . '<span>' . $glass->capacity . 'ml</span></label>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Alcohol
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <!-- ALCOHOL ONE -->
                                <select class="form-control" name="alcoholOne">
                                    <?php
                                    if (!empty($_GET["id"])) {
                                        $cocktailObj = getCocktailsByCocktailId($_GET["id"]);
                                        $key = array_search($cocktailObj->alcohol1 , $alcoholArr);
                                        echo 'index is '. $key.'';
                                        echo '<option value="' . $cocktailObj->alcohol1->alcohol_id . '">' . $cocktailObj->alcohol1->name . ' ' . $cocktailObj->alcohol1->price . '$</option>';
                                        unset($alcoholArr[$key]);
                                    }else{
                                        echo '<option value="" selected>Alcohol</option>';
                                    }

                                    foreach ($alcoholArr as $alcohol) {
                                        echo '<option value="' . $alcohol->alcohol_id . '">' . $alcohol->name . ' ' . $alcohol->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="alcoholOneAmount">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" name="alcoholOneAmount" class="form-control input-number"
                                               value="0" min="0" max="200">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="alcoholOneAmount">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </section>
                                <div class="clear"></div>
                                <!-- ALCOHOL TWO -->
                                <select class="form-control" name="alcoholTwo">
                                    <option value="" selected>Alcohol</option>
                                    <option value="" selected>Alcohol</option>
                                    <?php
                                    foreach ($alcoholArr as $alcohol) {
                                        echo '<option value="' . $alcohol->alcohol_id . '">' . $alcohol->name . ' ' . $alcohol->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="alcoholTwoAmount">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" name="alcoholTwoAmount" class="form-control input-number"
                                               value="0" min="0" max="200">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="alcoholTwoAmount">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </section>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Juice
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <!-- JUICE ONE -->
                                <select class="form-control" name="juiceOne">
                                    <option value="" selected>Juice</option>
                                    <?php
                                    foreach ($juiceArr as $juice) {
                                        echo '<option value="' . $juice->alcohol_id . '">' . $juice->name . ' ' . $juice->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="juiceOneAmount">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" name="juiceOneAmount" class="form-control input-number"
                                               value="0" min="0" max="200">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="juiceOneAmount">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </section>
                                <div class="clear"></div>
                                <!-- JUICE TWo -->
                                <select class="form-control" name="juiceTwo">
                                    <option value="" selected>Juice</option>
                                    <?php
                                    foreach ($juiceArr as $juice) {
                                        echo '<option value="' . $juice->alcohol_id . '">' . $juice->name . ' ' . $juice->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="juiceTwoAmount">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" name="juiceTwoAmount" class="form-control input-number"
                                               value="0" min="0" max="200">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="juiceTwoAmount">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </section>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseThreeFour" aria-expanded="false" aria-controls="collapseThree">
                                    Ice
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThreeFour" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingFour">
                            <div class="panel-body">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Yes
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> No
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option3" autocomplete="off"> Crashed!
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clear"></div>
            <section class="customizeBtnSection">
                <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-star"></span> Save</button>

                <button type="submit" value="Submit" class="btn btn-primary">Pay</button>

            </section>

            <?php
            disconnect();
            ?>
    </main>
</div>
</form>
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