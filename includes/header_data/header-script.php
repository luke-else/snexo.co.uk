<?php

    if($_SERVER['REQUEST_URI'] == "/examples.php"){
        include "examples-header.html";
    }elseif ($_SERVER['REQUEST_URI'] == "/faq.php") {
        include "faq-header.html";
    }else{
        include "index-header.html";
    }

    //echo "<script>console.log(' " . $_SERVER['REQUEST_URI'] . " ')</script>";

?>