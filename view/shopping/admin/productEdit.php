<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Product Edit</title>
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
        <link rel="stylesheet" href="css/productEdit.css" />

        <!----Fonts---->
        <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.css" />
        <link href='https://fonts.googleapis.com/css?family=Alegreya SC' rel='stylesheet' />
        <link href='https://fonts.googleapis.com/css?family=Carter One' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Frijole|Pacifico|Pathway+Gothic+One|Poppins|Wendy+One" rel="stylesheet"> 
        <script src="js/jquery-3.2.1.min.js"></script>  
    </head>
    
    <body>
        <div id="containerParent" class="container-fluid">
            <div id="containerChild" class="row">
                <!------Menu Area----->
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
                            <div class="col-sm-12">
                                <div class="mainParent p-2 mt-5">
                                    <div class="addProduct p-3">
                                        <div class="topInfoAdd p-3">
                                            <span class="fa fa-link"></span>&nbsp; &nbsp;
                                            <span>Edit Products</span>
                                        </div>
                                        <div class="inputResult table-responsive mt-4">
                                            <table class="table table-dark table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S.L</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Show</th>
                                                        <th class="selectDelAll checkbox">
                                                            <label>Delete &nbsp;
                                                                <input class="deleteAll" type="checkbox" name="deleteAll">
                                                                <span class="allDelete"><i class="fa fa-check"></i></span>
                                                            </label>
                                                        </th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-------<tr/><td/> will come automatically from 'productEdit.js'---------> 
                                                <div id="productEdit" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="proUpdate" name="proUpdate" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-12">
                                                                                <div class="form-group col-sm-12">
                                                                                    <div class="row">
                                                                                        <label for="image" name="image" class="col-sm-2 col-form-label">Image</label>
                                                                                        <div class="col-sm-10 myBrowse">
                                                                                            <div class="thumbnail">
                                                                                                <a href="javascript:void(0)">
                                                                                                    <img id="change" src="images/content.jpg" alt="Nature" style="width:100%">
                                                                                                    <div class="caption">
                                                                                                        <p>Upload Image</p>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <span class="errImg">pls only image & in 2mb!</span>
                                                                                        </div>
                                                                                            <input id="proImg" type="file" name="proImageEdit" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12">
                                                                                    <div class="row">
                                                                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="text" name="proNameEdit" class="form-control" />
                                                                                            <span class="errNameExists">sorry this name already exists !</span>
                                                                                            <span class="errName">pls only a-z0-9!</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12">
                                                                                    <div class="row">
                                                                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="number" name="price" class="form-control" />
                                                                                            <span class="errPrice">pls only 0-9!</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-right mr-3">
                                                                                    <span id="saveMsg"></span>
                                                                                    <button type="button" id="reset" class="btn btn-dark">Reset</button>
                                                                                    <button type="button" id="save" class="btn btn-success">Save</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 myFooter">
                                <p>&COPY;mustafa mahmud <?php echo date("Y") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="saveButton">
            <p id="saveAll">save &nbsp;<i class="fa fa-save"></i></p>
            <p id="cancelAll">cancel &nbsp;<i class="fa fa-crosshairs"></p>
        </div>         
        <script src="js/bootstrap.js"></script>
        <script src="js/admin4All.js"></script>
        <script src="js/productEdit.js"></script>
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

