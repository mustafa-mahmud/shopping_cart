<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Basic Information</title>
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
        <script src="js/jquery-3.2.1.min.js"></script>
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
                <?php include 'leftMenu.php';?>
                <!------Main Area------>
                <div id="myMain" class="col-sm-7 col-md-8 col-lg-9 col-xl-10 noPaddingMargin content creatScroll">
                    <div class="mainContent mt-2 p-2 w-100 h-100">
                        <div class="row myDeshBoard">
                            <div class="col-12 d-block d-sm-none">
                                <span style="cursor: pointer;" id="showMenu" onclick="showMe()"><i class="fas fa-th-large"></i>&nbsp; menu</span>
                            </div>
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
                                        <div class="col-sm-12 col-lg-6">
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
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="topPart px-2">
                                                <div>
                                                    <div style="display: table" class="myBigRound">
                                                        <span style="color: black;display: table-cell; vertical-align: middle" class="text-center"><i style="font-size: 65px;" class="fa fa-life-ring"></i></span>
                                                    </div>
                                                    <p style="border-bottom: 1px solid black;font-size: 21px;" class="p-1 Abril text-right">Member Information</p>
                                                </div>
                                            </div>
                                            <div class="bottomPart mb-5">
                                                <div class="p-3">
                                                    <div class="myCard">
                                                        <span class="Abel">Total Member :</span>&nbsp;<i class="Abril">100</i>
                                                    </div>
                                                    <div class="myCard">
                                                        <span class="Abel">Total Active :</span>&nbsp;<i class="Abril">50</i>
                                                    </div>
                                                    <div class="myCard">
                                                        <span class="Abel">Total Inactive :</span>&nbsp;<i class="Abril">30</i>
                                                    </div>
                                                    <div class="myCard">
                                                        <span class="Abel">Today Log :</span>&nbsp;<i class="Abril">10</i>
                                                    </div>
                                                    <div class="myCard">
                                                        <span class="Abel">Log (before 30days) :</span>&nbsp;<i class="Abril">30</i>
                                                    </div>
                                                    <div class="myCard">
                                                        <span class="Abel">Today Created :</span>&nbsp;<i class="Abril">5</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 myFooter">
                                    <p>&COPY; mustafa mahmud <?php echo 2018 ?></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
        <script src="js/admin4All.js"></script>
        <script>
                                    //make large width after click on Deshboard
                                    function myCross(ev) {
                                        document.getElementById("myMenu").classList.toggle("sr-only");
                                        document.getElementById("myMain").classList.toggle("col-sm-12");
                                        document.getElementById("myMain").classList.toggle("col-md-12");
                                        document.getElementById("myMain").classList.toggle("col-lg-12");
                                        document.getElementById("myMain").classList.toggle("col-xl-12");
                                        ev.classList.toggle("change");
                                    }
                //work on side menu bar 
                function showMe() {
                    document.getElementsByClassName("sideMenu")[0].style.width="100%";
                }
                function hideMe(){
                    document.getElementsByClassName("sideMenu")[0].style.width="0%";
                }
        </script>
    </body>
</html>
