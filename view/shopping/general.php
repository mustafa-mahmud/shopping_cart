<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>General Information on user</title>
    </head>
    <body>
        <h1 class="headed">General</h1>
        <div class="generalPage" menu="general">
            <ul>
                <li class="avator DBimg"><img class="img-thumbnail" src=""></li>
                <li class="userName infoName">Name : &nbsp;<i></i></li>
                <li class="lastVisited infoLastLogin">Last Visited : &nbsp;<i></i></li>
                <li class="hailFrom infoCountry">Hail From : &nbsp;<i></i></li>
            </ul>
        </div>
        <script>
            (function ($) {
                $(function () {
                    $.ajax({
                        url: "obj_ForAll_ClassForAll.php",
                        type: "POST",
                        cache: false,
                        data: {general: "userInfo"},
                        beforSend: function () {
                        },
                        success: function (data) {
                            var userData = JSON.parse(data);
                            var name = userData[0]["uName"];
                            var namePro = name.charAt(0).toUpperCase();
                            var nameOk = namePro + name.slice(1, name.length);
                            $(".DBimg img").attr("src", "images/" + userData[0]["uImage"]);
                            $(".infoName i, .name").text(nameOk);
                            $(".infoLastLogin i,.created").text(userData[0]["lastLogin"]);
                            $.post("country.txt", function (data, status) {
                                if (status === "success") {
                                    var len=data.split(",");
                                    var process="{";
                                    for(var i=0;i<len.length;i++){
                                        var current=len[i].split(":");
                                        process+=('"'+current[0]+'":'+current[1]+",").replace(/\r\n|\n\r/gm,"");
                                    }
                                    process=process.substr(0,process.length-1);
                                    process+="}";
                                    var country=JSON.parse(process);
                                    $(".infoCountry i").text(country[userData[0]["uWorld"]]);
                                }
                            });
                        }
                    });
                });
            }(jQuery));
        </script>
    </body>
</html>
