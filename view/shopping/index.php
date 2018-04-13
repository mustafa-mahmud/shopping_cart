<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$getId = "NULL";
if (strstr($actual_link, "id") !== FALSE) {
    $getId = substr($actual_link, -13);
}

function clearBrowserCache() {
    header("Pragma: no-cache");
    header("Cache: no-cache");
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 9 Jul 1995 05:00:00 GMT");
}
?>
<html>
    <head>
        <title>Shopping Cart with Tw|Js|Jq|Php|Sql|Json|Html+Css</title>

        <!----META----->
        <meta charset="UTF-8" />
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="Cache-Control" content="no-cache"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 9]>
        <link href='/PATH/TO/FOLDER/css/animations-ie-fix.css' rel='stylesheet'>
        <![endif]-->
        <!-----CSS----->

        <link rel="stylesheet" href="css/fancyInput2.css" />
        <link rel="stylesheet" href="css/fancyInput.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/background_video.css" />
        <link rel="stylesheet" href="css/normalize.min.css" /><!-----Bubble effect------>
        <link rel="stylesheet" href="css/bubble.css" /><!-----Bubble effect------>
        <link rel="stylesheet" href="css/freshstyle.css" />
        <link rel="stylesheet" href="css/cart.css" />
        <link rel="stylesheet" href="css/practise.css" />
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/animate.min.css" />
        <link rel="stylesheet" href="css/responsivemenu.css" />
        <link rel="stylesheet" href="css/media.css" />
        <link rel="stylesheet" href="css/sliderLi.css" />

        <!----Fonts---->
        <link rel="stylesheet" href="css/font-awesome.css" />

        <style>
            .affix {
                top: 0;
                width: 100%;
                z-index: 250;
            }
            .affix + .container-fluid {
                padding-top: 40px;
            }
        </style>
    </head>
    <body>
        <?php ?>
        <!-----Slider Start----->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/laptop.jpg" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Laptop</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="images/mobile.jpg" alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>New Mobile</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="images/watch.jpg" alt="New York" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Men & Women Watch</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-----Slider End----->
        <!-----Nav Start----->
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav" id="my_big_menu" style="display: none;">
                <li class="active ckBell"><a href="javascript:void(0);">Basic Cart Template</a></li>
                <li class="trggerMe"><a href="javascript:void(0)">Check Cart</a></li>
                <li><a href="userProfile.php">Profile</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <video loop="loop" id="bellring" class="embed-responsive-item">
                <source src="audios/bell ring.mp3" type="audio/mp3" />
            </video>
            <div class="mainNotify">
                <span class="badge badge-success bell">2</span>
            </div>
            <div class="dropdown" id="my_mini_menu">
                <p id="my_menu" style="background:black !important" class="btn btn-primary dropdown-toggle" type="p" data-toggle="dropdown">Menu&nbsp;
                    <span class="glyphicon glyphicon-align-justify"></span></p>
                <ul class="dropdown-menu">
                    <li><a href="#">Check Cart</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="dropdown" id="my_mini_user" style="background:black !important">
                <p id="my_user" style="background:black !important" class="btn btn-primary dropdown-toggle" type="p" data-toggle="dropdown">user&nbsp;
                    <?php if (isset($_SESSION["logInfo"]) && !empty($_SESSION["logInfo"])) { ?>
                        <span class="heart"><i class="heartIn"><?php echo strtoupper(substr($_SESSION["logInfo"]["uName"], 0, 1)); ?></i></span>
                        <?php
                    }
                    else {
                        ?>
                        <span class="glyphicon glyphicon-user"></span>
                    <?php }
                    ?>
                </p>
                <?php if (isset($_SESSION["logInfo"]) && !empty($_SESSION["logInfo"])) { ?>
                    <ul class="dropdown-menu logSingUp">
                        <li>
                            <a href="logOut.php">Log Out</a>
                        </li>
                    </ul>
                    <?php
                }
                else {
                    ?>
                    <ul class="dropdown-menu logSingUp">
                        <li>
                            <a data-toggle="modal" data-target="#mySignUp">Sign In</a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#myLogin">Log In</a>
                        </li>
                    </ul>
                <?php }
                ?>
            </div>
        </nav>
        <div id="main"></div><!--this for affix jumps and prevent the space of nav--->
        <!-----Nav End----->
        <!------Login Form Start-------->
        <?php include 'login.php'; ?>
        <!-------Login Form End------->
        <!------signUp Form Start------->
        <?php include 'signUp.php'; ?>
        <!------signUp Form End------->
        <div class="container-fluid">
            <!-----3Images Start----->
            <div class="row">
                <div id="my_img_3">
                    <div id="my_img_text">
                        <div id="my_img"><img src="images/dog2.jpg" alt="pet shop" title="pets" width="100%"/></div>
                        <div id="my_text">
                            <p class="text-capitalize text-center" id="my_para">dog shop</p>
                            <p class="text-uppercase text-center" id="my_head">Discount <span>25%</span></p>
                            <p class="text-center text-capitalize" id="my_para">Choose you Pet <span id="my_head">&</span> play</p>
                        </div>
                    </div>
                    <div id="my_img_text2">
                        <div id="my_img2" class="my_img"><img src="images/doll2.jpg" alt="dol shop" title="dols" width="100%"/></div>
                        <div id="my_text2">
                            <p class="text-capitalize text-center" id="my_para">doll shop</p>
                            <p class="text-uppercase text-center" id="my_head">Start Prices <span>$5</span></p>
                            <p class="text-center text-capitalize" id="my_para">Choose you Doll <span id="my_head">&</span> play</p>
                        </div>
                    </div>
                    <div id="my_img_text3">
                        <div id="my_img3"><img src="images/bag2.jpg" alt="bag shop" title="bags" width="100%"/></div>
                        <div id="my_text3">
                            <p class="text-capitalize text-center" id="my_para">bag shop</p>
                            <p class="text-uppercase text-center" id="my_head">Discount <span>15%</span></p>
                            <p class="text-center text-capitalize" id="my_para">Luxury Bag <span id="my_head">&</span> Bagges</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-----3Images End----->
            <!-----1Images Background Start----->
            <div class="row">
                <div id="one_back">
                    <h3 class="text-uppercase edited_text"><span style="border-bottom: 2px solid black"><span class="styleText">ma</span>rriage arrival</span></h3>
                    <p class="text-muted">collect for your happy marriage day, memorize it with new arrival.</p>
                    <div class="men_add_women">
                        <div class="bride_div">
                            <div class="men">
                                <img src="images/wed2.jpg" alt="mentBrideGrome" title="menBrideGrome" />
                            </div>
                            <div class="add">
                                <ul>
                                    <li>
                                        <div>
                                            <img src="images/levis1.png" alt="leveis" title="leveis" /><br/><span> <i>35%</i> disscount</span>
                                            <p>see more</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/dig.jpg" alt="leveis" title="leveis" /><br/><span> <i>45%</i> disscount</span>
                                            <p>see more</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="women">
                                <img src="images/wed1.jpg" alt="womenBride" title="womenBride" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-----1Images Background  End----->
            <!-----Cart+Production Start----->
            <div class="row">
                <div id="my_product">
                    <!------fixe car bar start------>
                    <div id="my_cart">
                        <div class="cart" data-price="0" style="cursor: pointer;" data-toggle="modal" data-target="#cartModal">
                            <div>
                                <p class="badge badge-success total"></p>
                                <span class="cart_icon glyphicon glyphicon-shopping-cart"></span>
                                <span class="dollars">$0</span>
                            </div>
                        </div>
                        <div class="cart_details">
                            <div class="mini_product">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-------Product Add & Delete Start------->
                    <?php include 'proAddDel.php'; ?>
                    <!-------Product Add & Delete End------->
                    <!-----------fixed cart bar end-------->
                    <div id="my_all_product" class="my_product">
                        <h3 class="text-uppercase edited_text"><span style="border-bottom: 2px solid black"><span class="styleText">yo</span>ur products</span></h3>
                        <p class="text-muted">some products you may like. see the below product list.</p>
                        <div class="products">
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="1700">
                                        <img src="images/products/a4.png" /><br/>
                                        <span class="pro_name">name: lady shirt</span><br/>
                                        <span class="pro_price">price: $1700</span>&nbsp;&nbsp;<del>$1720</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="1020">
                                        <img src="images/products/a1.png" /><br/>
                                        <span class="pro_name">name: lady t-shirt</span><br/>
                                        <span class="pro_price">price: $1020</span>&nbsp;&nbsp;<del>$1050</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="2050">
                                        <img src="images/products/a2.png" /><br/>
                                        <span class="pro_name">name: men coats</span><br/>
                                        <span class="pro_price">price: $2050</span>&nbsp;&nbsp;<del>$2220</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="5070">
                                        <img src="images/products/a3.png" /><br/>
                                        <span class="pro_name">name: women shirt</span><br/>
                                        <span class="pro_price">price: $5070</span>&nbsp;&nbsp;<del>$5720</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="6000">
                                        <img src="images/products/a4.png" /><br/>
                                        <span class="pro_name">name: long-skirt</span><br/>
                                        <span class="pro_price">price: $6000</span>&nbsp;&nbsp;<del>$6020</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="900">
                                        <img src="images/products/a5.png" /><br/>
                                        <span class="pro_name">name: two shirt</span><br/>
                                        <span class="pro_price">price: $900</span>&nbsp;&nbsp;<del>$920</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="870">
                                        <img src="images/products/a6.png" /><br/>
                                        <span class="pro_name">name: long-shirt</span><br/>
                                        <span class="pro_price">price: $870</span>&nbsp;&nbsp;<del>$890</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="1000">
                                        <img src="images/products/a7.png" /><br/>
                                        <span class="pro_name">name: lady skirts</span><br/>
                                        <span class="pro_price">price: $1000</span>&nbsp;&nbsp;<del>$1020</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="3010">
                                        <img src="images/products/a8.png" /><br/>
                                        <span class="pro_name">name: men long-coat</span><br/>
                                        <span class="pro_price">price: $3010</span>&nbsp;&nbsp;<del>$3020</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="900">
                                        <img src="images/products/a3.png" /><br/>
                                        <span class="pro_name">name: lady t-shirt</span><br/>
                                        <span class="pro_price">price: $900</span>&nbsp;&nbsp;<del>$920</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="3100">
                                        <img src="images/products/a5.png" /><br/>
                                        <span class="pro_name">name: two shirt</span><br/>
                                        <span class="pro_price">price: $3100</span>&nbsp;&nbsp;<del>$3120</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                            <div class="product_wrapper">
                                <div class="product_item_class">
                                    <div class="item"  data-price="1500">
                                        <img src="images/products/a6.png" /><br/>
                                        <span class="pro_name">name: lady shirts</span><br/>
                                        <span class="pro_price">price: $1500</span>&nbsp;&nbsp;<del>$1520</del>
                                    </div>
                                    <p class="add_me text-center"></p>
                                </div>
                            </div>
                        </div>
                        <div class="search_filter_like">
                            <div class="search">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">search</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="search" list="search_pro" name="search"/>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                            </div>
                                            <datalist id="search_pro">
                                                <option value="php"></option>
                                                <option value="js"></option>
                                                <option value="jq"></option>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">your dollar's range</div>
                                    <div class="panel-body text-center">
                                        <div id="ranged-value" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_like_pro">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">you may like</div>
                                    <div class="panel-body">
                                        <div class="user_like auto-scrolling-toggle">
                                            <div class="user_pro">
                                                <div class="item"  data-price="1500">
                                                    <img src="images/products/a2.png" /><br/>
                                                    <span class="pro_name">name: men's coat</span><br/>
                                                    <span class="pro_price">price: $1500</span><del>$1520</del>
                                                </div>
                                                <p class="add_me text-center"></p>
                                            </div>
                                            <div class="user_pro">
                                                <div class="item"  data-price="1900">
                                                    <img src="images/products/a2.png" /><br/>
                                                    <span class="pro_name">name: men coat</span><br/>
                                                    <span class="pro_price">price: $1900</span><del>$1920</del>
                                                </div>
                                                <p class="add_me text-center"></p>
                                            </div>
                                            <div class="user_pro">
                                                <div class="item"  data-price="9800">
                                                    <img src="images/products/a5.png" /><br/>
                                                    <span class="pro_name">name: lady bag</span><br/>
                                                    <span class="pro_price">price: $9800</span><del>$9820</del>
                                                </div>
                                                <p class="add_me text-center"></p>
                                            </div>
                                            <div class="user_pro">
                                                <div class="item"  data-price="950">
                                                    <img src="images/products/a1.png" /><br/>
                                                    <span class="pro_name">name: lady's shirt</span><br/>
                                                    <span class="pro_price">price: $950</span><del>$960</del>
                                                </div>
                                                <p class="add_me text-center"></p>
                                            </div>
                                            <div class="user_pro">
                                                <div class="item"  data-price="1000">
                                                    <img src="images/products/a4.png" /><br/>
                                                    <span class="pro_name">name: lady long-shirt</span><br/>
                                                    <span class="pro_price">price: $1000</span><del>$1020</del>
                                                </div>
                                                <p class="add_me text-center"></p>
                                            </div>
                                            <div class="user_pro">
                                                <div class="item"  data-price="3010">
                                                    <img src="images/products/a7.png" /><br/>
                                                    <span class="pro_name">name: lady skirt</span><br/>
                                                    <span class="pro_price">price: $3010</span><del>$3020</del>
                                                </div>
                                                <p class="add_me text-center"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!------------Catagories------------------->
                        <div id="catagories">
                            <div class="all_pro_catagories">
                                <span class="animated infinite zoomInt fa fa-list" title="catagories" style="color: black;font-size: 40px; text-align: center;"></span>
                            </div>
                        </div>
                        <div id="catagories_items">
                            <ul>
                                <li><a href="javascript:void(0)">Electronics</a></li>
                                <li><a href="javascript:void(0)">Garments</a></li>
                                <li><a href="javascript:void(0)">Car</a></li>
                                <li><a href="javascript:void(0)">Sports</a></li>
                                <li><a href="javascript:void(0)">Foods</a></li>
                                <li><a href="javascript:void(0)">Pet</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-----Cart+Production End---Slider Multiple li---->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sliderLi">
                            <h3 class="text-uppercase edited_text"><span style="border-bottom: 2px solid black"><span style="font-family: Comic Sans MS;" class="styleText">ne</span>w products</span></h3>
                            <p>check our all new products here.</p>
                            <div class="slider">
                                <ul>
                                    <li><img src="images/doll3.jpg" /></li>
                                    <li><img src="images/dog3.jpg" /></li>
                                    <li><img src="images/mobile.jpg" /></li>
                                    <li><img src="images/laptop.jpg" /></li>
                                    <li><img src="images/watch.jpg" /></li>
                                </ul>
                                <button class="prev"> << </button>
                                <button class="next"> >> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-----Animated Div Start-------->
            <div class="row">
                <div id="animated_div">
                    <div class="info_user animated">
                        <p>get your benefit when you buy a product which price up to 500 $&nbsp;<span><i class="fa fa-hand-o-right"></i></span></p>
                    </div>
                    <div class="info_buying">
                        <ul>
                            <li class="animated promoting">
                                <span><i class="animated fa fa-heartbeat"></i></span>
                                <p>Login with accout. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
                            </li>
                            <li class="animated promoting">
                                <span><i class="animated fa fa-bell"></i></span>
                                <p>Check your notification through email. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
                            </li>
                            <li class="animated promoting">
                                <span><i class="animated fa fa-comment"></i></span>
                                <p>Comment for product on our fachbook. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-----Animated Div End-------->
            <!-----Big Image Start----->
            <div class="row">
                <div id="myClass" class="element-with-video-bg jquery-background-video-wrapper">
                    <video class="my-background-video jquery-background-video" loop autoplay muted>
                        <source src="https://d2ezlykacdqcnj.cloudfront.net/_assets/home-video/beach-waves-loop.mp4" type="video/mp4">
                        <source src="https://d2ezlykacdqcnj.cloudfront.net/_assets/home-video/beach-waves-loop.webm" type="video/webm">
                        <source src="https://d2ezlykacdqcnj.cloudfront.net/_assets/home-video/beach-waves-loop.ogv" type="video/ogg">
                    </video>
                    <div class="video-overlay"></div>
                    <div class="page-width">
                        <div class="video-hero--content">
                            <h3 class="text-uppercase edited_text"><span style="border-bottom: 2px solid black"><span class="styleText">new</span> products</span></h3>
                            <p>What products you want to see next. Give us some summery on these.</p>
                            <div id="fncy">
                                <input type='text' >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-----Big Image End----->
            <!-----Address+Social Start----->
            <div class="row">
                <div id="my_address_social">
                    <div id="my_address" class="animated">
                        <h3 class="text-center text-uppercase edited_text"><span style="border-bottom: 2px solid black"><span class="styleText">ch</span>eck our addrress<span></h3>
                                    <ul>
                                        <li class="address">
                                            <p><i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;<span>187east , Ctg. Bangladesh</span></p>
                                        </li>
                                        <li class="email">
                                            <p> <i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;<span>shopping_market@bd.com</span></p>
                                        </li>
                                        <li class="phone">
                                            <p><i class="glyphicon glyphicon-phone"></i>
                                                &nbsp;&nbsp;<span>4654132132 , </span>
                                                <span>46455213 , </span>
                                                <span>013215464</span>
                                            </p>
                                        </li>
                                    </ul>
                                    </div>
                                    <div id="my_social">
                                        <div class="img_back animated">
                                            <img src="images/Toolkitplus.png" alt="gift" title="yourGift"><br/>
                                            <p>
                                                <span class="text-capitalize" style="color: green;">take your gift up to 500 $  buying anything </span>
                                            </p>
                                        </div>
                                        <div class="socialism animated">
                                            <div class="socials_icon">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i title="facebook" class="so_social"><span class="animated fa fa-facebook"></span></i></a></li>
                                                    <li><a href="javascript:void(0)"><i title="gplus" class="so_social"><span class="animated fa fa-google-plus"></span></i></a></li>
                                                    <li><a href="javascript:void(0)"><i title="twitter" class="so_social"><span class="animated fa fa-twitter"></span></i></a></li>
                                                    <li><a href="javascript:void(0)"><i title="linkedin" class="so_social"><span class="animated fa fa-linkedin"></span></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="some_text">
                                                <ul>
                                                    <li>&nbsp; &nbsp; &nbsp; &nbsp; this is some text. which will be changed after instead proper text. okay enjoy this false text.</li>
                                                    <li>&nbsp; &nbsp; &nbsp; &nbsp; this is some text. which will be changed after instead proper text. okay enjoy this false text.</li>
                                                </ul>
                                                <img src="images/woo1.jpg" title="women_collection" />
                                                <img src="images/woo.jpg" title="men_collection" />
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <!-----Address+Social End----->
                                    <!-----Footer Start----->
                                    <div class="row">
                                        <div id="my_footer" class=" ">
                                            <div id="my_copyright">
                                                <p>allcopyright &copy; mithu <?php echo date("Y") ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-----Footer End----->
                                    <p id="demo"></p>
                                    <!---JS---->
                                    <script src="js/jquery-3.2.1.min.js"></script>
                                    <script src="js/bootstrap.min.js"></script>
                                    <script src="js/freshslider.1.0.0.js"></script>
                                    <script src="js/jquery.mousewheel.js"></script>
                                    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
                                    <script src="js/jquery.background-video.js"></script>
                                    <script>//money filter
                                        var s3 = $("#ranged-value").freshslider({
                                            range: true,
                                            step: 1,
                                            value: [10, 700],
                                            onchange: function (low, high) {
                                                console.log(low, high);
                                            }
                                        });
                                    </script>
                                    <script src="js/fancyInput.js"></script>
                                    <script>
                                        $('#fncy :input').fancyInput();
                                    </script>
                                    <script src="js/my_script.js"></script>
                                    <script src="js/my_media_full.js" type="text/javascript"></script>
                                    <!--<script src="js/ck.js"></script>-->
                                    <!---another min.js---->
                                    <script>
                                        (function ($) {
                                            $(document).ready(function () {
                                                $.ajax({
                                                    type: "GET",
                                                    url: "bubbles.txt",
                                                    async: false,
                                                    beforeSend: function () {
                                                    },
                                                    success: function (html) {
                                                        $(".add_me").append(html);
                                                    }
                                                });
                                            });
                                        }(jQuery));
                                    </script>
                                    <?php if (gettype($getId) !== "NULL") { ?>
                                        <script>
                                            (function ($) {
                                                var getId = "<?php echo $getId; ?>";
                                                if (getId.length !== 0) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "signUpServerPhp.php",
                                                        data: {id: getId},
                                                        beforeSend: function () {
                                                        },
                                                        success: function (data) {
                                                            var patt = /^confirmed$/;
                                                            if (patt.test(data)) {
                                                                swal("Your Confirmation is success", "...You can Login now!").then(
                                                                        function () {
                                                                            window.location.href = "https://mahmudmustafa000.000webhostapp.com/shopping_cart/shopping_cart/view/shopping/index.php";
                                                                        }
                                                                );
                                                            }
                                                            console.log(data);
                                                        }
                                                    });
                                                }
                                            }(jQuery));
                                        </script>
                                    <?php } ?>
                                    <?php if (isset($_SESSION["logInfo"]) && !empty($_SESSION["logInfo"])) { ?>
                                        <script>
                                            (function ($) {
                                                $(function () {
                                                    localStorage.clear();
                                                    localStorage.setItem("Identy", "<?php echo "logInSuccess" ?>");
                                                });
                                            }(jQuery));
                                        </script>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <script>
                                            localStorage.removeItem("Identy");
                                        </script>
                                    <?php } ?>
                                    <script>
                                        (function ($) {
                                            $(function () {
                                                $(window).on("storage", function (event) {
                                                    setTimeout(function () {
                                                        if (localStorage.getItem("Identy") != "logInSuccess") {
                                                            window.location.href = "http://localhost/shopping_cart/view/shopping/index.php";
                                                        }
                                                    }, 1000);
                                                });
                                                if (localStorage.getItem("Identy") === null) {
                                                    $(".samePerma").attr("data-content", "Please Log In !");
                                                }
                                            });
                                        }(jQuery));
                                    </script>
                                    <script>
                                        (function ($) {
                                            $(function () {
                                                $('[data-toggle="popover"]').popover();
                                            });
                                        }(jQuery));
                                    </script>
                                    <script>
                                        (function ($) {
                                            $(function () {
                                                $(".trggerMe").on("click", function () {
                                                    $(".cart").trigger("click");
                                                });
                                            });
                                        }(jQuery));
                                    </script>
                                    <?php
                                    //login ck for DB last login cell update;
                                    if (isset($_SESSION["logInfo"]["singUpId"]) && !empty($_SESSION["logInfo"]["singUpId"])) {
                                        ?>
                                        <script>
                                            $.post("obj_ForAll_ClassForAll.php", {login: "ckLogin"}, function (data) {
                                                console.log(data);
                                            });
                                        </script>
                                    <?php }
                                    ?>
                                    <script src="js/CSSPlugin.min.js"></script><!---Bubble button effect--->
                                    <script src="js/EasePack.min.js"></script><!---Bubble button effect--->
                                    <script src="js/TweenLite.min.js"></script><!---Bubble button effect--->
                                    <script src="js/TimelineLite.min.js"></script><!---Bubble button effect--->
                                    <script src="js/index.js"></script><!---Bubble button effect--->
                                    <script src="js/sweetalert.min.js"></script>
                                    <script src="js/storage&Notify.js"></script>
                                    <script src="js/signUpValidation.js"></script>
                                    <script src="js/signUpServerJs.js"></script>
                                    <script src="js/logInServerJs.js"></script>
                                    <script src="js/addProduct.js"></script>
                                    <script src="js/proAddSave.js"></script>
                                    <script src="js/saveProPermanent.js"></script>
                                    <script src="js/sliderLi.js"></script>
                                    </body>
                                    </html>
