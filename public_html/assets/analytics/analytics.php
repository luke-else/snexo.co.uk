<?php
    
    $conn = new mysqli("localhost", "lukejelse04", "C3ssNa182", "snexo");

    if($conn->connect_errno){

        echo "<h6>Error: $conn->connect_error </h6>";

    }else{

        $currentAddress = $_SERVER['REMOTE_ADDR'];
        $dateTime = date('d/m/Y H:i:s');

        echo "<h6> $dateTime </h6>";

        $sqlquery = "INSERT INTO VisitTime (IPAddress, DateTime) VALUES ('$currentAddress', '$dateTime')";

        $result = $conn -> query($sqlquery);

    }

    
?>