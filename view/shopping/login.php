<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <!----META----->
        <meta charset="UTF-8" />
    </head>
    <body>
        <!------Login Form------>
        <div class="container-fluid">
            <div class="row">
                <div id="myLogin" class="modal fade text-left" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <p class="modal-title">Login</p>
                            </div>
                            <div class="modal-body">
                                <form id="logForm" class="logForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="logEmail">your email</label>&nbsp;&nbsp;<i class="logEmailErr">* please input valid email</i>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" placeholder="your email" id="logEmail" name="logEmail" class="logEmail form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="logPass">password</label>&nbsp;&nbsp;<i class="logPassErr">* please input password</i>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" id="logPass" name="logPass" class="logPass form-control" placeholder="your password">
                                        </div>
                                    </div>
                                    <div class="checkbox">
                                        <label><input id="check" class="check" name="check" type="checkbox"> remember me</label>
                                    </div>
                                    <div>
                                        <i class="logMainErr"></i>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="login btn btn-success">login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-----Js----->
    </body>
</html>
