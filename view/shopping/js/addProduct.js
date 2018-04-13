(function ($) {
    $(function () {
        $("body").on("click", ".inc", function (event) {
            incre(event.target);
            subTotal(event.target);
        });
        $("body").on("click", ".dec", function (event) {
            decr(event.target);
            subTotal(event.target);
        });
        $("body").on("click", ".delete", function (event) {
            delProduct(event.target);
            editLocalStorage(event.target);
        });
        $(".button--bubble").on("click", function (event) {
            addPro(event.target);
        });
        $(".cart").on("click", function () {
            var serial = 0;
            var currentValue = 0;
            $("tbody").find("tr:not(#calculation)").each(function () {
                serial += parseInt($(this).find(".howMany").text());
                currentValue += parseInt($(this).find("td").eq(5).text());
            });
            balance = 0;
            incDec = 0;
            totalProduct(serial);
            totalSubTotal(currentValue);
        });
        //bell ringing......
        $(".ckBell").on("click", function () {
            mainNotifyBell();
        });
        //below code work after product store in localStorage......;
//        clearAllStorage();
        $(".saveTemp").on("click", function () {
            $.when(saveProduct()).then(function () {
                if (JSON.parse(localStorage.getItem("savePro")) !== null) {
                    saveCountMsg();
                }
            });
        });
        if (JSON.parse(localStorage.getItem("savePro")) !== null) {
            saveCountMsg();
        }
        $("#msg").on("click", function () {
            $(this).next().addClass("myPop");
            $("#msg").next().find(".popover-content").css({"cursor": "pointer"});
        });
        $("body").on("click", ".myPop", function () {
            var currValue = 0;
            var sli = 0;
            $.when(msgUpdate()).then(function () {
                $("tbody").find(".saved").each(function () {
                    sli += parseInt($(this).find(".howMany").text());
                    currValue += parseInt($(this).find("td").eq(5).text());
                });
                incDec = 0;
                balance = 0;
                totalProduct(sli);
                totalSubTotal(currValue);
            });
        });
    });
}(jQuery));