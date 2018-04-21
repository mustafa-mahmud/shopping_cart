(function ($) {
    $(function () {
        var json = "";
        $("button").on({
            click: function (event) {
                event.preventDefault();
            }
        });
        //all data distributed into 'form input'
        function formInput() {
            //user form value input
            $("#name").val(json[0]["uName"]);
            $("#userImg").attr("src", "images/" + json[0]["uImage"]);
            $("#email").val(json[0]["uEmail"]);
            $("#country").val(json[0]["uWorld"]);
            $("input[name='gender']").each(function () {//show user gender
                let genValue = $(this).attr("data-gen");
                if (genValue === json[0]["uGender"]) {
                    $(this).prop("checked", true);
                }
            });
            $("input[name='emailConfirmation']").each(function () {//show email confirmation
                let confirm = parseInt($(this).attr("data-confirm"));
                if (confirm == json[0]["confirm"]) {
                    $(this).prop("checked", true);
                }
            });
            $("input[name='status']").each(function () {//show user status
                let status = parseInt($(this).attr("data-status"));
                if (status == json[0]["status"]) {
                    $(this).prop("checked", true);
                }
            });
        }
        //get user DB data for user form...........
        function getDataUser(serial) {
            $.ajax({
                url: "memberObject.php",
                type: "POST",
                cache: false,
                async: false,
                data: {"id": serial},
                beforeSend: function () {},
                success: function (data) {// |OK
                    json = JSON.parse(data);
                    formInput();
                    $("#userForm").modal("show");
                }
            });
        }
        $("#userUpdate").on({
            "keyup": function () {
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
            $("input[name='newPass']").val("");
            $("input[name='email']").val("");
            var arr = [];
            let val = parseInt($("#userUpdate").val());
            if (val !== "" && isNaN(val) === false) {//number and not blank
                $("#userUpdate").tooltip("hide");
                $("tbody").find("tr").each(function () {
                    $(this).find("td").eq(0).each(function () {
                        let tdData = parseInt($(this).attr("data-add"));
                        arr.push(tdData);
                    });
                });
                if (arr.includes(val)) {//search is user input number available in serials
                    $("#userUpdate").tooltip("hide");
                    $("tbody").find("tr").each(function () {
                        $(this).find("td").each(function () {
                            let data_add = parseInt($(this).attr("data-add"));
                            if (val === data_add) {
                                let id = parseInt($(this).attr("user-id"));
                                getDataUser(id);
                            }
                        });
                    });
                } else {
                    $("#userUpdate").tooltip("show");
                    $("#userUpdate").focus();
                }
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

        $(".setPrev").on("click", function () {
            let input = $(this).parent().prev();
            (input[0]["id"] === "name") ? $(input).val(json[0]["uName"]) : $(input).val(json[0]["uEmail"]);
        });
        $(".reset").on({
            click: function () {
                $("select").val(json[0]["uWorld"]);
                $("input[type='file']").val("");
                formInput();
            }
        });
    });
}(jQuery));