(function ($) {
    $(function () {
        $("i[class^='log']").fadeOut();
        $("#logEmail").blur(function () {
            logEmailCk();
        });
        $("#logPass").blur(function () {
            logPassCk();
        });
        function logEmailCk() {
            var logEmailVal = ($("#logEmail").val()).trim();
            var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (patt.test(logEmailVal) === true) {
                $(".logEmailErr").css({"color": "red"}).fadeOut("slow");
                $("#logEmail").css({"border-color": "green"});
                return true;
            }
            else {
                $(".logEmailErr").css({"color": "red"}).fadeIn("slow");
                $("#logEmail").css({"border-color": "red"});
                return false;
            }
        }
        function logPassCk() {
            var logPasslVal = ($("#logPass").val()).trim();
            if (logPasslVal.length > 0) {
                $(".logPassErr").fadeOut("slow");
                $("#logPass").css({"border-color": "green"});
                return true;
            }
            else {
                $(".logPassErr").css({"color": "red"}).fadeIn("slow");
                $("#logPass").css({"border-color": "red"});
                return false;
            }
        }
        $(".login").on({
            click: function (event) {
                event.preventDefault();
                if (logEmailCk() && logPassCk()) {
                    var logData = new FormData($("#logForm")[0]);
                    $.ajax({
                        type: "POST", //FormData() only supprot POST;
                        url: "objectLogIn.php",
                        data: logData,
                        cache: false,
                        async: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                        },
                        success: function (response) {
                            var patt = /^confrimation is pending. please check your email$/;
                            if (patt.test(response)) {
                                $(".logMainErr").text("* " + response + " and click on the link!").css({"color": "red"}).fadeIn("slow");
                                return false;
                            }
                            else if (response === "NULL" || response === "") {
                                $(".logMainErr").text("* email or password is wrong!").css({"color": "red"}).fadeIn("slow");
                                return false;
                            }
                            else {
                                $("i[class^='log']").fadeOut();
                                document.getElementById("logForm").reset();
                                window.location.href = "http://localhost/shopping_cart/view/shopping/index.php";
                                return true;
                            }
                        }
                    });
                }
                else {
                    return false;
                }
            }
        });
    });
}(jQuery));