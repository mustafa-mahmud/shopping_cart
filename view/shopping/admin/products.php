<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Products</title>
        <!----META----->
        <meta charset="UTF-8" />
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="Cache-Control" content="no-cache"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <!--[if lte IE 9]>
        <link href='/PATH/TO/FOLDER/css/animations-ie-fix.css' rel='stylesheet'>
        <![endif]-->
        <!-----CSS----->
        <link rel="stylesheet" href="css/admin4All.css" />
        <link rel="stylesheet" href="css/practise.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/scrollbar.css" />
        <link rel="stylesheet" href="css/basicInfo.css" />

        <!----Fonts---->
        <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.css" />
    </head>
    <body>
        <div id="containerParent" class="container-fluid">
            <div id="containerChild" class="row">
                <div id="myMenu" class="col-sm-5 col-md-4 col-lg-3 col-xl-2 noPaddingMargin creatScroll menu">
                    <div class="mainMenu p-2 w-100">
                        <div class="menuHead">
                            <span>
                                <i class="fas fa-shopping-bag"></i>&nbsp; <i style="font-size: 17px !important;">Shopping Panel</i>
                            </span>
                            <span>
                                <img src="images/content.jpg" alt="admin" class="adminImg" width="50" height="40">
                                &nbsp;
                                <i class="adminName text-capitalize">mithu khan</i>
                            </span>
                            <ul>
                                <li><a href="javascript:void(0);"><i class="fas fa-cube"></i> &nbsp; Basic Info</a></li>
                                <li class="parentLi arrowDeg myActive"><a href="javascript:void(0)" data-target="#producting" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Products</a></li>
                                <ul id="producting" class="collapse" my-data="chaildUl">
                                    <li><a href="javascript:void(0);"><i class="fas fa-plus-square"></i>&nbsp; Add Products</a></li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-pen-square"></i>&nbsp; Edit Products</a></li>
                                </ul>
                                <li class="parentLi2 arrowDegg"><a href="javascript:void(0)" data-target="#membering" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Members</a></li>
                                <ul id="membering" class="collapse" my-data="chaildUl">
                                    <li><a href="javascript:void(0);"><i class="fas fa-plus-square"></i>&nbsp; Add Members</a></li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-pen-square"></i>&nbsp; Edit Members</a></li>
                                </ul>
                                <li><a href="javascript:void(0);"><i class="fas fa-chart-bar"></i> &nbsp; Charts</a></li>
                                <li><a href="javascript:void(0);"><i class="fas fa-map"></i> &nbsp; Map</a></li>
                                <li><a href="javascript:void(0);"><i class="fas fa-tasks"></i> &nbsp; Profile</a></li>
                                <li><a href="javascript:void(0);"><i class="fas fa-assistive-listening-systems"></i> &nbsp; Settings</a></li>
                                <li><a href="javascript:void(0);"><i class="fas fa-home"></i> &nbsp; Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="myMain" class="col-sm-7 col-md-8 col-lg-9 col-xl-10 noPaddingMargin content creatScroll">
                    <div class="mainContent mt-2 p-2 w-100 h-100">
                        <div class="row myDeshBoard">
                            <div class="col-sm-12 col-md-4 d-none d-sm-block">
                                <div class="desh">
                                    <span onclick="myCross(this);">
                                        <div class="cross1"></div>
                                        <div class="cross2"></div>
                                        <div class="cross3"></div>
                                    </span>
                                    <i>Deshboard</i>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 mt-2">
                                <div class="logSearch text-right">
                                    <div class="inputHere">
                                        <input name="search" type="text" placeholder="Products" />
                                        <i class="fa fa-search px-2"></i>
                                        <span class="notify fa fa-bell px-2"><b class="fa fa-exclamation-circle"></b></span>
                                        <span class="logIcon fa fa-user px-2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-----Main Code------>
                            <div class="col-sm-12 my4 mb-3 mt-5">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card mb-5 redOne" style="flex-direction:initial;">
                                            <div class="myOne myOne-1 card">
                                                <div class="card-body">
                                                    <span class="allFonts fas fa-shopping-basket"></span>
                                                </div>
                                            </div>
                                            <div class="infoMain infoMain-1 p-1">
                                                <p class="Abril">Total Product</p>
                                                <p><i style="color: red;" class="topInfo Frijole">205</i></p>
                                            </div>
                                            <span class="Pathway fa fa-braille myDesign">&nbsp; Today Add : <i class="bottomInfo">50</i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card mb-5 greenOne" style="flex-direction:initial;">
                                            <div class="myOne myOne-2 card">
                                                <div class="card-body">
                                                    <span class="allFonts fa fa-users"></span>
                                                </div>
                                            </div>
                                            <div class="infoMain infoMain-1 p-1">
                                                <p class="Abril">Total Client</p>
                                                <p><i style="color: green;" class="topInfo Frijole">50</i></p>
                                            </div>
                                            <span class="Pathway fa fa-braille myDesign">&nbsp; Today Log : <i class="bottomInfo">50</i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card mb-5 blueOne" style="flex-direction:initial;">
                                            <div class="myOne myOne-3 card">
                                                <div class="card-body">
                                                    <span class="allFonts fas fa-truck"></span>
                                                </div>
                                            </div>
                                            <div class="infoMain infoMain-1 p-1">
                                                <p class="Abril">Total Sold</p>
                                                <p><i style="color: blue;" class="topInfo Frijole">500</i></p>
                                            </div>
                                            <span class="Pathway fa fa-braille myDesign">&nbsp; Today Sold : <i class="bottomInfo">10</i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card mb-5 yellowOne" style="flex-direction:initial;">
                                            <div class="myOne myOne-4 card">
                                                <div class="card-body">
                                                    <span class="allFonts fas fa-archive"></span>
                                                </div>
                                            </div>
                                            <div class="infoMain infoMain-1 p-1">
                                                <p class="Abril">Total Saved</p>
                                                <p><i style="color: yellow;" class="topInfo Frijole">1000</i></p>
                                            </div>
                                            <span class="Pathway fa fa-braille myDesign">&nbsp; Today Saved : <i class="bottomInfo">100</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="topPart px-2">
                                            <div>
                                                <div style="display: table" class="myBigRound">
                                                    <span style="color: black;display: table-cell; vertical-align: middle" class="text-center"><i style="font-size: 65px;" class="fa fa-life-ring"></i></span>
                                                </div>
                                                <p style="border-bottom: 1px solid black;font-size: 21px;" class="p-1 Abril text-right">Product Information</p>
                                            </div>
                                        </div>
                                        <div class="bottomPart mb-5">
                                            <div class="p-3">
                                                <div class="myCard">
                                                    <span class="Abel">Total Product :</span>&nbsp;<i class="Abril">300</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Total Saved :</span>&nbsp;<i class="Abril">100</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Total Sold :</span>&nbsp;<i class="Abril">30</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Total Sold Prices :</span>&nbsp;<i class="Abril">5000$</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Today Add :</span>&nbsp;<i class="Abril">10</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Total Deleted :</span>&nbsp;<i class="Abril">400</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Total Active :</span>&nbsp;<i class="Abril">50</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Total Inactive :</span>&nbsp;<i class="Abril">100</i>
                                                </div>
                                                <div class="myCard">
                                                    <span class="Abel">Total New :</span>&nbsp;<i class="Abril">133</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                

                            </div>
                            <div class="col-sm-12 myFooter">
                                <p>&COPY; mustafa mahmud <?php echo 2018 ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/bootstrap.js"></script>
            <script src="js/admin4All.js"></script>
            <script>
                                        function myCross(ev) {
                                            document.getElementById("myMenu").classList.toggle("sr-only");
                                            document.getElementById("myMain").classList.toggle("col-sm-12");
                                            document.getElementById("myMain").classList.toggle("col-md-12");
                                            document.getElementById("myMain").classList.toggle("col-lg-12");
                                            document.getElementById("myMain").classList.toggle("col-xl-12");
                                            ev.classList.toggle("change");
                                        }
            </script>
    </body>
</html>
