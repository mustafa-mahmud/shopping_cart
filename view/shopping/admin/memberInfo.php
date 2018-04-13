<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Member Info</title>
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
        <link rel="stylesheet" href="../css/admin4All.css" />
        <link rel="stylesheet" href="../css/basicInfo.css" />
        <link rel="stylesheet" href="../css/practise.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/media.css" />

        <!----Fonts---->
        <link rel="stylesheet" href="css/font-awesome.css" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="parentDiv">
                    <div id="menuAdmin">
                        <div class="menuBar">
                            <div class="innerMenu">
                                <div class="topAdmin">
                                    <p class="raised">Admin Panel</p>
                                </div>
                                <div class="adminMenu">
                                    <ul>
                                        <li>Main --</li>
                                        <li><a class="pressed" href="basicInfo.php">Basic Info</a></li>
                                        <li>Product --</li>
                                        <li><a class="pressed" href="productInfo.php">Info</a></li>
                                        <li><a class="pressed" href="productAdd.php">Add</a></li>
                                        <li><a class="pressed" href="productEdit.php">Edit</a></li>
                                        <li>Member --</li>
                                        <li><a class="raised" href="memberInfo.php">Info <i> -- running</i></a></li>
                                        <li><a class="pressed" href="memberEdit.php">edit</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="adminContent">
                        <div class="mainContent">
                            <div class="lineHeight"></div>
                            <div class="lineWidth"></div>
                            <div class="allContent">
                                 <div class="memberBasic" style="width: 100%;">
                                    <h3 class="pressed">Members Info</h3>
                                    <div class="memberDiv">
                                        <ul>
                                            <li>
                                                <div class="pressed raises">
                                                    <p>Total Member</p>
                                                    <p>50</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pressed raises">
                                                    <p>Total Confirmed Member</p>
                                                    <p>30</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pressed raises">
                                                    <p>Total Unconfirmed Member</p>
                                                    <p>10</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pressed raises">
                                                    <p>Total Today Login</p>
                                                    <p>10</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="memberDiv">
                                        <ul>
                                            <li>
                                                <div class="pressed raises">
                                                    <p>1 Month Before Login</p>
                                                    <p>10</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pressed raises">
                                                    <p>Total Active Members</p>
                                                    <p>20</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pressed raises">
                                                    <p>Total Inactive Members</p>
                                                    <p>5</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-----footer------->
                <div id="my_footer" class=" ">
                    <div id="my_copyright">
                        <p class="text-center">allcopyright &copy; mithu <?php echo 2017 ?></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/admin4AllResponsive.js"></script>
        <script src="../js/memberInfoResponsive.js"></script>
    </body>
</html>
