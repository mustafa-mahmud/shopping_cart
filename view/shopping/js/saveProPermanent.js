(function ($) {
    $(function () {
        $(".samePerma").on("click", function () {
            //first ck login.....
            if (localStorage.getItem("Identy") === "logInSuccess") {
                var proImg = [];
                var proName = [];
                var proPrice = [];
                var proQuantity = [];
                var proTotal = [];
                $(".modal-body #clonePro .dataSave").each(function () {
                    proImg.push($(this).find("td").eq(0).find("img").attr("src").substr(61, this.length));
                    proName.push($(this).find("td").eq(1).html());
                    proPrice.push($(this).find("td").eq(2).html().substr(0, $(this).find("td").eq(2).html().length - 1));
                    proQuantity.push($(this).find("td").eq(3).find(".howMany").html());
                    proTotal.push($(this).find("td").eq(5).html().substr(0, $(this).find("td").eq(5).html().length - 1));
                });
                if (proQuantity.length > 0) {
                    //ck product name with DB for prevent duplicating;
                    var uniquicArr = [];
                    for (var i = 0; i < proName.length; i++) {
                        if (uniquicArr.indexOf(proName[i]) === -1) {
                            uniquicArr.push(proName[i]);
                        }
                        ;
                    }
                    $.post("saveProPermanent.php", {proCk: uniquicArr}, function (data, sts) {
                        if (sts === "success") {
                            if (data !== "") {
                                alert("these products already added-> "+data);
                            }
                            else {
                                $.ajax({//ck product quantity
                                    type: "GET",
                                    url: "saveProPermanent.php",
                                    data: {data: proImg, data2: proName, data3: proPrice, data4: proQuantity, data5: proTotal},
                                    beforeSend: function () {
                                    },
                                    success: function (html) {
                                        var str = "insert successfully";
                                        if (html.match(str)) {
                                            alert("your product saved successfully, please see your profile");
                                        }
                                        else {
                                            alert(html);
                                        }
                                    }
                                });
                            }
                        }
                    });
                }
                else {
                    alert("Please select any product !");
                }
            }
        });
    });
}(jQuery));