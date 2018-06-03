<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Member Edit</title>
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
        <link rel="stylesheet" href="css/memberEdit.css" />
        <link rel="stylesheet" href="css/admin4All.css" />
        <link rel="stylesheet" href="css/scrollbar.css" />
        <link rel="stylesheet" href="css/userForm.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/practise.css" />

        <!----Fonts---->
        <script src="js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.css" />
    </head>
    <body>
        <div id="containerParent" class="container-fluid">
            <div id="containerChild" class="row">
                <?php
                include 'leftMenu.php';
                ?>
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
                                <div class="mainParent mt-5 p-2">
                                    <div class="childParent p-3">
                                        <div class="topStyle">
                                            <p><span><i class="fa fa-users"></i></span> &nbsp;Edit Member</p>
                                        </div>
                                        <div class="table-responsive mt-5">
                                            <table class="table table-bordered table-striped table-hover table-dark text-center">
                                                <thead>
                                                    <tr>
                                                        <th>s.l</th>
                                                        <th>name</th>
                                                        <th>image</th>
                                                        <th>email</th>
                                                        <th>country</th>
                                                        <th>pass</th>
                                                        <th>gender</th>
                                                        <th>con</th>
                                                        <th>status</th>
                                                        <th>created</th>
                                                        <th>ip</th>
                                                        <th>lastLogin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-----Here all data came by MemberEdit.js----->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 myFooter">
                                <p onclick="showMe();">&COPY;mustafa mahmud <?php echo date("Y") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-----Fixed Bar (input/active/deactice/delete)-------->
        <div class="container-fluid">
            <div class="row">
                <div class="rightSideBar">
                    <div class="cross">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                    </div>
                    <div class="childDesign">
                        <input data-toggle="tooltip" data-trigger="focus" data-placement="left" title="please input any serial number" id="userUpdate" name="userUpdate" class="userUpdate" placeholder="S.l" />
                        <div class="active">
                            <p class="same">
                                <b>edit</b> &nbsp;
                                <span style="font-size: 20px" class="fas fa-edit"></span>
                                <i></i>
                            </p>
                        </div>
                        <div class="delete" data-toggle="confirmation" data-title="Are you sre to Delete?" data-placement="left">
                            <p class="same">
                                <b>delete</b> &nbsp;
                                <span class="fas fa-trash-alt"></span>
                                <i></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-----Modal------->
        <div class="container-fluid">
            <div class="row">
                <!---Modal---->
                <div id="userForm" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button class="close myDesign" type="button" data-dismiss="modal">&times;</button>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="userForm col-sm-12">
                                        <div class="card">
                                            <div class="card-header p-3 bg-dark">
                                                Edit Member
                                            </div>
                                            <div class="card-body">
                                                <form id="userEdit">
                                                    <!----Hidden Id------>
                                                    <input type="hidden" name="uId" id="uId" />
                                                    <!----Name----->
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Name</span>
                                                        </div>
                                                        <input id="name" type="text" class="form-control name" name="name">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn setPrev input-group-text btn-dark">Reset</button>
                                                        </div>
                                                    </div>
                                                    <!----Image----->
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Image</span>
                                                        </div>
                                                        <input type="file" name="img" id="userFile" class="form-control imgUser">
                                                        <div class="input-group-append">
                                                            <img id="userImg" src="images/doll.jpg" />
                                                        </div>
                                                    </div>
                                                    <!----Email----->
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Email</span>
                                                        </div>
                                                        <input id="email" type="text" class="form-control email" name="email">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn setPrev input-group-text btn-dark">Reset</button>
                                                        </div>
                                                    </div>
                                                    <!----Country----->
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Country</span>
                                                        </div>
                                                        <select name="country" id="country" class="form-control">
                                                            <option value="null">select country</option>
                                                        </select>
                                                    </div>
                                                    <!----Gender----->
                                                    <div class="input-group myOne mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>gender</span>
                                                            </div>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>male</span>&nbsp;
                                                                <input name="gender" data-gen="men" type="radio">
                                                            </div>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>female</span>&nbsp;
                                                                <input name="gender" data-gen="women" type="radio">
                                                            </div>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>others</span>&nbsp;
                                                                <input name="gender" data-gen="others" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!----Password----->
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">New Pass</span>
                                                        </div>
                                                        <input type="password" name="newPass" class="form-control" placeholder="new password" />
                                                        <input type="password" name="oldPass" class="form-control" placeholder="confirm password" />
                                                    </div>
                                                    <!----Email Confirmation----->
                                                    <div class="input-group mb-3 myOne2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Email Confirmation</span>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>Yes</span>&nbsp;
                                                                <input type="radio" data-confirm="1" name="emailConfirmation" />
                                                            </div>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>No</span>&nbsp;
                                                                <input type="radio" data-confirm="0" name="emailConfirmation" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!----Status----->
                                                    <div class="input-group myOne2 mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Status</span>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>Active</span> &nbsp;
                                                                <input type="radio" data-status="1" name="status" />
                                                            </div>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span>Inactive</span> &nbsp;
                                                                <input type="radio" data-status="0" name="status" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <p class="errAllShow pb-3">This is the dummy messages!</p>
                                                <button class="btn btn-success pr-4 pl-4 float-right save">save</button>
                                                <button class="btn btn-dark pr-4 pl-4 float-right reset mr-3">reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/admin4All.js"></script>
        <script src="js/memberEdit.js"></script>
        <script src="js/userForm.js"></script>
        <script src="js/memberEditVerification.js"></script>
        <script src="js/bootstrap-confirmation.js"></script>
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
        <script>
           
        </script>
    </body>
</html>
