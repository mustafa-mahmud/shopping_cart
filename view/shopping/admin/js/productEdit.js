(function ($) {
    setTime = "";
    function allData() {
        let deferred = $.Deferred();
        $.ajax({
            url: "objectAll.php",
            type: "POST",
            cache: false,
            data: {give: "all"},
            beforeSend: function () {},
            success: function (data) {
                let json = JSON.parse(data);
                let serial = 0;
                let firstRadio = 0;
                let secondRadio = 0;
                for (let value of json) {
                    $("<tr>", {
                        "html": $("<td/>", {
                            "text": serial += 1,
                            "DB": value.productId
                        }).add($("<td/>", {
                            "class": "img",
                            "html": $("<img/>", {
                                "src": "images/" + value.image
                            })
                        })).add($("<td>", {
                            "text": value.name
                        })).add($("<td/>", {
                            "text": value.price
                        })).add($("<td>", {
                            "class": "status",
                            "data-update": "",
                            "html": $("<div/>", {
                                "html": $("<div/>", {
                                    "class": "form-check ckBox",
                                    "html": $("<label/>", {
                                        "status": value.status,
                                        "class": "form-check-label yes",
                                        "html": $("<input/>", {
                                            "type": "radio",
                                            "name": firstRadio += 1,
                                            "class": "form-check-input"
                                        }).add($("<span/>", {
                                            "class": "myRadio",
                                            "html": $("<i/>", {
                                                "class": "fa fa-check"
                                            })
                                        }))
                                    })
                                }).add($("<div/>", {
                                    "class": "form-check ckBox",
                                    "html": $("<label/>", {
                                        "class": "form-check-label no",
                                        "html": $("<input/>", {
                                            "type": "radio",
                                            "name": secondRadio += 1,
                                            "class": "form-check-input"
                                        }).add($("<span/>", {
                                            "class": "myRadio",
                                            "html": $("<i/>", {
                                                "class": "fa fa-check"
                                            })
                                        }))
                                    })
                                }))
                            })
                        })).add($("<td/>", {
                            "class": "del checkbox",
                            "html": $("<label/>", {
                                "class": "singleDel",
                                "html": $("<input/>", {
                                    "type": "checkbox",
                                    "name": "singleDelCk"
                                }).add($("<span/>", {
                                    "class": "singleDelDesign",
                                    "html": $("<i/>", {
                                        "class": "fa fa-check"
                                    })
                                }))
                            })
                        })).add($("<td/>", {
                            "class": "edit",
                            "data-toggle": "modal",
                            "data-target": "#productEdit",
                            "html": $("<span/>", {
                                "class": "fa fa-pencil-alt"
                            })
                        }))
                    }).appendTo("tbody");
                }
                $(".yes").each(function () {
                    if ($(this).attr("status") === "yes") {
                        $(this).find("input").prop("checked", true);
                    }
                    if ($(this).attr("status") === "no") {
                        $(this).parentsUntil(".status").find(".no").find("input").prop("checked", true);
                    }
                });
                $(".yes").append("Yes");
                $(".no").append("No");
                deferred.resolve();
            }
        });
        return deferred.promise();
    }
    //used $.Deferred()
    $.when(allData()).then(function () {
        getTr = "";
        name = "";
        price = "";
        imgName = "";
        ckAllDel = false;
        getDB = "";

        function ckTrLength() {
            let len = $("tbody").find("tr").length;
            if (len < 1) {
                $("#saveButton").animate({"right": "-125px"}, 1000);
                $("input[name='deleteAll']").prop("checked", false);
                $(".selectDelAll").addClass("delAllNotAllowd").on("click", function (event) {
                    event.preventDefault();
                    alert("There is no Data");
                });
            } else {
                $(".selectDelAll").removeClass("delAllNotAllowd");
            }
        }
        ckTrLength();

        $("[name='deleteAll']").on("click", function () {
            let check = ($(this).is(":checked")) ? "checked" : "not";
            if (check === "checked") {
                $(".singleDel").find("input[type='checkbox']").prop('checked', true);//checked by prop()
            } else {
                $(".singleDel").find("input[name='singleDelCk']").prop('checked', false);//unchecked by prop()
            }
        });

        function trData(ev) {
            getTr = ev;
            var tr = $(ev.target).closest("tr");
            getDB = $(tr).find("td").eq(0).attr("db");
            name = $(tr).find("td").eq(2).text();
            price = $(tr).find("td").eq(3).text();
            var src = $(tr).find("img").attr("src");

            $("#change").attr("src", src);
            $("[name='proNameEdit']").val(name);
            $("[name='price']").val(price);
        }

        $("body").on("click", ".edit", function (event) {
            $("#saveMsg").fadeOut();
            let src = $(this).parents().eq(0).find("td.img").find("img").attr("src");
            imgName = src.substring(7);
            trData(event);
        });
        $(".thumbnail").on("click", function () {
            $("#proImg").trigger("click");
        });
        $("#proImg").on("change", function () {
            showImg();
        });
        $("#reset , .close").on("click", function () {
            document.getElementById("proImg").value = "";
            trData(getTr);
        });
        $(".deleteAll").on("click", function () {
            ckAllDel = $(this).prop("checked");
        });

        function showSaveCancelButton() {
            let lenTr = $("tbody").find("tr").length;
            if (lenTr > 0) {
                let right = parseInt($("#saveButton").css("right"));
                if (right === (-125)) {
                    $("#saveButton").animate({"right": "0px"}, 1000);
                }
            }
        }

        $(document).on("change", "input[type='radio']", showSaveCancelButton)
                .on("click", "input[name='singleDelCk']", showSaveCancelButton)
                .on("click", "input[name='deleteAll']", showSaveCancelButton);


        $(".status").find("input[type='radio']").on("click", function () {
            $(this).closest(".status").attr("data-update", "up");//add 'date-update' where 'click' on
        });

        function updataData() {
            let delData = [];
            let upData = [];
            let statusData = [];

            $("input[name='singleDelCk']").each(function () {
                let trueDel = $(this).prop("checked");
                let dbDel = $(this).closest("tr").find("td").eq(0).attr("db");
                if (trueDel) {
                    delData.push(dbDel);
                }
            });
            $("td[data-update='up']").find(".yes").find("input").each(function () {
                let trueUp = $(this).prop("checked");
                let dbUp = $(this).closest("tr").find("td").eq(0).attr("db");
                if (delData.indexOf(dbUp) === -1) {
                    statusData.push(trueUp ? "yes" : "no");
                    upData.push(dbUp);
                }
            });

            var multiData = {"del": delData, "up": upData, "status": statusData};

            function updateDelUp() {
                $.ajax({
                    type: "POST",
                    url: "objectAll.php",
                    cache: false,
                    async: false,
                    data: {update: multiData},
                    beforeSend: function () {},
                    success: function (data) {

                        let patt = /^success Del Up$/g;
                        var bool = false;
                        if (patt.test(data)) {
                            $("input[name='deleteAll']").prop("checked", false);
                            $("#saveButton").animate({"right": "-125px"}, 500);
                            let delLen = multiData.del.length;
                            for (let i = 0; i < delLen; i++) {
                                $("tbody").find("tr").each(function () {
                                    $(this).find("td").eq(0).each(function () {
                                        let db = $(this).attr("db");
                                        if (db === multiData.del[i]) {
                                            $(this).closest("tr").remove();//delete 'tr'   
                                        }
                                    });
                                });
                                bool = true;
                            }
                            if (bool) {
                                let lenTr = $("tbody").find("tr").length;
                                let serial = 0;
                                if (lenTr > 0) {
                                    $("tbody").find("tr").each(function () {
                                        $(this).find("td").eq(0).text(serial += 1);
                                    });
                                }
                            }

                        } else {
                            alert("sorry something went wrong!");
                        }
                    }
                });
                ckTrLength();
            }
            updateDelUp();
        }

        $("#saveAll").on("click", function () {
            updataData();
        });

        $("#cancelAll").on("click", function () {
            $("#saveButton").animate({"right": "-125px"}, 250, function () {
                location.reload(true);
            });
        });

        $("#save").on("click", function () {
            if (showImg() && verifyName() && verifyPrice()) {//all data is |OK
                const formName = document.getElementById("proUpdate");
                var formData = new FormData(formName);
                formData.append("key", "productEdit");
                formData.append("DB", getDB);
                $.ajax({
                    url: "objectAll.php",
                    type: "POST",
                    cache: false,
                    async: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function () {},
                    success: function (data) {// |OK

                        ckTrLength();
                        $("#saveButton").animate({"right": "-125px"}, 1000);
                        $("input[name='deleteAll']").prop("checked", false);
                        let Json = JSON.parse(data);
                        let patt = /^something wrong !$/g;
                        if (data.match(patt) === null) {
                            $("#saveMsg").text("saved successfully").css({"color": "green"}).fadeIn(2000, function () {
                                $(".close").trigger("click");
                                $("tbody").find("tr").each(function () {
                                    $(this).find("td").eq(0).each(function () {
                                        let db = $(this).attr("db");
                                        if (getDB === db) {
                                            let ck = $(this).parent();
                                            ck.find("td").addClass("borderClass");
                                            setTimeout(function () {
                                                ck.find("td").removeClass("borderClass");
                                            }, 3000);
                                            ck.find("td").eq(1).find("img").attr("src", "images/" + Json[0]["image"]);
                                            ck.find("td").eq(2).text(Json[0]["name"]);
                                            ck.find("td").eq(3).text(Json[0]["price"]);
                                            return false;
                                        }
                                    });
                                });
                            });
                        } else {
                            $("#saveMsg").text("something wrong, pls try again").css({"color": "red"}).fadeIn(2000, function () {
                                $("#saveMsg").fadeOut();
                            });
                        }
                    }
                });
            } else {
                return false;
            }
        });
        $("input[name='proNameEdit']").on("focusout", function () {
            verifyName();
        });
        $("input[name='price']").on("focusout", function () {
            verifyPrice();
        });

        function showImg() {//show image + verify for DB
            if (typeof (document.querySelector("#proImg").files[0]) === "undefined") {
                return true;
            }
            var view = document.querySelector("#change");
            var imgData = document.querySelector("#proImg").files[0];//used below
            let imgNames = imgData.name;
            let reader = new FileReader();
            let patt = /^(jpg|jpeg|gif|png)$/;
            let pattSize = 2e+6;
            let type = imgData.type.substring(6).toLowerCase();
            let size = imgData.size;
            if (imgName !== imgNames) {
                if (patt.test(type) && size <= pattSize) {
                    $(".errImg").fadeOut();
                    reader.readAsDataURL(imgData);//imgData - see up to Code
                    reader.addEventListener("load", function () {
                        view.src = reader.result;
                    });
                    return true;
                } else {
                    $(".errImg").fadeIn();
                    return false;
                }
            } else {
                $(".errImg").fadeOut();
                return true;
            }
        }

        function verifyName() {//verify name for DB
            let names = $("input[name='proNameEdit']").val();
            let patt = /^(\w+)$/;
            if (name !== names) {
                if (patt.test(names)) {
                    $(".errName").fadeOut();
                    //before send all the data, check prodcut name with DB;
                    $.post("objectAll.php", {proNameEdit: names}, function (data, status) {
                        let patt = /^Sorry already exists product!$/g;
                        if (data.match(patt) !== null) {
                            $(".errNameExists").fadeIn();
                        } else {
                            $(".errNameExists").fadeOut();
                        }
                    });
                    return true;
                } else {
                    $(".errNameExists").fadeOut();
                    $(".errName").fadeIn();
                    return false;
                }
            } else {
                $(".errName").fadeOut();
                return true;
            }
        }

        function verifyPrice() {//verify price for DB
            let patt = /^(\d+)$/;
            let prices = $("input[name='price']").val();
            if (price !== prices) {
                if (patt.test(prices)) {
                    $(".errPrice").fadeOut();
                    return true;
                } else {
                    $(".errPrice").fadeIn();
                    return false;
                }
            } else {
                $(".errPrice").fadeOut();
                return true;
            }
        }
    });

}(jQuery));