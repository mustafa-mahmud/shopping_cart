(function ($) {
    $(function () {
        $("button").on({
            click: function (event) {
                event.preventDefault();
            }
        });
        //get user DB data for user form...........
        function getDataUser() {

        }
        $("#userUpdate").on({
            "keyup": function () {
                console.log("keyup");
                let val = parseInt($(this).val());
                if (isNaN(val) === true) {
                    $("#userUpdate").tooltip("show");
                    $("#userUpdate").focus();
                } else {
                    $("#userUpdate").tooltip("hide");
                }
            }
        });
        $(".active").on("click", function () {
            console.log("click");
            let val = parseInt($("#userUpdate").val());
            if (val > 0 && isNaN(val) === false) {//number and not blank
                $("#userUpdate").tooltip("hide");
                //work start here.............
            } else {
                $("#userUpdate").tooltip("show");
                $("#userUpdate").focus();
            }
        });
        //image show when choosen..........
        $("input[type='file']").on("change", function () {
            var imgData = $(this)[0].files[0];
            var reader = new FileReader();
            //read imgData as url
            reader.readAsDataURL(imgData);
            //load reader
            reader.onload = function () {
                $("#userImg").attr("src", reader.result);
            };
        });
        //process country.txt for select tag.........
        $.post("country.txt", function (data, status) {
            if (status === "success") {
                var arrPush = [];
                var removeComma = data.replace(/["]/gm, "");
                var removeN = removeComma.replace(/\r\n|\n\r/gm, "");
                var arrMake = removeN.split(",");
                for (let i = 0; i < arrMake.length; i++) {
                    let splitClone = arrMake[i].split(":");
                    let firstPart = splitClone[0].replace(splitClone[0], "\"" + splitClone[0].trim() + "\"");
                    let secondPart = splitClone[1].replace(splitClone[1], "\"" + splitClone[1].trim() + "\"");
                    if (i === 0) {
                        arrPush.push("{" + firstPart + ":" + secondPart);
                    } else if ((arrMake.length - 1) === i) {
                        arrPush.push(firstPart + ":" + secondPart + "}");
                    } else {
                        arrPush.push(firstPart + ":" + secondPart);
                    }
                }
                var join = arrPush.join();
                var parse = JSON.parse(join);
                //country proccess has been completed, not put then into select options tag
                let value = "";
                for (value in parse) {
                    $("<option/>").attr("value", value).text(parse[value]).appendTo("select[name='country']");
                }
            }
        });
    });
}(jQuery));