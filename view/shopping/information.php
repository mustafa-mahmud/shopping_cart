<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Information Page</title>
    </head>
    <body>
        <h1 class="headed">Information</h1>
        <div class="informationPage" menu="information">
            <ul>
                <li class="infoName">User Name : &nbsp;<i></i></li>
                <li class="infoEmail">Email : &nbsp;<i></i></li>
                <li class="infoCountry">Country : &nbsp;<i></i></li>
                <li class="infoAcc infoAcc2">Account Created : &nbsp;<i></i></li>
                <li class="infTotal">Total Saved Products : &nbsp;<i></i></li><!---update info from here to below--->
                <li class="infoPrices">Total Saved Prices : &nbsp;<i></i></li>
                <li class="infoOrders">Total Orders : &nbsp;<i></i></li>
                <li class="infoToOrPr">Total Orders Prices : &nbsp;<i></i></li>
            </ul>
        </div>
        <script>
            $(function ($) {
                $(function () {
                    $.ajax({
                        url: "obj_ForAll_ClassForAll.php",
                        type: "POST",
                        cache: false,
                        data: {information: "showAll"},
                        beforeSend: function () {
                        },
                        success: function (data) {
                            var allInfo = JSON.parse(data);
                            var name=allInfo[0][0]["uName"];
                            var nameProcess=name.charAt(0).toUpperCase();
                            var nameFinal=nameProcess+name.substr(1,name.length);
                            $(".infoName i").text(nameFinal);
                            $(".infoEmail i").text(allInfo[0][0]["uEmail"]);
                            $.post("country.txt",function(data,sts){
                                if(sts==="success"){
                                    var allData="{";
                                    var len=data.split(",");
                                    for(var i=0;i<len.length;i++){
                                        var curr=len[i].split(":");
                                        allData+=('"'+curr[0]+'":'+curr[1]+",").replace(/\r\n|\n\r/gm,"");
                                    }
                                    allData=allData.substr(0,allData.length-1);
                                    allData+="}";
                                    var country=JSON.parse(allData);
                                    $(".infoCountry i").text(country[allInfo[0][0]["uWorld"]]);
                                }
                            });
                            $(".infoAcc2 i").text(allInfo[0][0]["created"]);
                            var proCal=0;
                            for(var j=0;j<allInfo[1].length;j++){
                                proCal+=parseInt(allInfo[1][j]["userProductQuantity"]);
                            }
                            $(".infTotal i").text(proCal);
                            var proPrice=0;
                            for(var k=0;k<allInfo[1].length;k++){
                                proPrice+=parseInt(allInfo[1][k]["userProductTotal"]);
                            }
                            $(".infoPrices i").text(proPrice+"$");
                            $(".infoOrders i").text("0");
                            $(".infoToOrPr i").text("0$");
                        }
                    });
                });
            }(jQuery));
        </script>
    </body>
</html>
