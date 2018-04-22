(function ($) {
    $(function () {
        var form = {};
        var name = "";
        var email = "";
        var image = "";
        var passNew = "";
        var passOld = "";
        var select = "";
        //member edit form input verification
        function nameVerify() {//name verification
            let patt = /^[a-z\sA-Z0-9]+$/;
            if (name.length > 0 && patt.test(name)) {
                $(form[0]).css({"border-color": "#ced4da"});
                $(".errAllShow").fadeOut("slow").text("");
                return true;
            } else {
                $(form[0]).css({"border-color": "red"});
                $(".errAllShow").fadeIn("slow").text("name must any Alphabetical char withour Symbal");
                return false;
            }
        }

        function emailVerify() {//email verifictaion
            let patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (email.length > 0 && patt.test(email)) {
                $(form[3]).css({"border-color": "#ced4da"});
                $(".errAllShow").fadeOut("slow").text("");
                return true;
            } else {
                $(form[3]).css({"border-color": "red"});
                $(".errAllShow").fadeIn("slow").text("please input valid email");
                return false;
            }
        }

        function imageVerify() {//images verification
            if (typeof image !== "undefined") {
                let type = image["type"].substring(6).toLowerCase();
                let pattType = /^(jpg|jpeg|gif|png)$/;
                if (pattType.test(type) && image["size"] < 2e+6) {
                    $(form[2]).css({"border-color": "#ced4da"});
                    $(".errAllShow").fadeOut("slow").text("");
                    return true;
                } else {
                    $(form[2]).css({"border-color": "red"});
                    $(".errAllShow").fadeIn("slow").text("only image supported and in 2mb size");
                    return false;
                }
            } else {
                return true;
            }
        }

        function selectVerify() {//select verification
            if (select.length > 0 && select !== "null") {
                $(form[5]).css({"border-color": "#ced4da"});
                $(".errAllShow").fadeOut("slow").text("");
                return true;
            } else {
                $(form[5]).css({"border-color": "red"});
                $(".errAllShow").fadeIn("slow").text("please select any country");
                return false;
            }
        }

        function passVerify() {//password verification
            if (passNew.length > 0 || passOld.length > 0) {//parent if
                if (passNew.length < 1) {
                    $(form[9]).css({"border-color": "red"});
                    $(form[10]).css({"border-color": "#ced4da"});
                    $(".errAllShow").fadeIn("slow").text("please give new password");
                    return false;
                } else if (passOld.length < 1) {
                    $(form[10]).css({"border-color": "red"});
                    $(form[9]).css({"border-color": "#ced4da"});
                    $(".errAllShow").fadeIn("slow").text("please give confirm password");
                    return false;
                } else {
                    if (passNew === passOld) {
                        $(form[9]).css({"border-color": "#ced4da"});
                        $(form[10]).css({"border-color": "#ced4da"});
                        $(".errAllShow").fadeOut("slow").text("");
                        return true;
                    } else {
                        $(form[10]).css({"border-color": "red"});
                        $(".errAllShow").fadeIn("slow").text("confirm password does not matched");
                        return false;
                    }
                }
            } else {//parent else
                $(form[9]).css({"border-color": "#ced4da"});
                $(form[10]).css({"border-color": "#ced4da"});
                return true;
            }
        }

        $(".save").on("click", function () {
            name = $("#name").val();
            email = $("#email").val();
            image = $("input[type='file']")[0].files[0];
            passNew = $("input[name='newPass']").val();
            passOld = $("input[name='oldPass']").val();
            select = $("#country :selected").val();
            form = $("#userEdit").get(0);
            //call all function for verifying
            if (nameVerify() && emailVerify() && imageVerify() && selectVerify() && passVerify()) {

            }
        });
    });
}(jQuery));


