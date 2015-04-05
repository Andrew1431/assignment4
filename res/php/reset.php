<?php
    $servername = "localhost";
    $username = "root";
    $password = "r3dS4x0ph0n3";
    $dbname = "assignment4";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DROP TABLE part";

    if ($conn->query($sql) === TRUE) {
        echo "Part Dropped<br>";
    } else {
        echo "Error running: " . $sql . "<br>";
    }

    $sql = "DROP TABLE vendor";

    if ($conn->query($sql) === TRUE) {
        echo "Vendor Dropped<br>";
    } else {
        echo "Error running: " . $sql . "<br>";
    }

    $sql = "CREATE TABLE part (" .
    "partID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, " .
    "vendorNo INT UNSIGNED, " .
    "description VARCHAR(70), " .
    "onHand INT UNSIGNED, " .
    "onOrder INT UNSIGNED, " .
    "cost FLOAT UNSIGNED, " .
    "listPrice FLOAT UNSIGNED);";

    if ($conn->query($sql) === TRUE) {
        echo "Table Created: part<br>";
    } else {
        echo "Error running: " . $sql . "<br>";
    }

    $sql = "CREATE TABLE vendor (" .
    "vendorNo INT UNSIGNED PRIMARY KEY, " .
    "vendorName VARCHAR(30), " .
    "address1 VARCHAR(30), " .
    "city VARCHAR(30), " .
    "provState VARCHAR(30), " .
    "postalZip VARCHAR(6), " .
    "country VARCHAR(6), " .
    "phone VARCHAR(10), " .
    "FAX VARCHAR(10)" .
    ");";

    if ($conn->query($sql) === TRUE) {
        echo "Table Created: vendor<br>";
    } else {
        echo "Error running: " . $sql;
    }

    echo "<br><br><br><br>";

    $xml = simplexml_load_file("../xml/part.xml") or die("Error: Cannot create object");
    foreach($xml->children() as $parts) {
        $vendorNo = intval($parts->vendorNo);
        $description = $parts->description;
        $onHand = intval($parts->onHand);
        $onOrder = intval($parts->onOrder);
        $cost = floatval($parts->cost);
        $listPrice = floatval($parts->listPrice);

        $sql = "INSERT INTO part (vendorNo, description, onHand, onOrder, cost, listPrice) " .
        "VALUES ($vendorNo, \"$description\", $onHand, $onOrder, $cost, $listPrice" .
        ");";

        if ($conn->query($sql) === TRUE) {
            echo "Record added to part.<br>";
        } else {
            echo "Error adding record to part : vendorNo = $vendorNo; description = $description; onHand = $onHand; onOrder = $onOrder, cost = $cost, listPrice = $listPrice<br>" . $conn->error . "<br>";
        }
    }

    $xml = simplexml_load_file("../xml/vendor.xml") or die("Error: Cannot create object");
        foreach($xml->children() as $vendors) {
            $vendorNo = intval($vendors->vendorNo);
            $vendorName = $vendors->vendorName;
            $address1 = $vendors->address1;
            $city = $vendors->city;
            $provState = $vendors->provState;
            $postalZip = $vendors->postalZip;
            $country = $vendors->country;
            $phone = $vendors->phone;
            $FAX = $vendors->FAX;

            $sql = "INSERT INTO vendor (vendorNo, vendorName, address1, city, provState, postalZip, country, phone, FAX) " .
            "VALUES ($vendorNo, \"$vendorName\", \"$address1\", \"$city\", \"$provState\", \"$postalZip\", \"$country\", \"$phone\", \"$FAX\"" .
            ");";

            if ($conn->query($sql) === TRUE) {
                echo "Record added to vendor.<br>";
            } else {
                echo "Error adding record to vendor<br>";
            }
        }

    $conn->close();
?>