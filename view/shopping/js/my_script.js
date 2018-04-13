//add menu #catagories_items on the products
(function ($) {
    $(document).ready(function () {
        $("#catagories").on("click", function (event) {
            $(this).hide();
            $("#catagories_items").show();
            event.stopPropagation();
        });

        $("html").on("click", function (event) {
            if (!$(event.target).closest("#catagories_items").length) {
                $("#catagories").show();
                $("#catagories_items").hide();
            }
        });

        $(".socials_icon > ul > li ").on({
            mouseover: function (event) {
                $(this).find(".animated").addClass("zoomIn");
            },
            mouseout: function (event) {
                $(this).find(".animated").removeClass("zoomIn");
            }
        });

        setTimeout(function () {
            var buyingHeight = parseInt($(".info_buying").height());
            var buyingTop = parseInt($(".info_buying").offset().top + buyingHeight);
            var busy = false;
            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() > buyingTop && busy === false) {
                    busy = true;
                    $(".info_user").addClass("bounceInLeft").css({"display": "block"});
                    $(".info_buying > ul li").addClass("bounceInRight").css({"display": "block"});
                }
            });

            var addressSocialTop = parseInt($("#my_address_social").offset().top);
            var totalClass = addressSocialTop;
            var busy2 = false;
            $(window).scroll(function () {
                $(".promoting").on({
                    mouseenter: function () {
                        $(this).find(".fa").addClass("flip").css({"background-color": "#4a235a "});
                    },
                    mouseleave: function () {
                        $(this).find(".fa").removeClass("flip").css({"background-color": "#186A3B"});
                    }
                });


                if ($(window).scrollTop() + $(window).height() > totalClass && busy2 === false) {
                    busy2 = true;
                    $("#my_address").addClass("bounceInRight").css({"display": "block"});
                    $(".img_back").addClass("bounceInRight").css({"display": "block"});
                    $(".socialism").addClass("bounceInLeft").css({"display": "block"});
                }
            });
        }, 1000);
        // function for Dynamic customize width after using margin;
        function dynamicWidth(w, b, l, r) {
            var widths = parseInt(w.outerWidth());
            var marginBoth = parseInt(widths / 100 * b);
            var marginLeft = parseInt(widths / 100 * l);
            var marginRight = parseInt(widths / 100 * r);
            if (l > 0 && r > 0 && b === 0) {
                $(w).css({"width": widths - (marginLeft + marginRight), "margin-left": marginLeft, "margin-right": marginRight});
            }
            else if (l > 0 && r === 0 && b === 0) {
                $(w).css({"width": widths - marginLeft, "margin-left": marginLeft});
            }
            else if (r > 0 && l === 0 && b === 0) {
                $(w).css({"width": widths - marginRight, "margin-right": marginRight});
            }
            else if (b > 0 && l === 0 && r === 0) {
                $(w).css({"width": widths - (marginBoth * 2), "margin-left": marginBoth, "margin-right": marginBoth});
            }
            else {
                alert("dynamicWidth say, something wrong in your margin");
            }
        }
        // coutries name for 'select' tag of signUp;
        var countries = {
            AFG: "Afghanistan",
            ALB: "Albania",
            ALG: "Algeria",
            AND: "Andorra",
            ANG: "Angola",
            ANT: "Antigua and Barbuda",
            ARG: "Argentina",
            ARM: "Armenia",
            ARU: "Aruba",
            ASA: "American Samoa",
            AUS: "Australia",
            AUT: "Austria",
            AZE: "Azerbaijan",
            BAH: "Bahamas",
            BAN: "Bangladesh",
            BAR: "Barbados",
            BDI: "Burundi",
            BEL: "Belgium",
            BEN: "Benin",
            BER: "Bermuda",
            BHU: "Bhutan",
            BIH: "Bosnia and Herzegovina",
            BIZ: "Belize",
            BLR: "Belarus",
            BOL: "Bolivia",
            BOT: "Botswana",
            BRA: "Brazil",
            BRN: "Bahrain",
            BRU: "Brunei",
            BUL: "Bulgaria",
            BUR: "Burkina Faso",
            CAF: "Central African Republic",
            CAM: "Cambodia",
            CAN: "Canada",
            CAY: "Cayman Islands",
            CGO: "Congo",
            CHA: "Chad",
            CHI: "Chile",
            CHN: "China",
            CIV: "Cote d'Ivoire",
            CMR: "Cameroon",
            COD: "DR Congo",
            COK: "Cook Islands",
            COL: "Colombia",
            COM: "Comoros",
            CPV: "Cape Verde",
            CRC: "Costa Rica",
            CRO: "Croatia",
            CUB: "Cuba",
            CYP: "Cyprus",
            CZE: "Czech Republic",
            DEN: "Denmark",
            DJI: "Djibouti",
            DMA: "Dominica",
            DOM: "Dominican Republic",
            ECU: "Ecuador",
            EGY: "Egypt",
            ERI: "Eritrea",
            ESA: "El Salvador",
            ESP: "Spain",
            EST: "Estonia",
            ETH: "Ethiopia",
            FIJ: "Fiji",
            FIN: "Finland",
            FRA: "France",
            FSM: "Micronesia",
            GAB: "Gabon",
            GAM: "Gambia",
            GBR: "Great Britain",
            GBS: "Guinea-Bissau",
            GEO: "Georgia",
            GEQ: "Equatorial Guinea",
            GER: "Germany",
            GHA: "Ghana",
            GRE: "Greece",
            GRN: "Grenada",
            GUA: "Guatemala",
            GUI: "Guinea",
            GUM: "Guam",
            GUY: "Guyana",
            HAI: "Haiti",
            HKG: "Hong Kong",
            HON: "Honduras",
            HUN: "Hungary",
            INA: "Indonesia",
            IND: "India",
            IRI: "Iran",
            IRL: "Ireland",
            IRQ: "Iraq",
            ISL: "Iceland",
            ISR: "Israel",
            ISV: "Virgin Islands",
            ITA: "Italy",
            IVB: "British Virgin Islands",
            JAM: "Jamaica",
            JOR: "Jordan",
            JPN: "Japan",
            KAZ: "Kazakhstan",
            KEN: "Kenya",
            KGZ: "Kyrgyzstan",
            KIR: "Kiribati",
            KOR: "South Korea",
            KSA: "Saudi Arabia",
            KUW: "Kuwait",
            LAO: "Laos",
            LAT: "Latvia",
            LBA: "Libya",
            LBR: "Liberia",
            LCA: "Saint Lucia",
            LES: "Lesotho",
            LIB: "Lebanon",
            LIE: "Liechtenstein",
            LTU: "Lithuania",
            LUX: "Luxembourg",
            MAD: "Madagascar",
            MAR: "Morocco",
            MAS: "Malaysia",
            MAW: "Malawi",
            MDA: "Moldova",
            MDV: "Maldives",
            MEX: "Mexico",
            MGL: "Mongolia",
            MHL: "Marshall Islands",
            MKD: "Macedonia",
            MLI: "Mali",
            MLT: "Malta",
            MNE: "Montenegro",
            MON: "Monaco",
            MOZ: "Mozambique",
            MRI: "Mauritius",
            MTN: "Mauritania",
            MYA: "Myanmar",
            NAM: "Namibia",
            NCA: "Nicaragua",
            NED: "Netherlands",
            NEP: "Nepal",
            NGR: "Nigeria",
            NIG: "Niger",
            NOR: "Norway",
            NRU: "Nauru",
            NZL: "New Zealand",
            OMA: "Oman",
            PAK: "Pakistan",
            PAN: "Panama",
            PAR: "Paraguay",
            PER: "Peru",
            PHI: "Philippines",
            PLE: "Palestine",
            PLW: "Palau",
            PNG: "Papua New Guinea",
            POL: "Poland",
            POR: "Portugal",
            PRK: "North Korea",
            PUR: "Puerto Rico",
            QAT: "Qatar",
            ROU: "Romania",
            RSA: "South Africa",
            RUS: "Russia",
            RWA: "Rwanda",
            SAM: "Samoa",
            SEN: "Senegal",
            SEY: "Seychelles",
            SIN: "Singapore",
            SKN: "Saint Kitts and Nevis",
            SLE: "Sierra Leone",
            SLO: "Slovenia",
            SMR: "San Marino",
            SOL: "Solomon Islands",
            SOM: "Somalia",
            SRB: "Serbia",
            SRI: "Sri Lanka",
            STP: "Sao Tome and Principe",
            SUD: "Sudan",
            SUI: "Switzerland",
            SUR: "Suriname",
            SVK: "Slovakia",
            SWE: "Sweden",
            SWZ: "Swaziland",
            SYR: "Syria",
            TAN: "Tanzania",
            TGA: "Tonga",
            THA: "Thailand",
            TJA: "Tajikistan",
            TKM: "Turkmenistan",
            TLS: "Timor-Leste",
            TOG: "Togo",
            TPE: "Chinese Taipei",
            TRI: "Trinidad and Tobago",
            TUN: "Tunisia",
            TUR: "Turkey",
            TUV: "Tuvalu",
            UAE: "United Arab Emirates",
            UGA: "Uganda",
            UKR: "Ukraine",
            URU: "Uruguay",
            USA: "United States",
            UZB: "Uzbekistan",
            VAN: "Vanuatu",
            VEN: "Venezuela",
            VIE: "Vietnam",
            VIN: "Saint Vincent and the Grenadines",
            YEM: "Yemen",
            ZAM: "Zambia",
            ZIM: "Zimbabwe"
        };
        var shows="";
        var objName="";
        for(objName in countries){
            shows+="<option value="+objName+">"+countries[objName]+"</option>";
        }
        $("#uWorld").append(shows);
        $("#showMe").append(shows);
    });

}(jQuery));



