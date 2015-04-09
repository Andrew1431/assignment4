<?php

	$servername = "localhost";
    $username = "root";
    $password = "r3dS4x0ph0n3";
    $dbname = "assignment4";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM vendor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            $outp = "";
            while ($rs = $result->fetch_assoc()) {
            if ($outp != "") {$outp .= ",";}
            $outp .= '{"vendorNo":"'  . $rs["vendorNo"] . '",';
            $outp .= '"vendorName":"'   . $rs["vendorName"]        . '",';
            $outp .= '"address1":"'. $rs["address1"]     . '",';
            $outp .= '"city":"'. $rs["city"]     . '",';
            $outp .= '"provState":"'. $rs["provState"]     . '",';
            $outp .= '"postalZip":"'. $rs["postalZip"]     . '",';
            $outp .= '"country":"'. $rs["country"]     . '",';
            $outp .= '"phone":"'. $rs["phone"]     . '",';
            $outp .= '"FAX":"'. $rs["FAX"]     . '"}';
            }
            $outp ='{"records":['.$outp.']}';

    echo($outp);
    }

    $conn->close();
?>