(function ($) {
    $(function () {
        $("button").on({
            click:function(event){
                event.preventDefault();
            }
        });
        //name email data get from some.txt
        $.post("some.txt", function (data, status) {
            if (status === "success") {
                //remove line break
                let removeN = data.replace(/\r\n|\n\r/gm, " ");
                //make array by sapce
                let arrRemoveN = removeN.split(" ");
                let arr = [];
                let arrObj = [];
                //make array by colone
                for (let index in arrRemoveN) {
                    arr.push(arrRemoveN[index].split(":"));
                }
                //make object
                for (let x = 0; x < arr.length; x++) {
                    let index2 = arr[x][0].trim();
                    let value2 = arr[x][1].trim();
                    if (x === 0) {
                        arrObj.push("{" + "\"" + index2 + "\"" + ":" + "\"" + value2 + "\"");
                    } else if ((arr.length - 1) === x) {
                        arrObj.push("\"" + index2 + "\"" + ":" + "\"" + value2 + "\"" + "}");
                    } else {
                        arrObj.push("\"" + index2 + "\"" + ":" + "\"" + value2 + "\"");
                    }
                }
                let join = arrObj.join();
                let parse = JSON.parse(join);
                $("input[name='name']").attr("placeholder", parse["name"]);
                $("input[name='name']").attr("data-value", parse["name"]);
                $("input[name='email']").attr("placeholder", parse["email"]);
                $("input[name='email']").attr("data-value", parse["email"]);
                //reset individual value
                $(".setPrev").on("click", function () {
                    let input = $(this).parent().prev();
                    let data_value=$(input).attr("data-value");
                    $(input).val(data_value);
                });
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
        //process country.txt for select tag.......
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