(function ($) {
    function todayInfo() {
        $.post("objectAll.php", {today: "all"}, function (result, status) {
            if (status === "success") {
                let json = JSON.parse(result);
                $("i.pro").text(json[0]);
                $("i.pro2").text(json[1] + "$");
            }
        });
    }
    todayInfo();
    $(function () {
        //span slideDown & slideUp
        var count = 0;
        $(".boxInfo span:nth-child(1)").on("click", function () {
            count++;
            $(".pro").hide(function () {
                $(".proDown").show(function () {
                    $(this).addClass("pro");
                    $(this).text(count);
                });
            });
        });

        //'input' filed verify......................
        function nameVerify() {
            var strRet = "";
            var proValue = $("input[name='product']").val();
            if (proValue.length < 1) {//if 'input' field is blank
                $("input[name='product']").addClass("classBorder");
                $(".errName").text("pls input name!").show("slow");
                $(".verifyOk").hide("slow");
                $(".verifyWrong").hide("slow");
                //add 'disabled' attribute at 'input' except 'first' one
                $("#addProduct").find("input:not(:first,:last)").each(function (index, value) {
                    $(this).attr("disabled", "disabled");
                });
            } else {//if 'input' is not blank
                //name verify patern
                var str = proValue.trim();
                var patt = /^[\w\s]+$/gi;
                if (!patt.test(str)) {//if value in not supported
                    $("input[name='product']").addClass("classBorder");
                    $(".errName").text("only a-z and 0-9 support!").show("slow");
                    $(".verifyWrong").show("slow");
                    $(".verifyOk").hide("slow");
                    //add 'disabled' attribute at 'input' except 'first' one
                    $("#addProduct").find("input:not(:first,:last)").each(function (index, value) {
                        $(this).attr("disabled", "disabled");
                    });
                } else {//if value is supported
                    $.ajax({//verified data now ck with DB
                        type: "POST",
                        url: "objectAll.php",
                        cache: false,
                        data: {proName: proValue},
                        beforeSend: function () {
                        },
                        success: function (html) {
                            if (html === "add") {//if value is not in DB
                                $("input[name='product']").removeClass("classBorder");
                                $(".errName").hide();
                                $(".verifyWrong").hide("slow");
                                $(".verifyOk").show("slow");
                                //remove all 'input disabled' attributes
                                $("#addProduct").find("input:not(:first,:last)").each(function (index, value) {
                                    $(this).removeAttr("disabled");
                                });
                                //now value is OK........
                                strRet = true;
                            } else {//if value is in DB
                                //add 'disabled' attribute at 'input' except 'first' one
                                $("input[name='product']").addClass("classBorder");
                                $(".errName").hide();
                                $(".verifyOk").hide("slow");
                                $(".verifyWrong").show("slow");
                                $("#addProduct").find("input:not(:first,:last)").each(function (index, value) {
                                    $(this).attr("disabled", "disabled");
                                });
                                return false;
                            }
                        },
                        async: false
                    });
                }
            }
            return strRet;
        }

        function priceVerify() {
            var priceValue = $("input[name='price']").val();
            if ($("input[name='price']").is("[disabled]") === false) {//if 'input' field is no disabled
                if (priceValue.length < 1) {//if 'input' field is blank
                    $("input[name='price']").addClass("classBorder");
                    $(".errPrice").text("pls input price!").show("slow");
                } else {//if 'input' is not blank
                    var str = priceValue.trim();
                    var patt = /^[\d]+$/;//price verify patern
                    if (!patt.test(str)) {//if value in not supported
                        $("input[name='price']").addClass("classBorder");
                        $(".errPrice").text("only 0-9 support!").show("slow");
                    } else {
                        $("input[name='price']").removeClass("classBorder");
                        $(".errPrice").text("only 0-9 support!").hide("slow");
                        //now value is OK......
                        return true;
                    }
                }
            }
        }

        function addDisabled() {
            $("#allProductInfo").find("input:not(:first,:last)").attr("disabled", "disabled");
            $(".errName").text("successfully inserted!").css({"color": "green"}).show();
            document.getElementById("allProductInfo").reset();
            $(".custom-file-label").text("Choose image");
            $(".verifyOk").hide();
            setTimeout(function () {
                $(".errName").text("successfully inserted!").css({"color": "red"}).hide();
            }, 1000);
        }

        function imageVerify(ev) {
            var imgInfo = (typeof ev !== 'undefined') ? ev : "no";
            if (imgInfo === "no") {
                $(".errImg").text("pls select any image !").show();
                return false;
            } else {
                $(".errImg").text("pls select any image !").hide();
            }
            var proImgInfo = imgInfo.type.substr(6, imgInfo.type.length);
            var patt = /^(jpg|jpeg|gif|png)$/gi;

            if (!patt.test(proImgInfo)) {//if type not supported
                $(".errImg").text("only image support !").show();
                $(".custom-file-label").text("Choose image");
            } else {
                $(".custom-file-label").text(imgInfo.name);
                $(".errImg").text("only image support !").hide();
                //size verify
                if (imgInfo.size > 2e+6) {//if image up to 2mb
                    $(".errImg").text("choose in 2mb !").show();
                    $(".custom-file-label").text("Choose image");
                } else {
                    $(".errImg").text("choose in 2mb !").hide();
                    //all is ok.....
                    return true;
                }
            }
        }

        $("input[name='product']").on("keydown", function (event) {
            if (event.which === 9 || event.which === 13) {
                nameVerify();
            }
        });

        $("input[name='saveImg']").on("change", function () {
            imageVerify(this.files[0]);
        });

        //click on 'submit' input filed
        $("input[name='submit']").on("click", function (event) {
            event.preventDefault();
            var imgInfo = "";
            if (!$("input[name='saveImg']").is("[disabled]")) {//input type='file' data send for verify
                imgInfo = $("input[name='saveImg']")[0].files[0];
            }
            if (nameVerify() && priceVerify() && imageVerify(imgInfo)) {//if 3 functions is true
                var allData = document.getElementById("allProductInfo");//here start work...........
                var getCheckedValue = $(".form-check-label").find("button").attr("aria-pressed");
                if (getCheckedValue === "true") {//give value for 'checkbox'
                    var checked = "true";
                }
                var formData = new FormData(allData);
                formData.append("ck", checked);
                $.ajax({
                    type: "POST",
                    url: "objectAll.php",
                    cache: false,
                    async: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function () {
                    },
                    success: function (data) {
                        var patt = /failed/g;
                        if (!patt.test(data)) {//if value 'inserted' successfully
                            todayInfo();
                            var parseJson = JSON.parse(data);
                            var len = $("tbody").find("tr").length;
                            var last = "";
                            if (len > 0) {
                                last = parseInt($("tbody").find("tr:first").find("td:first").text()) + 1;
                            } else {
                                last = 1;
                            }
                            var sl = ("<td>" + last + "</td>");//serial
                            var img = ("<td>" + "<img src='images/" + parseJson[0]["image"] + "'>" + "</td>");//image
                            var name = ("<td>" + parseJson[0]["name"] + "</td>");//name
                            var price = ("<td>" + parseJson[0]["price"] + "</td>");//price
                            $("tbody").prepend("<tr>" + sl + img + name + price + "</tr>");//all implement
                            addDisabled();
                            $("[name='product']").focus();
                            $(".form-check-label").find("button").removeClass("active");
                        } else {//if value 'failed' to inserted
                            $(".errName").text("successfully inserted!").css({"color": "green"}).hide();
                            $(".msgShow").text("sorry failed to upload image, try another !");
                            $("form+button").trigger("click");
                        }
                    }
                });
            }
        });
    });
}(jQuery));