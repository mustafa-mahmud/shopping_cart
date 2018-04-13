(function ($) {
    $(function () {
        $("body").on("click",".panel-title", function () {
            $(".collapse").on('show.bs.collapse', function () {
                $(this).parent().find(".panel-title").addClass("myOwns");
            });
            $(".collapse").on('hide.bs.collapse', function () {
               $(this).parent().find(".panel-title").removeClass("myOwns");
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
                        var dataProcess = JSON.parse(data);
                        for (var i = 0, len = dataProcess.length; i < len; i++) {
                            if (getting.indexOf(dataProcess[i]["userProductCreated"]) === -1) {
                                getting.push(dataProcess[i]["userProductCreated"]);
                            }
                        }
                        if (getting.length > 0) {
                            function getGEt() {
                                var def = $.Deferred();
                                for (var j = 0, lent = getting.length; j < lent; j++) {
                                    $.get("panel.txt", function (data) {
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
                            function makeTr() {
                                for (var m = 0, n = getting.length; m < n; m++) {
                                    for (var k = 0, lents = dataProcess.length; k < lents; k++) {
                                        if (getting[m] === dataProcess[k]["userProductCreated"]) {
                                            $(".proDate").each(function () {
                                                if (getting[m] === $(this).text()) {
                                                    var tableInfo = $(this).parent().parent().parent().parent().parent().find(".panel-collapse").find("tbody");
                                                    tableInfo.prepend("<tr>" + "<td><img src='images/products/" + dataProcess[k]["userProductImg"] + "'></td>" + "<td>" + dataProcess[k]["userProductName"] + "</td>" + "<td>" + dataProcess[k]["userProductPrice"] + "$" + "</td>" + "<td>" + dataProcess[k]["userProductQuantity"] + "</td>" + "<td>" + dataProcess[k]["userProductTotal"] + "$" + "</td>" + "</tr>");
                                                }
                                            });
                                        }
                                    }
                                }
                            }
                            $.when(getGEt()).then(function () {
                                return makeTr();
                            });
                        }
                    }
                }
            });
    });
}(jQuery));
