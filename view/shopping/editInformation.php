<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1 class="headed">Edit Personal Information</h1>
        <div class="editInformation" menu="editInformation">
            <form id="user" method="post" enctype="multipart/form-data">
                <ul>
                    <li style="height: 201px;">
                        <label>avatar</label> &nbsp;<i class="errImgMsg"></i>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <div class="form-control" style="height: 164px !important">
                                <img width="150" height="150px !important" id="hideMe" class="uEditImage" src="images/mobile.jpg">
                            </div>
                            <input onchange="showTheImg(event);" style="position: absolute;top: -2000px;" name="showImg" type="file" id="showImg" class="showImg">
                            <span class="input-group-addon editImg"><span title="edit" class="glyphicon glyphicon-pencil"></span></span>
                            <span class="input-group-addon saveImg"><span title="save" class="glyphicon glyphicon-save-file"></span></span>
                            <span class="input-group-addon refreshImg"><span title="cencel" class="glyphicon glyphicon-refresh"></span></span>
                        </div>
                    </li>
                    <li>
                        <label>user name</label> &nbsp;<i class="errMsg"></i>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <p id="hideMe" class="form-control uEditName"></p>
                            <input name="showMe" type="text" id="showMe" class="showMe form-control uEditName">
                            <span class="input-group-addon edit"><span title="edit" class="glyphicon glyphicon-pencil"></span></span>
                            <span class="input-group-addon save"><span title="save" class="glyphicon glyphicon-save-file"></span></span>
                            <span class="input-group-addon refresh"><span title="cencel" class="glyphicon glyphicon-refresh"></span></span>
                        </div>
                    </li>
                    <li>
                        <label>user email</label> &nbsp;<i class="errMsg"></i>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon">@</span></span>
                            <p id="hideMe" class="form-control uEditEmail"></p>
                            <input name="showMe" type="text" id="showMe" class="showMe form-control uEditEmail">
                            <span class="input-group-addon edit"><span title="edit" class="glyphicon glyphicon-pencil"></span></span>
                            <span class="input-group-addon save"><span title="save" class="glyphicon glyphicon-save-file"></span></span>
                            <span class="input-group-addon refresh"><span title="cencel" class="glyphicon glyphicon-refresh"></span></span>
                        </div>
                    </li>
                    <li>
                        <label>user country</label> &nbsp;<i class="errMsg"></i>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                            <p data-country="" id="hideMe" class="form-control uEditCountry"></p>
                            <select name="uWorld" id="uWorld" class="world selectpicker show-tick form-control">
                                <option selected value="noData">your country</option>
                            </select>
                            <span class="input-group-addon edit"><span title="edit" class="glyphicon glyphicon-pencil"></span></span>
                            <span class="input-group-addon save"><span title="save" class="glyphicon glyphicon-save-file"></span></span>
                            <span class="input-group-addon refresh"><span title="cencel" class="glyphicon glyphicon-refresh"></span></span>
                        </div>
                    </li>
                    <li>
                        <div class="newPass">
                            <label>new password</label> &nbsp;<i class="errMsg"></i>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <p id="hideMe" class="form-control"></p>
                                <input name="newPass" type="password" id="newPass" class="newPass form-control" placeholder="your new password">
                                <span class="input-group-addon edit"><span title="edit" class="glyphicon glyphicon-pencil"></span></span>
                                <span class="input-group-addon save"><span title="save" class="glyphicon glyphicon-save-file"></span></span>
                                <span class="input-group-addon refresh"><span title="cencel" class="glyphicon glyphicon-refresh"></span></span>
                            </div>
                        </div>
                        <div id="oldPassDiv">
                            <label>please verify your old password</label> <i class="errOldPass"></i>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input name="oldPass" type="password" id="oldPass" class="showMe form-control oldPass" placeholder="your old password">
                                <span class="input-group-addon ck"><span title="check" class="glyphicon glyphicon-check ckOldPass"></span></span>
                            </div>
                        </div>
                        <p class="wrongPass">wrong password, please try again!</p>
                    </li>
                </ul>
            </form>
        </div>
        <script src="js/my_script.js"></script>
        <script>
            //edit img & save to DB......(see less part on 'editInformation.js');
            function showTheImg(ev) {
                var formId = document.getElementById("user");
                var formData = new FormData(formId);
                var type = formData.get("showImg")["type"];
                var typeProcess = type.slice(6, type.length).toLowerCase();
                var size = formData.get("showImg")["size"];
                var patt = /^(jpeg|jpg|png|gif)$/;
                if (!patt.test(typeProcess)) {
                    alert("pls choose a picture !");
                }
                else if (size > 2e+6) {
                    alert("pls choose in 2mb");
                }
                else {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL(ev.target.files[0]);
                    fileReader.onload = function () {
                        $(".uEditImage").attr("src", fileReader.result);
                    };
                }
            }
            $(".saveImg").on("click",function(){
                $.post("obj_editInformation_editUser.php",{img:"ck image"},function(data){
                    var runningImg=$(".uEditImage").attr("src");
                    var runningImgProc=runningImg.slice(7,runningImg.length).toLowerCase();
                    if(runningImgProc===data){
                        alert("pls change the image !");
                    }
                    else{
                        var formId = document.getElementById("user");
                        var formData = new FormData(formId);
                        $.ajax({
                        url: "obj_editInformation_editUser.php",
                        type: "POST",
                        contentType: false,
                        async: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            var success=data.substring(0,21);
                            var srcName=data.substr(21,data.length);
                            var patt=/^(updated successfully!)$/;
                            if(patt.test(success)){
                               $(".uEditImage").attr("src","images/"+srcName);
                               $(".errImgMsg").text(success).css({"color":"green"}).fadeIn(3000,function(){
                                   $(this).fadeOut(4000);
                               });
                            }
                            else{
                                $(".errImgMsg").text("sorry something wronged!").css({"color":"red"}).fadeIn(3000,function(){
                                   $(this).fadeOut(4000);
                               });
                            }
                        }
                    });
                    }
                });
            });
            $(".refreshImg").on("click",function(){
                $.post("obj_editInformation_editUser.php",{img:"ck image"},function(data){
                    $(".uEditImage").attr("src","images/"+data);
                });
            });
        </script>
    </body>
</html>
