<?php
    
    $conn = new mysqli("localhost", "lukejelse04", "C3ssNa182", "snexo");

    if($conn->connect_errno){

        echo "<script>console.log('Failure to connect to database')</script>";

    }else{

        $dateTime = date('d/m/Y H:i:s');

        echo "<h6> $dateTime </h6>";

        $sqlquery = "INSERT INTO VisitTime (DateTime) VALUES ('$dateTime')";

        $result = $conn -> query($sqlquery);

    }

    
?>