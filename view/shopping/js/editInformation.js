(function ($) {
    $(function () {
        //for show all user information
        userInformation();
        function userInformation() {
            $.ajax({
                url: "obj_editInformation_editUser.php",
                type: "POST",
                cache: false,
                data: {user: "userInformation"},
                beforeSend: function () {
                },
                success: function (data) {
                    var DBinfo = JSON.parse(data);
                    $.ajax({
                        url: "country.txt",
                        type: "POST",
                        cache: false,
                        data: {},
                        beforeSend: function () {
                        },
                        success: function (country) {
                            var bra = "{";
                            var len = country.split(",");
                            for (var i = 0; i < len.length; i++) {
                                var lenProcess = len[i].split(":");
                                bra += ('"' + lenProcess[0] + '":' + lenProcess[1] + ",").replace(/(\r\n|\n\r)/gm, "");
                            }
                            bra = bra.substr(0, bra.length - 1);
                            bra += "}";
                            var json = JSON.parse(bra);
                            $(".uEditImage").attr("src","images/"+DBinfo[0]["uImage"]);
                            $(".uEditName").text(DBinfo[0]["uName"].charAt(0).toUpperCase() + DBinfo[0]["uName"].slice(1));
                            $(".uEditEmail").text(DBinfo[0]["uEmail"]);
                            $(".uEditCountry").text(json[DBinfo[0]["uWorld"]]);
                            $("p.uEditCountry").attr("data-country", DBinfo[0]["uWorld"]);
                        }
                    });
                }
            });
        }
        //convert p tag to input tag
        $(".edit").on("click", function (event) {
            event.preventDefault();
            var xyz = $(this).parent().find("#hideMe").text();
            $(this).parent().find("#hideMe").css({"display": "none"});
            $(this).parent().find("#showMe").css({"display": "block"}).val(xyz);
            $(this).parent().find("#uWorld").css({"display": "block"});
            $(this).parent().find("#newPass").parent().parent().slideUp("slow");
            $(this).parent().find("#newPass").parent().parent().next().css({"display": "block"});
        });
        $(".refresh").on("click", function () {
            $(this).parent().find("#hideMe").css({"display": "block"});
            $(this).parent().find("#showMe").css({"display": "none"});
            $(this).parent().find("#newPass").css({"display": "none"});
            $(this).parent().find("#uWorld").css({"display": "none"});
        });
        $(".ck").on("click", function () {
            $(this).parent().find("#oldPass").parent().parent().css({"display": "none"});
            $(this).parent().find("#oldPass").parent().parent().prev().find("#newPass").css({"display": "block"});
            var oldPass = $(this).parent().find("input").val();
            $.ajax({//throw old password to check
                url: "obj_editInformation_editUser.php",
                type: "POST",
                cache: false,
                data: {pass: oldPass},
                beforeSend: function () {
                },
                success: function (data) {
                    if (data === "success") {
                        $("#newPass").next().css({"border-color": "#CCCCCC"});
                        $("#oldPass").parent().parent().prev().slideDown("slow");
                    }
                    else {
                        $(".wrongPass").fadeIn("slow");
                        setTimeout(function () {
                            $(".wrongPass").fadeOut("slow", function () {
                                $("#oldPassDiv").css({"display": "block"});
                            });
                        }, 1000);
                    }
                }
            });
        });
        //img edit and save to DB.....(see less part on 'editInformation.php' showTheImg() and .saveImg);
        $(".editImg").on("click",function(){
            var imgInput=$(this).parentsUntil("li").find("input");
            console.log(imgInput);
            $(imgInput).trigger("click");
        });

        //collect new data and save in DB........
        $(".save").on("click", function (event) {
            event.preventDefault();
            $(".edit").css({"border-color": "#CCCCCC"});
            var inputValue = $(this).parent().find("input:visible,select:visible").val();
            if (typeof inputValue === "undefined") {
                $(this).prev().css({"border-color": "red"});
                alert("pls click on edit then save");
            }
            else {
                ckValueUnique(event.target);
            }
        });
        function ckValueUnique(ev) {
            var arr = ["uEditName", "uEditEmail", "world", "uEditCountry", "newPass"];
            var ck = $(ev).parentsUntil("li").find("p").attr("data-country");
            var valTag = "";
            if (typeof ck !== "undefined") {
                valTag = $(ev).parentsUntil("li").find("p").attr("data-country");
            }
            else {
                valTag = $(ev).parentsUntil("li").find("p").text();
            }
            var valInput = $(ev).parentsUntil("li").find("input:visible,select:visible").val();
            var inputField = $(ev).parentsUntil("li").find("input:visible,select:visible")[0]["classList"];
            for (var i = 0; i < arr.length; i++) {
                for (var j = 0; j < inputField.length; j++) {
                    if (arr[i] === inputField[j]) {
                        if (valTag === valInput) {
                            alert("pls change the field !");
                        }
                        else {
                            var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                            if ((arr[i] === "uEditEmail") && !patt.test(valInput)) {
                                alert("pls input valid Email !");
                            }
                            else if ((arr[i] === "world") && valInput === "noData") {
                                alert("pls select any country !");
                            }
                            else {
                                $.ajax({
                                    url: "obj_editInformation_editUser.php",
                                    type: "POST",
                                    cache: false,
                                    data: {editUser: valInput, pastInfo: arr[i]},
                                    beforeSend: function () {
                                    },
                                    success: function (data) {
                                        var patt=/updated successfully!/;
                                        if(patt.test(data)){
                                            userInformation();
                                            $(".refresh").trigger("click");
                                             $(ev).parent().parent().parent().find(".errMsg").text(data).css({"color":"green"}).fadeIn(2000,function(){
                                                 $(this).fadeOut(4000);
                                             });
                                        }
                                        else{
                                            $(ev).parent().parent().parent().find(".errMsg").text("sorry something went wronged!").css({"color":"red"}).fadeIn(2000,function(){
                                                 $(this).fadeOut(4000);
                                             });
                                        }
                                    }
                                });
                            }
                        }
                    }
                }
            }
        }
    });
}(jQuery));