<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ckFile</title>
        <script src="js/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <p id="demo"></p>
        <script>
            (function ($) {
                $(function () {
                    $(window).on("storage", function (event) {
                        setTimeout(function () {// It is important, if it not used after refresh the index.php page this page redirected !
                            if (localStorage.getItem("Identy") != "logInSuccess") {
                                window.location.href = "http://localhost/shopping_cart/view/shopping/index.php";
                            }
                        }, 1000);
                    });
                });
            }(jQuery));
        </script>
    </body>
</html>
