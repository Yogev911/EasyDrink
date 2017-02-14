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
                <h3><span class="glyphicon glyphicon-user"> Shaul Gueta</h3>
                <a class="btn logInOutBtn"><span class="glyphicon glyphicon-log-out"></span></a>
            </section>
            <ul>
                <li><a href="recent.php"><i class="fa fa-history"></i> Recent</a></li>
                <li><a href="MakeYourOwn.php"><i class="fa fa-flask"></i> Customize</a></li>
                <li><a href="foryou.php"><i class="fa fa-user"></i> For you</a></li>
                <li><a href="ourpicks.php"><span class="glyphicon glyphicon-glass" ></span> Our picks</a></li>
                <li><a href="Trendy.php"><span class="glyphicon glyphicon-sunglasses" ></span> Trendy</a></li>
            </ul>
        </div>
        <!-- END Side Nav -->
        <section class="customizeGif"></section>
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
                <!-- This is how the expander code should look like !-->
                <li>
                    <a href="#" data-largesrc="images/cocktails/coconut.jpg">
                        <img src="images/cocktails/thumbs/coconut.jpg" alt="img01"/>
                    </a>
                    <div class="thumbnail-content">
                            <section class="thumbnail-description-header">
                                <h3>Coconut <span class="label label-info">Trandy</span> </h3>
                            </section>
                            <section class="thumbnail-description-content">
                                <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            </section>
                            <section class="thumbnail-description-buttons">
                                <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-star"></span> Save</button>
                                <button class="btn btn-lg btn-primary">Buy</button>
                                <button class="btn btn-lg btn-success">Customize</button>
                            </section>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/redmoon.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/redmoon.jpg" alt="img02"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Red Moon Over Manhattan Cocktail</h3>
                            <p>The Manhattan is one of the finest and oldest cocktails around. It’s a classic and sophisticated cocktail. For this Red Moon Over Manhattan…</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/blueberry-mojito-float.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/blueberry-mojito-float.jpg" alt="img03"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>BLUEBERRY MOJITO FLOAT</h3>
                            <p>This blueberry mojito float takes a traditional mint mojito and adds a pop of flavor and color with the addition of blueberry sorbet.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/Guinness_Bourbon_Blackberry_cocktail.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/Guinness_Bourbon_Blackberry_cocktail.jpg" alt="img01"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Guinness Black Magic Cocktail</h3>
                            <p>A gorgeous cocktail to toast with on Halloween or St Patrick's Day – Guinness, bourbon, blackberries and lime. Double or triple the recipe in order to use the whole can of Guinness draught.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/Witches-Heart.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/Witches-Heart.jpg" alt="img02"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>The Witch's Heart</h3>
                            <p>Cocktail brings together the mesmerizing swirls, colors and flavors of Viniq, Vodka ,Grenadine and voilà – The Witch’s Heart Cocktail!</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/Spicy-Grapefruit-Margaritas.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/Spicy-Grapefruit-Margaritas.jpg" alt="img03"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Jalapeño Grapefruit Margarita</h3>
                            <p>This margarita is the absolute best and easiest sweet, spicy cocktail for all your entertaining needs! The heat of the infused jalapeño pairs wonderfully with grapefruit and tequila.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/pinakolada.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/pinakolada.jpg" alt="img01"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Pinakolada</h3>
                            <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/pinakolada.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/pinakolada.jpg" alt="img01"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Pinakolada</h3>
                            <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/coconut.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/coconut.jpg" alt="img01"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Coconut</h3>
                            <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/watermelon.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/watermelon.jpg" alt="img02"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Watermelon</h3>
                            <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/orange.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/orange.jpg" alt="img03"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Orange</h3>
                            <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/green.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/green.jpg" alt="img02"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Green</h3>
                            <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" data-largesrc="images/cocktails/coconut.jpg" data-title="" data-description="">
                        <img src="images/cocktails/thumbs/coconut.jpg" alt="img01"/>
                    </a>
                    <div class="thumbnail-content">
                        <div>
                            <h3>Coconut</h3>
                            <p>Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.</p>
                            <button class="btn btn-primary">Buy</button>
                            <button class="btn btn-info">Customize</button>
                        </div>
                    </div>
                </li>
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