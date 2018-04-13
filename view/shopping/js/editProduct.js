(function ($) {
    $(function () {
        $(window).on("click", function (event) {
            var len = $(event.target).closest(".editProducts").length;
            if (len === 0) {
                var upZero = $("body").find(".editSave:visible").length;
                if (upZero > 0) {
                    $("body").find(".no").addClass("borderMk");
                    $("body").find(".yes").addClass("borderMk");
                }
                else {
                    $("body").find(".no").removeClass("borderMk");
                    $("body").find(".yes").removeClass("borderMk");
                }
            }
        });
        $("body").on("click", ".panel-title2", function () {
            $(".collapse").on('show.bs.collapse', function () {
                $(this).parent().find(".panel-title2").addClass("myOwns");
            });
            $(".collapse").on('hide.bs.collapse', function () {
                $(this).parent().find(".panel-title2").removeClass("myOwns");
            });
        });
        //user product shows......
        $.ajax({
            url: "saveProPermanent.php",
            type: "POST",
            cache: false,
            data: {show: "give me data"},
            beforeSend: function () {
            },
            success: function (data) {
                var str = /^you did not save any product yet !$/;
                if (str.test(data)) {
                    alert(data);
                }
                else {
                    var getting = [];
                    dataProcess = JSON.parse(data);
                    for (var i = 0, len = dataProcess.length; i < len; i++) {
                        if (getting.indexOf(dataProcess[i]["userProductCreated"]) === -1) {
                            getting.push(dataProcess[i]["userProductCreated"]);
                        }
                    }
                    if (getting.length > 0) {
                        function getGEt() {
                            var def = $.Deferred();
                            for (var j = 0, lent = getting.length; j < lent; j++) {
                                $.get("editProduct.txt", function (data) {
                                    $("#accordion").append(data);
                                    $(".proDate").each(function (index) {
                                        var tableInfo = $(this).parent().parent().parent().parent().parent().find(".panel-collapse");
                                        $(this).text(getting[index]);//show data on .proDate
                                        $(this).parent().parent().find("a").attr("href", "#collapse" + index);
                                        tableInfo.attr("id", "collapse" + index);
                                        //get Quantity & Dollars and put on '.proTotal' & '.proAmount'
                                        var zero = 0;
                                        var dollar = 0;
                                        for (var x = 0; x < dataProcess.length; x++) {
                                            if (getting[index] === dataProcess[x]["userProductCreated"]) {
                                                zero += parseInt(dataProcess[x]["userProductQuantity"]);
                                                dollar += parseInt(dataProcess[x]["userProductTotal"]);
                                            }
                                            $(this).parent().find(".proTotal").text("Quantity : " + zero);
                                            $(this).parent().find(".proAmount").text("Dollars : " + dollar + " $");
                                            tableInfo.find("tbody").find("tr#permanentCal").find(".totalPro").text(zero);
                                            tableInfo.find("tbody").find("tr#permanentCal").find(".totalAmo").text(dollar + "$");
                                        }
                                    });
                                    def.resolve();
                                });
                            }
                            return def.promise();
                        }
                        function makeTr2() {
                            for (var m = 0, n = getting.length; m < n; m++) {
                                for (var k = 0, lents = dataProcess.length; k < lents; k++) {
                                    if (getting[m] === dataProcess[k]["userProductCreated"]) {
                                        $(".proDate").each(function () {
                                            if (getting[m] === $(this).text()) {//=====This is Main Table Information Distributed Area=====
                                                var tableInfo = $(this).parent().parent().parent().parent().parent().find(".panel-collapse").find("tbody");
                                                tableInfo.prepend("<tr data-date='" + dataProcess[k]["userProductCreated"] + "'>" + "<td><img src='images/products/" + dataProcess[k]["userProductImg"] + "'></td>" + "<td>" + dataProcess[k]["userProductName"] + "</td>" + "<td>" + dataProcess[k]["userProductPrice"] + "$" + "</td>" + "<td class='quan'>" + "<i class='addMinus'>" + dataProcess[k]["userProductQuantity"] + "</i>" + "<span>" + "<i class='up fa fa-angle-double-up'></i>" + "<i class='down fa fa-angle-double-down'></i>" + "</span>" + "</td>" + "<td><span class='del glyphicon glyphicon-trash'></span></td>" + "<td>" + dataProcess[k]["userProductTotal"] + "$" + "</td>" + "</tr>");
                                            }
                                        });
                                    }
                                }
                            }
                        }
                        $.when(getGEt()).then(function () {
                            return makeTr2();
                        });
                    }
                }
            }
        });
        //calculating edit products.............
        $("body").on("click", ".up", function (event) {
            event.stopPropagation();
            increment(event.target);//i
            calQuantity(event.target);
            subTotal(event.target);
            totalBalance(event.target);
        });
        $("body").on("click", ".down", function (event) {
            event.stopPropagation();
            decrement(event.target);//i
            calQuantity(event.target);
            subTotal(event.target);
            totalBalance(event.target);
        });
        function increment(ev) {//i
            var up = parseInt($(ev).parent().parent().text());//i span td;
            up += 1;
            $(ev).parent().parent().find(".addMinus").text(up);
        }
        function decrement(ev) {//i
            var down = parseInt($(ev).parent().parent().text());//i span td;
            if (down > 1) {
                down += -1;
            }
            $(ev).parent().parent().find(".addMinus").text(down);
        }
        function calQuantity(ev) {//i
            var quantity = 0;
            $(ev).parent().parent().parent().parent().find("tr:not(.permCal)").each(function (index) {
                quantity += parseInt($(this).find(".quan").find(".addMinus").text());
            });
            $(ev).parent().parent().parent().parent().find(".permCal").find(".totalPro").text(parseInt(quantity));
            $(ev).parentsUntil(".panel-group").find(".panel-heading").find(".proTotal").text("Quantity : " + quantity);
        }
        //delete one specific tr
        $("body").on("click", ".del", function (event) {
            totalBalance(event.target);
            var proQuan = parseInt($(this).parentsUntil("tbody").find(".addMinus").text());
            var proQuan2 = parseInt($(this).parentsUntil("table").find(".totalPro").text());
            $(this).parentsUntil("table").find(".totalPro").text(proQuan2 - proQuan);
            var quantity = parseInt($(this).parentsUntil("table").find(".totalPro").text());
            $(this).parentsUntil(".panel-group").find(".proTotal").text("Quantity " + quantity);
            $(event.target).parentsUntil(".panel-group").find(".panel-heading").find(".editSave").animate({opacity: "1"}).css({"display": "block"});
            $(".menuLi").addClass("list-group-item disabled");
            removed(event.target);
        });
        function removed(ev) {
            if ($(ev).parent().parent().parent().find("tr:not(.permCal)").length < 2) {
//                $(ev).parentsUntil(".panel-group").remove();
            }
            $(ev).parent().parent().remove();
        }
        function subTotal(ev) {
            var allTr = $(ev).parentsUntil("tbody").find("td");
            var price = parseInt(allTr.eq(2).text());
            var quantity = parseInt(allTr.eq(3).find(".addMinus").text());
            var total = parseInt(allTr.eq(5).text());

            for (var z = 0, len = ev["classList"].length; z < len; z++) {
                if (ev["classList"][z] === "up") {
                    var bal = parseInt(price * quantity);
                    allTr.eq(5).text(bal + "$");
                }
                else if (ev["classList"][z] === "down") {
                    if (quantity > 0 && total !== price) {
                        var bal2 = parseInt(total - price);
                        allTr.eq(5).text(bal2 + "$");
                    }
                }
            }
            ;
        }
        function totalBalance(ev) {
            if (ev["classList"][0] === "del") {
                var totalBal = parseInt($(ev).parentsUntil("table").find("tr.permCal").find("td:last").text());
                var delVal = parseInt($(ev).parent().parent().find("td").eq(5).text());
                $(ev).parentsUntil("table").find("tr.permCal").find("td:last").text(totalBal - delVal + "$");
            }
            else {
                var allAmount = 0;
                $(ev).parentsUntil("table").find("tr:not(.permCal)").each(function (index) {
                    allAmount += parseInt($(this).find("td:last").text());
                });
                $(ev).parentsUntil("table").find("tr.permCal").find("td:last").text(allAmount + " $");
            }
            var balance = $(ev).parentsUntil("table").find("tr.permCal").find("td:last").text();
            $(ev).parentsUntil(".panel-group").find(".panel-heading").find(".proAmount").text("Dollars : " + balance);
        }
        // work on .editSave .no .yes.....
        $("body").on("click", ".up,.down", function (event) {
            $(event.target).parentsUntil(".panel-group").find(".panel-heading").find(".editSave").animate({opacity: "1"}).css({"display": "block"});
            $(".menuLi").addClass("list-group-item disabled");
        });
        $("body").on("click", ".no", function (event) {
            $.when(no(event.target)).then(function () {
                return ckYesNoAlive();
            });
        });
        $("body").on("click", ".yes", function (event) {
            $.when(yes(event.target)).then(function () {
                return ckYesNoAlive();
            });
        });
        function no(ev) {
            var def = $.Deferred();
            var tableInfo = $(ev).parentsUntil(".panel-group").find("tbody");
            $(ev).parentsUntil(".panel-group").find(".panel-heading").find(".editSave").animate({opacity: "0"}).css({"display": "none"});
            var proDate = $(ev).parentsUntil(".panel-group").find(".panel-heading").find(".proDate").text();
            tableInfo.find("tr:not(.permCal)").remove();
            var totalDollars = 0;
            var totalQuantity = 0;
            for (var i = 0, len = dataProcess.length; i < len; i++) {
                if (proDate == dataProcess[i]["userProductCreated"]) {
                    tableInfo.prepend("<tr>" + "<td><img src='images/products/" + dataProcess[i]["userProductImg"] + "'></td>" + "<td>" + dataProcess[i]["userProductName"] + "</td>" + "<td>" + dataProcess[i]["userProductPrice"] + "$" + "</td>" + "<td class='quan'>" + "<i class='addMinus'>" + dataProcess[i]["userProductQuantity"] + "</i>" + "<span>" + "<i class='up fa fa-angle-double-up'></i>" + "<i class='down fa fa-angle-double-down'></i>" + "</span>" + "</td>" + "<td><span class='del glyphicon glyphicon-trash'></span></td>" + "<td>" + dataProcess[i]["userProductTotal"] + "$" + "</td>" + "</tr>");
                    totalDollars += parseInt(dataProcess[i]["userProductTotal"]);
                    totalQuantity += parseInt(dataProcess[i]["userProductQuantity"]);
                }
            }
            $(ev).parentsUntil(".panel-group").find("td.totalAmo").text(totalDollars + " $");
            $(ev).parentsUntil(".panel-group").find("td.totalPro").text(totalQuantity);
            $(ev).parentsUntil(".panel-group").find("span.proTotal").text("Quantity : " + totalQuantity);
            $(ev).parentsUntil(".panel-group").find("span.proAmount").text("Dollars : " + totalDollars + " $");
            def.resolve();
            return def.promise();
        }
        function yes(ev) {
            var def = $.Deferred();
            var trData = $(ev).parentsUntil(".panel-group").find("tbody").find("tr:not(.permCal)");
            var dateGet = $(ev).parentsUntil(".panel-group").find(".panel-title").find(".proDate").text();
            var proUpdata = [];
            var mainPro = [];//all data will be stored here......OK
            var len = $(trData).length;
            var len2 = 0;
            for (var i = 0; i < len; i++) {
                $(trData).eq(i).each(function (index) {
                    len2 = $(this).find("td").length;
                    for (var j = 0; j < len2; j++) {
                        proUpdata.splice(j, len2, $(this).find("td").eq(j).text());
                    }
                    proUpdata.splice(0, 1);
                    proUpdata.splice(1, 1);
                    proUpdata.splice(2, 1);
                    proUpdata.unshift(dateGet);
                    mainPro.push(proUpdata.concat());
                });
            }
            if (mainPro.length === 0) {
                mainPro.push(dateGet + "full");
            }
            $.ajax({//product edit and update and delete
                type: "POST",
                url: "saveProPermanent.php",
                cache: false,
                data: {proDuct: mainPro},
                beforeSend: function () {
                },
                success: function (data) {
                    console.log(data);
                }
            });
            $(ev).parentsUntil(".panel-group").find(".panel-heading").find(".editSave").animate({opacity: "0"}).css({"display": "none"});
            $(ev).parentsUntil(".panel-group").find(".panel-heading").find(".saved").animate({opacity: "1"}).css({"display": "block"});
            setTimeout(function () {
                $(ev).parentsUntil(".panel-group").find(".panel-heading").find(".saved").animate({opacity: "0"}).css({"display": "none"});
                def.resolve();
            }, 1500);
            return def.promise();
        }
        function ckYesNoAlive() {
            var len = $("body").find(".editSave:visible").length;

            if (len === 0) {
                $(".menuLi").removeClass("list-group-item disabled");
                $(".editProduct").removeClass("proMenuDes2");
            }
            else {
                $(".menuLi").addClass("list-group-item disabled");
                $(".editProduct").addClass("proMenuDes2");
            }
        }
    });
}(jQuery));