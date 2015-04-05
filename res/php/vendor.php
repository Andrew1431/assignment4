<table class="table table-striped">
    <thead>
        <tr>
            <th>Vendor #</th>
            <th>Vendor Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Prov/State</th>
            <th>Postal/Zip</th>
            <th>Country</th>
            <th>Phone</th>
            <th>FAX</th>
        </tr>
    </thead>
    <tbody>
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
                while($row = $result->fetch_assoc()) {
                    echo "<tr>" .
                    "<td>" . $row["vendorNo"] . "</td>" .
                    "<td>" . $row["vendorName"] . "</td>" .
                    "<td>" . $row["address1"] . "</td>" .
                    "<td>" . $row["city"] . "</td>" .
                    "<td>" . $row["provState"] . "</td>" .
                    "<td>" . $row["postalZip"] . "</td>" .
                    "<td>" . $row["country"] . "</td>" .
                    "<td>" . $row["phone"] . "</td>" .
                    "<td>" . $row["FAX"] . "</td>" .
                    "</tr>";
                }
            }

            $conn->close();

        ?>
    </tbody>
</table>