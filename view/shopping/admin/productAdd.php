<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Product Add</title>
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
        <link rel="stylesheet" href="css/productAdd.css" />

        <!----Fonts---->
        <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.css" />
    </head>
    <body>
        <div id="containerParent" class="container-fluid">
            <div id="containerChild" class="row">
                <!-----This menu bar only for upto col-sm-*-------->
                <div id="myMenu" class="col-sm-5 col-md-4 col-lg-3 col-xl-2 noPaddingMargin creatScroll menu d-none d-sm-block">
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
                                <li><a href="basicInfo.php"><i class="fas fa-cube"></i> &nbsp; Basic Info</a></li>
                                <li class="parentLi arrowDeg myActive"><a href="javascript:void(0)" data-target="#producting" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Products</a></li>
                                <ul id="producting" class="collapse" my-data="chaildUl">
                                    <li class="myActive2"><a href="productAdd.php"><i class="fas fa-plus-square"></i>&nbsp; Add Products</a></li>
                                    <li><a href="productEdit.php"><i class="fas fa-pen-square"></i>&nbsp; Edit Products</a></li>
                                </ul>
                                <li class="parentLi2 arrowDegg"><a href="javascript:void(0)" data-target="#membering" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Members</a></li>
                                <ul id="membering" class="collapse" my-data="chaildUl">
                                    <li><a href="memberInfo.php"><i class="fas fa-plus-square"></i>&nbsp; Info Members</a></li>
                                    <li><a href="memberEdit.php"><i class="fas fa-pen-square"></i>&nbsp; Edit Members</a></li>
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
                <!-----This menu bar only for down col(575)*-------->
                <div id="smallMenu" class="noPaddingMargin creatScroll menu d-block d-sm-none sideMenu">
                    <span class="closeMe" onclick="hideMe();"><i>&times;</i></span>
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
                                <li><a href="basicInfo.php"><i class="fas fa-cube"></i> &nbsp; Basic Info</a></li>
                                <li class="parentLi arrowDeg"><a href="javascript:void(0)" data-target="#producting" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Products</a></li>
                                <ul id="producting" class="collapse" my-data="chaildUl">
                                    <li><a href="productAdd.php"><i class="fas fa-plus-square"></i>&nbsp; Add Products</a></li>
                                    <li><a href="productEdit.php"><i class="fas fa-pen-square"></i>&nbsp; Edit Products</a></li>
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
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-lg-6 mt-2">
                                        <div class="productInfo">
                                            <div class="boxSquire">
                                                <span class="fa fa-cube"></span>
                                            </div>
                                            <div class="boxInfo p-2">
                                                <span>Today Add Products</span><br/>
                                                <span> <i class="pro">0</i><i class="proDown">0</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-2">
                                        <div class="productInfo">
                                            <div class="boxSquire">
                                                <span class="fa fa-cubes"></span>
                                            </div>
                                            <div class="boxInfo p-2">
                                                <span>Today Add Prices</span><br/>
                                                <span><i class="prices pro2">0$</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mainParent p-2 mt-5">
                                            <div class="addProduct p-3">
                                                <div class="topInfoAdd p-3">
                                                    <span class="fa fa-link"></span>&nbsp; &nbsp;
                                                    <span>Add Products</span>
                                                </div>
                                                <div id="addProduct" class="row">
                                                    <div class="col-sm-12">
                                                        <form class="form-inline" id="allProductInfo" method="post" enctype="multipart/form-data">
                                                            <div class="form-group col-md-6 add mt-3 mb-2">
                                                                <i class="errName">fill the box</i>
                                                                <input name="product" type="text" placeholder="product name" class="form-control"/>
                                                                <span class="verifyOk">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span class="verifyWrong">
                                                                    <i class="fas fa-times"></i>
                                                                </span>
                                                            </div>
                                                            <div class="form-group col-md-6 add mt-3 mb-2">
                                                                <i class="errPrice">fill the box</i>
                                                                <input name="price" type="text" placeholder="product price" disabled="disabled" class="form-control"/>
                                                            </div>
                                                            <div class="input-group col-md-6 add mt-3 mb-2">
                                                                <i class="errImg">choose image</i>
                                                                <div class="custom-file">
                                                                    <input disabled="disabled" name="saveImg" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                    <label class="text-left custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 add mt-3 mb-2">
                                                                <div data-toggle="button" class="form-check">
                                                                    <i class="errChecked"></i>
                                                                    <label class="form-check-label">
                                                                        <button type="button" class="btn btn-success btn-md">
                                                                            <span class="fas fa-check ckOk"></span>
                                                                        </button>
                                                                        <input type="checkbox" name="show" class="form-check-input">show on page?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 add mt-4 mb-2">
                                                                <input name="submit" type="submit" class="btn btn-outline-dark" value="Add Product">
                                                            </div>
                                                        </form>
                                                        <!-----Show Error Message From 'productClass.php'----->
                                                        <button class="btn btn-primary" type="button" data-toggle='modal' data-target='#error'>error modal</button>
                                                        <div class="modal fade" id="error">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <p style="cursor: pointer;" class="text-right" data-dismiss='modal'>&times;</p>
                                                                        <p class="msgShow"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="inputResult table-responsive mt-4">
                                                    <table class="table table-dark table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>S.L</th>
                                                                <th>Image</th>
                                                                <th>Name</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 myFooter">
                                <p>&COPY;mustafa mahmud <?php echo 2018 ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/admin4All.js"></script>
        <script src="js/productAdd.js"></script>
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
                                            document.getElementsByClassName("sideMenu")[0].style.width = "100%";
                                        }
                                        function hideMe() {
                                            document.getElementsByClassName("sideMenu")[0].style.width = "0%";
                                        }
        </script>
    </body>
</html>
