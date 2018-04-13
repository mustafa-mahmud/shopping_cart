//needed var;
var balance = 0;
var incDec = 0;
//bell ring function;
function mainNotifyBell() {
    var bellRing = document.getElementById("bellring");
    $(".mainNotify").addClass("shadow-pulse");
    bellRing.play();
    setTimeout(function () {
        bellRing.pause();
        $(".mainNotify").removeClass("shadow-pulse");
    }, 5000);
}
//localStorage relative functions;
function saveProduct() {
    var deferred = $.Deferred();
    var data = [];
    var sli = 0;
    if ($("tbody").find(".dataSave").length > 0 && $("tbody").find(".saved").length === 0) {
        $("tbody").find(".dataSave").each(function () {
            var add = ("<tr class='saved' data-serial=" + sli + ">" + $(this).html() + "</tr>");
            data.push(add);
            sli++;
            deferred.resolve();
        });
    }
    else if ($("tbody").find(".saved").length > 0 && $("tbody").find(".dataSave").length === 0) {
        if ($("tbody").find("tr:visible")) {
            $("tbody").find(".saved").each(function () {
                var add = ("<tr class='saved' data-serial=" + sli + ">" + $(this).html() + "</tr>");
                data.push(add);
                sli++;
                deferred.resolve();
            });
        }
    }
    else {
        if ($("tbody").find("tr:visible")) {
            $("tbody").find("tr:not(#calculation)").each(function () {
                localStorage.removeItem("savePro");
                $("#msg").attr("data-content", "you saved " + 0 + " products !");
                var add = ("<tr class='saved' data-serial=" + sli + ">" + $(this).html() + "</tr>");
                data.push(add);
                sli++;
                deferred.resolve();
            });
        }
    }
    var myJson = JSON.stringify(data);
    localStorage.setItem("savePro", myJson);
    return deferred.promise();
}
function editLocalStorage(ev) {
    var inc = 0;
    var serial = $(ev).parent().parent()[0]["attributes"][1]["nodeValue"];
    var parseValue = JSON.parse(localStorage.getItem("savePro"));
    parseValue.filter(function () {
        if (parseValue[inc].includes("data-serial=" + serial) === true) {
            var delIndex = parseValue.indexOf(parseValue[inc]);
            parseValue.splice(delIndex, 1);
        }
        inc++;
    });
    var myJSN = JSON.stringify(parseValue);
    localStorage.setItem("savePro", myJSN);
    saveCountMsg();
}
function ckSave(data) {
    localStorage.setItem("ckData", data);
}
function callStorage(call) {
    return JSON.parse(localStorage.getItem(call));
}
function removeStorage(remove) {
    localStorage.removeItem(remove);
}
function clearAllStorage() {
    localStorage.clear();
}
//product add+delete relative functions;
function saveCountMsg() {
    var rows = 0;
    var allData = JSON.parse(localStorage.getItem("savePro"));
    for (var inc = 0; inc < allData.length; inc++) {
        rows += allData[inc].match(/<tr class='saved'/g).length;
    }
    $("#msg").text(rows).css({"background": "red"});
    $("#msg").attr("data-content", "you saved " + rows + " products !");
}
function msgUpdate() {
    var deferred = $.Deferred();
    var str = $("#msg").attr("data-content");
    if (str !== "No Saved Products") {
        var allSaved = parseInt($("#clonePro").find("tr:visible").closest(".dataSave").length);
        var noSaved = parseInt($("#clonePro").find("tr:not(#calculation)").length);
        if (allSaved === 0 && noSaved !== 0) {
            alert("your saved product in red marked!");
            $("#clonePro").find(".saved").css({"background": "red"});
            setTimeout(function () {
                $("#clonePro").find(".saved").css({"background": "#0760B8"});
                deferred.resolve();
            }, 2000);
        }
        else {
            $("#clonePro").find("tr:not(#calculation)").fadeOut("slow", function () {
                $(this).remove();
                deferred.resolve();
            });
            $("#clonePro").prepend(callStorage("savePro"));
            deferred.resolve();
        }
    }
    return deferred.promise();
}
function addPro(ev) {
    var itemPro = $(ev).offsetParent().offsetParent().find(".item").html();
    var obj = $.parseHTML(itemPro);
    var price = parseInt(obj[7]["innerText"].substr(8));
    //Dynamically store producte;
    var tdImage = "<td>" + "<img src=" + obj[1]['src'] + ">" + "</td>";
    var tdName = "<td>" + obj[4]["innerText"].substr(6) + "</td>";
    var tdPrice = "<td>" + price + "$" + "</td>";
    var tdQuantity = "<td class='quantify'>" + "<span class='glyphicon glyphicon-plus inc'></span>" + "&nbsp;&nbsp;" + "<i class='howMany'>" + 1 + "</i>" + "&nbsp;&nbsp;" + "<span class='glyphicon glyphicon-minus dec'></span>" + "</td>";
    var tdDelete = "<td>" + "<span class='glyphicon glyphicon-trash delete'></span>" + "</td>";
    var tdSubTotal = ("<td>" + price + "$" + "</td>");
    $("#clonePro").prepend(("<tr class='dataSave'>" + tdImage + tdName + tdPrice + tdQuantity + tdDelete + tdSubTotal + "</tr>"));
}
function incre(ev) {//ev work like $(this) //here is problem........
    var quint = parseInt($(ev).parent().find(".howMany").text());
    var len = $(ev).parent().parent().find("td").eq(2).text().length;
    var priceVal = parseInt($(ev).parent().parent().find("td").eq(2).text().substr(0, len - 1));
    quint += 1;
    $(ev).parent().find(".howMany").text(quint);
    totalProduct(+1);
    totalSubTotal(priceVal);
}
function decr(ev) {//ev work like $(this)  //here is problem........
    var quint = parseInt($(ev).parent().find(".howMany").text());
    var len = $(ev).parent().parent().find("td").eq(2).text().length;
    var priceVal = parseInt($(ev).parent().parent().find("td").eq(2).text().substr(0, len - 1));
    quint -= 1;
    if (quint > 0) {
        $(ev).parent().find(".howMany").text(quint);
        totalProduct(-1);
        totalSubTotal(-priceVal);
    }
}
function subTotal(ev) {//ev work like $(this)
    var len = ($(ev).parentsUntil("tbody").find("td").eq(2).text()).length;
    var price = parseInt(($(ev).parentsUntil("tbody").find("td").eq(2).text()).substr(0, len - 1));
    var quan = parseInt($(ev).parent().find(".howMany").text());
    var balanceSub = parseInt(price * quan);
    $(ev).parentsUntil("tbody").find("td").eq(5).text(balanceSub + "$");
}
function delProduct(ev) {//ev work like $(this)
    var pro = parseInt($(ev).parent().parent().find("td").eq(3).text());
    var len = $(ev).parent().parent().find("td").eq(5).text().length;
    var delPrice = parseInt($(ev).parent().parent().find("td").eq(5).text().substr(0, len - 1));
    $(ev).parentsUntil("tbody").remove(".dataSave").fadeOut("slow");
    $(ev).parentsUntil("tbody").remove(".saved").fadeOut("slow");
    totalProduct(-pro);
    totalSubTotal(-delPrice);

}
function totalProduct(ev) {//ev is product quantity;
    incDec += ev;
    $(".totalPro").text(incDec);
}
function totalSubTotal(ev) {//ev store price value;
    balance += ev;
    $("tbody").find(".totalAmo").text(balance + "$");
}
//responsiveness function............
function ckRemoveClass(ev) {
    var at = $(ev).attr("class").split(" ");
    var blankArr = [];
    var patt = /^my_col/;
    for (var i = 0; i < at.length; i++) {
        if (patt.test(at[i])) {
            blankArr.push(at[i]);
        }
    }
    return blankArr.join(" ");
}

