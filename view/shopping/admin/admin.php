<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
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
        <link rel="stylesheet" href="../css/admin.css" />
        <link rel="stylesheet" href="../css/practise.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/media.css" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="admin">
                    <button type="button" class="myModal" data-toggle="modal" data-target="#admin" data-backdrop="static">modal</button>
                    <div id="admin" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Admin</legend>
                                        <span style="visibility: hidden">here error msg</span>
                                        <div class="control-group">
                                            <div class="controls">
                                                <form name="adminForm" class="adminForm" method="post" enctype="multipart/form-data">
                                                    <ul>
                                                        <li>
                                                            <div class="form-group">
                                                                <input required="required" type="text" class="form-control" name="adminNameEmail" placeholder="user name or email" />
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <input class="form-control" type="password" placeholder="password" required="required" name="adminPass" />
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="sub">
                                                        <p class="btn btn-primary pull-right">send</p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            (function ($) {
                $(function () {
                    $(".myModal").trigger("click");
                });
            }(jQuery));
        </script>
    </body>
</html>
