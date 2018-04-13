(function ($) {
    $(function () {
        //default...............
        $(".sign").click(function () {
            if (uNameCk() && uEmailCk() && uCountryCk() && uPassCk() && uConPassCk() && uGenderCk()) {
                $(".sign").attr("success","okays");
            }
            else {
                uNameCk() ; uEmailCk() ;uCountryCk() ; uPassCk() ; uConPassCk() ; uGenderCk();
                return false;
            }
        });
        $("i[class^='err']").fadeOut();
        //name validation;
        $("#uName").blur(function () {
            uNameCk();
        });
        $("#uEmail").blur(function () {
            uEmailCk();
        });
        $("#uWorld").change(function () {
            uCountryCk();
        });
        $("#uPass").keyup(function () {
            uPassCk();
            var errConPass = $(".errConPass").text();
            if (errConPass === "passwords are matched") {
                uConPassCk();
            }
            if (errConPass === "* confirm password does not match with password !") {
                uConPassCk();
            }
        });
        $("#uConPass").keyup(function () {
            uConPassCk();
        });
        $("#uGender").change(function () {
            uGenderCk();
        });
        function uNameCk() {
            var uNameVal = ($("#uName").val()).trim();
            var patt = /^[\sa-zA-Z]+$/;
            var uNameValCk = patt.test(uNameVal);
            if (uNameValCk === true) {
                $("#uName").css({"border-color": "green"});
                $(".errName").fadeOut("slow");
                return true;
            }
            else {
                $("#uName").css({"border-color": "red"});
                $(".errName").text("* only charectar are allow").css({"color": "red"}).fadeIn("slow");
                return false;
            }
        }
        //email validation;
        function uEmailCk() {
            var uEmailVal = ($("#uEmail").val()).trim();
            var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var uEmailValCk = patt.test(uEmailVal);
            if (uEmailValCk === true) {
                $("#uEmail").css({"border-color": "green"});
                $(".errEmail").fadeOut("slow");
                return true;
            }
            else {
                $("#uEmail").css({"border-color": "red"});
                $(".errEmail").text("* valid email are allow").css({"color": "red"}).fadeIn("slow");
                return false;
            }
        }
        //country validation;
        function uCountryCk() {
            var country = $("#uWorld").val();
            if (country !== "noData") {
                $("#uWorld").css({"border-color": "green"});
                $(".errCountry").fadeOut("slow");
                return true;
            }
            else {
                $("#uWorld").css({"border-color": "red"});
                $(".errCountry").text("* please select any country").css({"color": "red"}).fadeIn("slow");
                return false;
            }
        }
        //pass validation;
        function uPassCk() {
            var uPassVal = ($("#uPass").val()).trim();
            var patt = /(?=.*[\d])(?=.*[a-zA-Z])[\da-zA-Z]{5,}$/;
            var uPassValCk = patt.test(uPassVal);
            if (uPassValCk === true) {
                $("#uPass").css({"border-color": "green"});
                $(".errPass").fadeOut("slow");
                return uPassVal;
            }
            else {
                $("#uPass").css({"border-color": "red"});
                $(".errPass").text("* must '1 Num' + '1 Char' it must atleast 5 Char").css({"color": "red"}).fadeIn("slow");
                return false;
            }

        }
        //confirm pass validation;
        function uConPassCk() {
            var uConPassVal = ($("#uConPass").val()).trim();
            var uPassValCk = uPassCk();
            if (uConPassVal === uPassValCk) {
                $("#uConPass").css({"border-color": "green"});
                $(".errConPass").text("passwords are matched").css({"color": "green"}).fadeIn("slow");
                return true;
            }
            else {
                $("#uConPass").css({"border-color": "red"});
                $(".errConPass").text("* confirm password does not match with password !").css({"color": "red"}).fadeIn("slow");
                return false;
            }
        }
        //gender validation;
        function uGenderCk() {
            var uuGenderVal = $("#uGender").val();
            if (uuGenderVal !== "noGender") {
                $("#uGender").css({"border-color": "green"});
                $(".errGender").fadeOut("slow");
                return true;
            }
            else {
                $("#uGender").css({"border-color": "red"});
                $(".errGender").text("* please select any gender").css({"color": "red"}).fadeIn("slow");
                return false;
            }
        }
    });
}(jQuery));