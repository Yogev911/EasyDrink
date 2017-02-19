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
        <li><a class="active" href="MakeYourOwn.php"><i class="fa fa-flask"></i> Customize</a></li>
        <li><a href="foryou.php"><i class="fa fa-user"></i> For you</a></li>
        <li><a href="ourpicks.php"><span class="glyphicon glyphicon-glass" ></span> Our picks</a></li>
        <li><a href="Trendy.php"><span class="glyphicon glyphicon-sunglasses" ></span> Trendy</a></li>
    </ul>
</div>
<!-- END Side Nav -->
<header>
    <h1><i class="fa fa-flask" aria-hidden="true"></i> Make Your Own Poison</h1>
</header>
<div class="alert alert-warning alert-dismissible notify" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><span class="glyphicon glyphicon-star"></span> </strong> Cocktail saved !
</div>
<div class="alert alert-danger alert-dismissible notify" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><span class="glyphicon glyphicon-warning-sign"></span> </strong> Cocktail already on favorites
</div>
<div class="wrapper customize">
    <main>

        <section class="tube">
            <img src="images/measureCup.svg">
            <section>
            </section>
        </section>
        <form id="form" action="CheckOut.php" class="form_makeyourown">
            <input id="idHidden" type="hidden" name="id" value="">
            <?php
            if (!empty($_GET["id"])) {
                $glassArr = getGlassObjArray();
                $alcoholArr = getAlcoholObjArray();
                $juiceArr = getJuiceObjArray();
                $cocktailObj = getCocktailsByCocktailId($_GET["id"]);
                $key1 = array_search($cocktailObj->alcohol1 , $alcoholArr);
                unset($alcoholArr[$key1]);
                $key2 = array_search($cocktailObj->alcohol2 , $alcoholArr);
                unset($alcoholArr[$key2]);
                $key3 = array_search($cocktailObj->juice1 , $juiceArr);
                unset($juiceArr[$key3]);
                $key4 = array_search($cocktailObj->juice2 , $juiceArr);
                unset($juiceArr[$key4]);
                $key5 = array_search($cocktailObj->glass , $glassArr);
                unset($glassArr[$key5]);


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
                                    if (!empty($_GET["id"])) {
                                        echo '<label><img src="' . $cocktailObj->glass->img_src . '"  alt="glass"><input type="radio" name="glassId" value="' . $cocktailObj->glass->glass_id . '" checked>' . $cocktailObj->glass->name . '<span>' . $cocktailObj->glass->capacity . 'ml</span></label>';
                                    }else{
                                        echo '<label><img src="' . $glassArr[0]->img_src . '"  alt="glass"><input type="radio" name="glassId" value="' . $glassArr[0]->glass_id . '" checked>' . $glassArr[0]->name . '<span>' . $glassArr[0]->capacity . 'ml</span></label>';
                                        unset($glassArr[0]);
                                    }
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
                                        echo '<option data-color="'.$cocktailObj->alcohol1->color.'" value="' . $cocktailObj->alcohol1->alcohol_id . '">' . $cocktailObj->alcohol1->name . ' ' . $cocktailObj->alcohol1->price . '$</option>';
                                    }else{
                                        //echo '<option value="" selected>Alcohol</option>';
                                    }

                                    foreach ($alcoholArr as $alcohol) {
                                        echo '<option data-color="'.$alcohol->color.'"  value="' . $alcohol->alcohol_id . '">' . $alcohol->name . ' ' . $alcohol->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="alcoholOneAmount" data-for="alcoholOne">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <?php
                                        if (!empty($_GET["id"])) {
                                            echo '<input type="number" name="alcoholOneAmount" class="form-control input-number"value="'.$cocktailObj->alcohol1_amount.'" min="0" max="200" data-for="alcoholOne" readonly>';
                                        }else{
                                            echo '<input type="number" name="alcoholOneAmount" class="form-control input-number"value="0" min="0" max="200" readonly>';
                                        }
                                        ?>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="alcoholOneAmount" data-for="alcoholOne">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </section>
                                <div class="clear"></div>
                                <!-- ALCOHOL TWO -->
                                <select class="form-control" name="alcoholTwo">
                                    <?php
                                    if (!empty($_GET["id"])) {
                                        echo '<option data-color="'.$cocktailObj->alcohol2->color.'" value="' . $cocktailObj->alcohol2->alcohol_id . '">' . $cocktailObj->alcohol2->name . ' ' . $cocktailObj->alcohol2->price . '$</option>';
                                    }else{
                                       // echo '<option value="" selected>Alcohol</option>';
                                    }
                                    foreach ($alcoholArr as $alcohol) {
                                        echo '<option data-color="'.$alcohol->color.'" value="' . $alcohol->alcohol_id . '">' . $alcohol->name . ' ' . $alcohol->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="alcoholTwoAmount" data-for="alcoholTwo">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <?php
                                        if (!empty($_GET["id"])) {
                                            echo '<input type="number" name="alcoholTwoAmount" class="form-control input-number"value="'.$cocktailObj->alcohol2_amount.'" min="0" max="200" data-for="alcoholTwo" readonly>';
                                        }else{
                                            echo '<input type="number" name="alcoholTwoAmount" class="form-control input-number"value="0" min="0" max="200" readonly>';
                                        }
                                        ?>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="alcoholTwoAmount" data-for="alcoholTwo">
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
                                    <?php
                                    if (!empty($_GET["id"])) {
                                        echo '<option data-color="'.$cocktailObj->juice1->color.'"  value="' . $cocktailObj->juice1->juice_id . '">' . $cocktailObj->juice1->name . ' ' . $cocktailObj->juice1->price . '$</option>';
                                    }else{
                                        //echo '<option value="" selected>Juice</option>';
                                    }
                                    foreach ($juiceArr as $juice) {
                                        echo '<option data-color="'.$juice->color.'"  value="' . $juice->juice_id . '">' . $juice->name . ' ' . $juice->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="juiceOneAmount" data-for="juiceOne">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <?php
                                        if (!empty($_GET["id"])) {
                                            echo '<input type="number" name="juiceOneAmount" class="form-control input-number"value="'.$cocktailObj->juice1_amount.'" min="0" max="200" data-for="juiceOne" readonly>';
                                        }else{
                                            echo '<input type="number" name="juiceOneAmount" class="form-control input-number"value="0" min="0" max="200" readonly>';
                                        }
                                        ?>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="juiceOneAmount" data-for="juiceOne" >
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </section>
                                <div class="clear"></div>
                                <!-- JUICE TWo -->
                                <select class="form-control" name="juiceTwo">
                                    <?php
                                    if (!empty($_GET["id"])) {
                                        echo '<option data-color="'.$cocktailObj->juice2->color.'" value="' . $cocktailObj->juice2->juice_id . ' ">' . $cocktailObj->juice2->name . ' ' . $cocktailObj->juice2->price . '$</option> ';
                                    }else{
                                       // echo '<option value="" selected>Juice</option>';
                                    }
                                    foreach ($juiceArr as $juice) {
                                        echo '<option data-color="'.$juice->color.'" value="' . $juice->juice_id . '">' . $juice->name . ' ' . $juice->price . '$</option>';
                                    }
                                    ?>
                                </select>
                                <section class="amountInput">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus"
                                                    data-field="juiceTwoAmount" data-for="juiceTwo">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <?php
                                        if (!empty($_GET["id"])) {
                                            echo '<input type="number" name="juiceTwoAmount" class="form-control input-number"value="'.$cocktailObj->juice2_amount.'" min="0" max="200" data-for="juiceTwo" readonly >';
                                        }else{
                                            echo '<input type="number" name="juiceTwoAmount" class="form-control input-number"value="0" min="0" max="200" readonly>';
                                        }
                                        ?>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="juiceTwoAmount" data-for="juiceTwo">
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
                                    <?php
                                    if (!empty($_GET["id"])) {
                                        if ($cocktailObj->ice == 0) {
                                            echo '<label class="btn btn-primary active"><input type="radio" name="ice" id="option1" autocomplete="off" value="0" checked> Yes</label>';
                                        } else {
                                            echo '<label class="btn btn-primary"><input type="radio" name="ice" id="option1" autocomplete="off" value="0"> Yes</label>';
                                        }
                                        if ($cocktailObj->ice == 1) {
                                            echo '<label class="btn btn-primary active"><input type="radio" name="ice" id="option2" autocomplete="off" value="1" checked > No</label>';
                                        } else {
                                            echo '<label class="btn btn-primary"><input type="radio" name="ice" id="option2" autocomplete="off" value="1" > No</label>';
                                        }
                                        if ($cocktailObj->ice == 2) {
                                            echo '<label class="btn btn-primary active"><input type="radio" name="ice" id="option3" autocomplete="off" value="2" checked > Crashed!</label>';
                                        } else {
                                            echo '<label class="btn btn-primary"><input type="radio" name="ice" id="option3" autocomplete="off" value="2" > Crashed!</label>';
                                        }
                                    }else{
                                        echo '<label class="btn btn-primary active"><input type="radio" name="ice" id="option1" autocomplete="off" value="0" checked> Yes</label>';
                                        echo '<label class="btn btn-primary"><input type="radio" name="ice" id="option2" autocomplete="off" value="1" > No</label>';
                                        echo '<label class="btn btn-primary"><input type="radio" name="ice" id="option3" autocomplete="off" value="2" > Crashed!</label>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Name Your Cocktail</h4>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="text" name="name" value="" placeholder="Cocktail Name">
                            <input class="form-control" type="text" name="description" value="" placeholder="Description">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning saveMakeYourOwn" >Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="clear"></div>
            <section class="customizeBtnSection">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-star"></span> save</button>
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