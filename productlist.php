<?php
require_once "nusoap.php";

function getProd($category) {
    if ($category == "Action") {
        return join("<br>", array(
            "Spider-man", //http://t1.gstatic.com/images?q=tbn:ANd9GcQkBgGCS74dHRSe3i0fkEsdaC1jJPU4px6Pyv9-TOipm13gOprI
            "Bat-man", //http://t1.gstatic.com/images?q=tbn:ANd9GcQSGF8_VbDqKF0B_4IQ0NF87VMDSy7_MPKryawR-qLnSIPQwo5z
            "Tomb-rider")); //http://t1.gstatic.com/images?q=tbn:ANd9GcQGBx-FI1Xp1Xk9raKVhCrW2pj-vBUpbjfY5liEfDmU2DzKV-Uf
        
        // return join("<br>", array(
        //     "Spider-man", //http://t1.gstatic.com/images?q=tbn:ANd9GcQkBgGCS74dHRSe3i0fkEsdaC1jJPU4px6Pyv9-TOipm13gOprI
        //     "Bat-man", //http://t1.gstatic.com/images?q=tbn:ANd9GcQSGF8_VbDqKF0B_4IQ0NF87VMDSy7_MPKryawR-qLnSIPQwo5z
        //     "Tomb-rider")); //http://t1.gstatic.com/images?q=tbn:ANd9GcQGBx-FI1Xp1Xk9raKVhCrW2pj-vBUpbjfY5liEfDmU2DzKV-Uf
    }

    else if ($category == "Thriller") {
        return join("<br>", array(
            "Witch Hunter", //http://www.gstatic.com/tv/thumb/movieposters/8869378/p8869378_p_v8_aq.jpg
            "Terminal", //http://t0.gstatic.com/images?q=tbn:ANd9GcQ3tB6Wo3y_wKoalS1-kC1tuxF1Mus8vS9m2SGuYtRSEYBtxj8U
            "Unsane"));
    }

    else if ($category == "Drama") {
        return join("<br>", array(
            "Blindspotting", //http://t0.gstatic.com/images?q=tbn:ANd9GcT0ESlrru7mjeO1mA5truddfUgO_JS2bAUL0Nr3_EPVNPmM01GA
            "Red Sparrow", //http://t0.gstatic.com/images?q=tbn:ANd9GcQ_Sw8iyje2a8mnrsYRNLGzG-G50U093i76B5wHEIt7uON-O57P
            "Tomb-rider"));
    }

    else if ($category == "Sci-fi") {
        return join("<br>", array(
            "Arrival", //http://t0.gstatic.com/images?q=tbn:ANd9GcRmn4A0eiVOH4KoM8xqCxxNQM0NAY7lZQZ0glVIUIUOJYb9cryW
            "The Martian", //http://t2.gstatic.com/images?q=tbn:ANd9GcTkKPZ7EIOafEsemyn6zTIDeGYthKC_Okgxi1eX6diuOT3xKWXQ
            "Interstellar")); //http://t1.gstatic.com/images?q=tbn:ANd9GcRf61mker2o4KH3CbVE7Zw5B1-VogMH8LfZHEaq3UdCMLxARZAB
    }

    else {
        return "No products listed under that category";
    }
}

$server = new soap_server();
$server->configureWSDL("productlist", "urn:productlist");

$server->register("getProd",
    array("category" => "xsd:string"),
    array("return" => "xsd:string"),
    "urn:productlist",
    "urn:productlist#getProd",
    "rpc",
    "encoded",
    "Get a listing of products by category");

$server->service(file_get_contents("php://input"));