(function ($) {
    $(function () {
        //uppercase first character of <th>;
        $("th").each(function () {
            let word = $(this).text();
            let firstCharacter = word.charAt(0);
            $(this).text(word.replace(firstCharacter, firstCharacter.toUpperCase()));
        });
        //first value for <tbody><tr> from DB
        function firstValue() {
            $.ajax({
                type: "POST",
                url: "memberObject.php",
                cache: false,
                async: false,
                data: {allData: "member"},
                beforeSend: function () {},
                success: function (data) {
                    let Json = JSON.parse(data);
                    if (Json.length > 0) {

                        for (let i = 0; i < Json.length; i++) {
                            $("<tr/>", {
                                "html": $("<td/>", {
                                    "class": "serial",
                                    "text": (i < 10) ? "0" + i : i,
                                    "user-id":Json[i]["singUpId"],
                                    "data-add": i
                                }).add($("<td/>", {
                                    "class": "name",
                                    "text": Json[i]["uName"]
                                })).add($("<td/>", {
                                    "class": "img",
                                    "html": $("<img>", {
                                        "src": "images/" + Json[i]["uImage"]
                                    })
                                })).add($("<td/>", {
                                    "class": "email",
                                    "text": Json[i]["uEmail"]
                                })).add($("<td/>", {
                                    "class": "country",
                                    "text": Json[i]["uWorld"]
                                })).add($("<td/>", {
                                    "class": "pass",
                                    "text": Json[i]["uPass"]
                                })).add($("<td/>", {
                                    "class": "gender",
                                    "text": Json[i]["uGender"]
                                })).add($("<td/>", {
                                    "class": "confirm",
                                    "text": Json[i]["confirm"]
                                })).add($("<td/>", {
                                    "class": "status",
                                    "text": Json[i]["status"]
                                })).add($("<td/>", {
                                    "class": "created",
                                    "text": Json[i]["created"]
                                })).add($("<td/>", {
                                    "class": "ip",
                                    "text": Json[i]["userIp"]
                                })).add($("<td/>", {
                                    "class": "lastLogin",
                                    "text": Json[i]["lastLogin"]
                                }))
                            }).appendTo("tbody");

                        }
                    }
                }
            });
        }
        firstValue();

        //cross button making
        $(".cross").on({
            mouseenter: function () {
                let visible = $(".line2:visible").length;
                if (visible > 0) {
                    $("div[class^='line']").addClass("classHover");
                }
            },
            mouseleave: function () {
                $("div[class^='line']").removeClass("classHover");
            }
        });
        $(".cross").on("click", function () {
            $(".rightSideBar").toggleClass("rightSideBarToggle");
            let visible = $(".line2:visible").length;
            if (visible > 0) {
                $(".line1").addClass("rotateLine1");
                $(".line3").addClass("rotateLine3");
                $(".line2").css({"display": "none"});
            } else {
                $(".line1").removeClass("rotateLine1");
                $(".line3").removeClass("rotateLine3");
                $(".line2").css({"display": "block"});
            }
        });
        //if input filled for active/deactive/delete
        $("#userUpdate").on("keyup", function () {
            var borderClass = $("tbody").find(".borderMake").length;
            $("#myMain").animate({scrollTop: 0});
            if (borderClass > 0) {
                $("tbody").find("tr").removeClass("borderMake");
            }
            let inputVal = parseInt($(this).val());
            $(".serial").each(function (index, element) {
                let data_add = parseInt($(this).attr("data-add"));
                if (inputVal === data_add) {
                    var scrollOff = parseInt($(this).offset().top);
                    var processScroll = (scrollOff > 0) ? scrollOff : 0;
                    $("#myMain").animate({scrollTop: processScroll});
                    $(this).parent().addClass("borderMake");
                }
            });
        });
    });
}(jQuery));