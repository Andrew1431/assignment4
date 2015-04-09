<?php

	$servername = "localhost";
    $username = "root";
    $password = "r3dS4x0ph0n3";
    $dbname = "assignment4";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM part";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            $outp = "";
            while ($rs = $result->fetch_assoc()) {
            if ($outp != "") {$outp .= ",";}
            $outp .= '{"partID":"'  . $rs["partID"] . '",';
            $outp .= '"vendorNo":"'   . $rs["vendorNo"]        . '",';
            $outp .= '"description":"'. $rs["description"]     . '",';
            $outp .= '"onHand":"'. $rs["onHand"]     . '",';
            $outp .= '"onOrder":"'. $rs["onOrder"]     . '",';
            $outp .= '"cost":"'. $rs["cost"]     . '",';
            $outp .= '"listPrice":"'. $rs["listPrice"]     . '"}';
            }
            $outp ='{"records":['.$outp.']}';

    echo($outp);
    }

    $conn->close();
?>