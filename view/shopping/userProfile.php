<?php session_start(); ?>
<?php if (!isset($_SESSION["logInfo"]) && empty($_SESSION["logInfo"])) { ?>
    <script>
        alert("Please Log In !");
        window.location.href = "http://localhost/shopping_cart/view/shopping/index.php";
    </script>
<?php }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Profile</title>
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
        <!----CSS------>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/responsivemenu.css" />
        <link rel="stylesheet" href="css/practise.css" />
        <link rel="stylesheet" href="css/media.css" />
        <link rel="stylesheet" href="css/userProfile.css" />
        <!-----FONTS------>
        <link rel="stylesheet" href="css/font-awesome.css" />
        <!------JS----->
        <script src="js/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li class="active"><a class="navbar-brand" href="#">WebSiteName</a></li>
                            <li class="homePage"><a href="index.php">Home</a></li>
                        </ul>
                    </div>
                </nav>
            </div> 
            <div class="row">
                <div id="userProfile">
                    <div id="menuBar" class="menuBar">
                        <div class="userInfo">
                            <div class="bigInfo">
                                <div class="img DBimg">
                                    <img class="" src="">
                                </div>
                                <div class="uInfo">
                                    <ul>
                                        <li class="infoName"><span><span class="fa fa-users" aria-hidden="true"></span>&nbsp;<i class="name"></i></span></li>
                                        <li class="infoAcc infoLastLogin"><span><span class="fa fa-calendar"></span>&nbsp;<i class="created"></i></span></li>
                                        <li class="infoCountry"><span><span class="fa fa-map-marker"></span>&nbsp; <i class="from"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="smallInfo">
                                <div class="img DBimg">
                                    <img class="" src="">
                                </div>
                                <div class="uInfo">
                                    <ul>
                                        <li class="infoName"><span><span class="fa fa-users" aria-hidden="true"></span>&nbsp;<i class="name"></i></span></li>
                                        <li class="infoAcc"><span><span class="fa fa-calendar"></span>&nbsp;<i class="created">10-02-2017 8:30</i></span></li>
                                        <li class="infoCountry"><span><span class="fa fa-map-marker"></span>&nbsp; <i class="from">Bangladesh.</i></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="userMenu">
                            <div class="bigMenu">
                                <h1>
                                    <p>Menu <i class="pull-right fa fa-angle-double-down"></i></p>
                                </h1>
                                <ul>
                                    <li class="menuLi general" menu="general"><i class="fa fa-list"></i>&nbsp;General</li>
                                    <li class="menuLi information" menu="information"><i class="fa fa-book"></i>&nbsp;Information</li>
                                    <li class="menuLi product" menu="product"><i class="fa fa-cart-plus"></i>&nbsp;Products</li>
                                    <li class="menuLi editInformation" menu="editInformation"><i class="fa fa-edit"></i>&nbsp;Edit Information</li>
                                    <li class="menuLi editProduct" menu="editProduct"><i class="fa fa-edit"></i>&nbsp;Edit Products</li>
                                </ul>
                            </div>
                            <div class="smallMenu">
                                <h1>
                                    <p>Menu <i class="pull-right fa fa-angle-double-down"></i></p>
                                </h1>
                                <ul>
                                    <li class="menuLi general" menu="general"><i class="fa fa-list"></i>&nbsp;General</li>
                                    <li class="menuLi information" menu="information"><i class="fa fa-book"></i>&nbsp;Information</li>
                                    <li class="menuLi product" menu="product"><i class="fa fa-cart-plus"></i>&nbsp;Products</li>
                                    <li class="menuLi editInformation" menu="editInformation"><i class="fa fa-edit"></i>&nbsp;Edit Info</li>
                                    <li class="menuLi editProduct" menu="editProduct"><i class="fa fa-edit"></i>&nbsp;Edit Products</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="userBody">
                        <div class="contentBody">
                            <div class="well-lg deshboard">
                                <h1><i style="color: white;" class="fa fa-tachometer" aria-hidden="true"></i>&nbsp; Dashboard</h1>
                            </div>
                            <!-------Here is All pages------->
                            <div id="allData" edit-pro="">
                                <?php include 'general.php'; ?>
                            </div>
                            <script>
    (function ($) {
        $(".general").addClass("proMenuDes");
        $("li.menuLi").on("click", function (event) {
            var len = $("li.menuLi").closest(".disabled").length;
            var classOne = event.target.classList[1];
            if (len < 1) {
                if (classOne === "general") {
                    $("#allData").load("general.php", function (responseTxt, statusTxt, xhr) {
                        if (statusTxt === "success") {
                            menuColor(event.target);
                        }
                    });
                }
                else if (classOne === "information") {
                    $("#allData").load("information.php", function (responseTxt, statusTxt, xhr) {
                        if (statusTxt === "success") {
                            menuColor(event.target);
                        }
                    });
                }
                else if (classOne === "product") {
                    $("#allData").load("product.php", function (a, b, c) {
                        if (b === "success") {
                            menuColor(event.target);
                            $.getScript("js/product.js");
                        }
                    });
                }
                else if (classOne === "editInformation") {
                    $("#allData").load("editInformation.php", function (a, b, c) {
                        if (b === "success") {
                            menuColor(event.target);
                            $.getScript("js/editInformation.js");
                        }
                    });
                }
                else if (classOne === "editProduct") {
                    $("#allData").load("editProduct.php", function (a, b, c) {
                        if (b === "success") {
                            menuColor(event.target);
                            $.getScript("js/editProduct.js");
                        }
                    });
                }
                else {
                    $("#allData").load("general.php", function (a, b, c) {
                        if (b === "success") {
                            menuColor(event.target);
                        }
                    });
                }
            }
        });
    }(jQuery));
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="my_footer" class=" ">
                    <div id="my_copyright">
                        <p class="text-center">allcopyright &copy; mithu <?php echo 2017 ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-----Less Js----->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/storage&Notify.js"></script>
        <script src="js/userPanelResponsive.js"></script>
        <script src="js/userProfile.js"></script>
        <script>
        </script>
        <script>
            $(".navbar ").css({"margin-bottom": "0", "border-radius": "0"});</script>
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
                });
            }(jQuery));
        </script>
    </body>
</html>
