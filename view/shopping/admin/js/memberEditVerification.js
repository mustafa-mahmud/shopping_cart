document.body.innerHTML = document.body.innerHTML.replace(/(<(pre|script|style|textarea)[^]+?<\/\2)|(^|>)\s+|\s+(?=<|$)/g, "$1$3");
(function ($) {
    $(function () {
        var form = {};
        var name = "";
        var email = "";
        var image = "";
        var passNew = "";
        var passOld = "";
        var select = "";
        var gender = "";
        var emailConfirmation = "";
        var status = "";
        var show = "";
        //store all data for checking is there any edited
        function getEmailStatus() {//here we changed 'gender,emailConfirmation,status' from on to 'male/female/others,Yes/no,Active/Inactive'
            gender = document.querySelectorAll("input[name='gender']");
            gender.forEach(function (elements) {
                if (elements["checked"]) {
                    gender = elements.previousSibling.previousSibling.innerText;
                }
            });
            emailConfirmation = document.querySelectorAll("input[name='emailConfirmation']");
            emailConfirmation.forEach(function (elements) {
                if (elements["checked"]) {
                    emailConfirmation = elements.previousSibling.previousSibling.innerText;
                }
            });
            status = document.querySelectorAll("input[name='status']");
            status.forEach(function (elements) {
                if (elements["checked"]) {
                    status = elements.previousSibling.previousSibling.innerHTML;
                }
            });
        }
        function ifCkecked(value) {//we are changing 'FormData()' value by  function getEmailStatus()
            if (value[0] === "gender") {
                value[1] = gender;
            }
            if (value[0] === "emailConfirmation") {
                value[1] = emailConfirmation;
            }
            if (value[0] === "status") {
                value[1] = status;
            }
        }
        $(".active").on({//here we are storing raw data.
            click: function () {
                getEmailStatus();
                let form = $("#userEdit").get(0);
                let formData = new FormData(form);
                beforeEditFrm = [];//array1
                let value;
                for (value of formData) {
                    ifCkecked(value);
                    beforeEditFrm.push(value);
                }
            }
        });
        $(".save").on({//here using object literal {}, so it is now Object
            click: function () {
                getEmailStatus();
                show = document.getElementsByClassName("errAllShow")[0];
                show.innerHTML = "Data didn't change, before click on save,change the data!";
                form = $("#userEdit").get(0);
                let formData = new FormData(form);
                afterEditFrm = [];//array2
                let value;
                for (value of formData) {
                    ifCkecked(value);
                    afterEditFrm.push(value);
                }
                //match between two arrays
                Array.prototype.myArrMatch = function (arr) {
                    return this.toString() === arr.toString();
                };
                var res = beforeEditFrm.myArrMatch(afterEditFrm);
                if (!res) {//if changed any Data
                    show.style.visibility = "hidden";
                    name = $("#name").val();
                    email = $("#email").val();
                    image = $("input[type='file']")[0].files[0];
                    passNew = $("input[name='newPass']").val();
                    passOld = $("input[name='oldPass']").val();
                    select = $("#country :selected").val();
                    //call all function for verifying
                    if (nameVerify() && emailVerify() && imageVerify() && selectVerify() && passVerify()) {
                        sendAjax();
                    }
                    return true;
                } else {//if didn't change any Data.
                    show.style.visibility = "visible";
                    return false;
                }
            }
        });
        //member edit form input verification
        function nameVerify() {//name verification
            $(form[0]).css({"border-color": "#ced4da"});
            let patt = /^[a-z\sA-Z0-9]+$/;
            if (name.length > 0 && patt.test(name)) {
                show.style.visibility = "hidden";
                return true;
            } else {
                console.log($(form[0]));
                $(form[0]).css({"border-color": "red"});
                show.innerHTML = "Name must any Alphabetical char without Symbal";
                show.style.visibility = "visible";
                return false;
            }
        }

        function emailVerify() {//email verifictaion
            $(form[3]).css({"border-color": "#ced4da"});
            let patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (email.length > 0 && patt.test(email)) {
                show.style.visibility = "hidden";
                return true;
            } else {
                $(form[3]).css({"border-color": "red"});
                show.innerHTML = "Please input valid email";
                show.style.visibility = "visible";
                return false;
            }
        }

        function imageVerify() {//images verification
            if (typeof image !== "undefined") {
                $(form[2]).css({"border-color": "#ced4da"});
                let type = image["type"].substring(6).toLowerCase();
                let pattType = /^(jpg|jpeg|gif|png)$/;
                if (pattType.test(type) && image["size"] < 2e+6) {
                    show.style.visibility = "hidden";
                    return true;
                } else {
                    $(form[2]).css({"border-color": "red"});
                    show.innerHTML = "Only image supported and in 2mb size";
                    show.style.visibility = "visible";
                    return false;
                }
            } else {
                return true;
            }
        }

        function selectVerify() {//select verification
            $(form[5]).css({"border-color": "#ced4da"});
            if (select.length > 0 && select !== "null") {
                show.style.visibility = "hidden";
                return true;
            } else {
                $(form[5]).css({"border-color": "red"});
                show.innerHTML = "Please select any country";
                show.style.visibility = "visible";
                return false;
            }
        }

        function passVerify() {//password verification
            if (passNew.length > 0 || passOld.length > 0) {//parent if
                if (passNew.length < 1) {
                    $(form[9]).css({"border-color": "red"});
                    $(form[10]).css({"border-color": "#ced4da"});
                    show.innerHTML = "Please give new password";
                    show.style.visibility = "visible";
                    return false;
                } else if (passOld.length < 1) {
                    $(form[10]).css({"border-color": "red"});
                    $(form[9]).css({"border-color": "#ced4da"});
                    show.innerHTML = "Please give confirm password";
                    show.style.visibility = "visible";
                    return false;
                } else {
                    if (passNew === passOld) {
                        $(form[9]).css({"border-color": "#ced4da"});
                        $(form[10]).css({"border-color": "#ced4da"});
                        show.style.visibility = "hidden";
                        return true;
                    } else {
                        $(form[10]).css({"border-color": "red"});
                        show.innerHTML = "Confirm password does not matched";
                        show.style.visibility = "visible";
                        return false;
                    }
                }
            } else {//parent else
                $(form[9]).css({"border-color": "#ced4da"});
                $(form[10]).css({"border-color": "#ced4da"});
                return true;
            }
        }
        function sendAjax() {
            //store img name if was not choosen by user
            let imgId = document.getElementById("userImg");
            let attVal = imgId.getAttribute("src");
            let attValProcess = attVal.substring(7);
            var getFrm = $("#userEdit").get(0);
            let formData = new FormData(getFrm);
            formData.append("imgOld", attValProcess);
            formData.append("ckFrm", "ckPurpose");
            formData.set("gender", gender);
            formData.set("emailConfirmation", emailConfirmation);
            formData.set("status", status);
            let xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function () {
                    if (xmlHttp.readyState === 4) {
                        if (xmlHttp.status === 200) {
                            location.reload();
                        }
                    }
                };
            xmlHttp.open("POST", "memberObject.php", true);
            xmlHttp.send(formData);
        }
        
        //Delete specific <tr/>
        let deleteClass=document.getElementsByClassName("delete")[0];
        deleteClass.addEventListener("click",function(){
            window.showToolTip.myToolTip(this);
            

        });
    });
}(jQuery));


