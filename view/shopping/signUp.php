<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>signUp</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="mySignUp" class="modal fade text-left">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" type="button" data-dismiss="modal">&times;</button>
                                <p class="modal-title">sign up</p>
                            </div>
                            <div class="modal-body">
                                <form id="signing" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="uName">user name</label> <i class="errName"></i>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="uName" type="text" id="uName" class="uName form-control" placeholder="your name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uEmail">user email</label> <i class="errEmail"></i>
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="uEmail" type="email" id="uEmail" class="uEmail form-control" placeholder="your email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uCountry">country</label>  <i class="errCountry"></i>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                            <select name="uWorld" id="uWorld" class="world selectpicker show-tick form-control">
                                                <option selected value="noData">your country</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uPass">password</label> <i class="errPass"></i>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input name="uPass" type="password" id="uPass" class="uPass form-control" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uConPass">confirm password</label>  <i class="errConPass"></i>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input name="uConPass" type="password" id="uConPass" class="uConPass form-control" placeholder="confirm password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">gender</label>  <i class="errGender"></i>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-leaf"></span></span>
                                            <select name="uGender" id="uGender" class="form-control">
                                                <option value="noGender">select your gender</option>
                                                <option value="men">male</option>
                                                <option value="women">female</option>
                                                <option value="others">others</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="sign btn btn-success pull-right">sign up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------JS--------->
    </body>
</html>
