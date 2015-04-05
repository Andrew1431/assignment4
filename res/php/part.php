<table class="table table-striped">
    <thead>
        <tr>
            <th>Part ID</th>
            <th>Vendor #</th>
            <th>On Hand</th>
            <th>On Order</th>
            <th>Cost</th>
            <th>List Price</th>
            <th>Description</th>
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

            $sql = "SELECT * FROM part";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["partID"] . "</td>" .
                    "<td>" . $row["vendorNo"] . "</td>" .
                    "<td>" . $row["onHand"] . "</td>" .
                    "<td>" . $row["onOrder"] . "</td>" .
                    "<td>" . $row["cost"] . "</td>" .
                    "<td>" . $row["listPrice"] . "</td>" .
                    "<td>" . $row["description"] . "</td></tr>" ;
                }
            }

            $conn->close();

        ?>
    </tbody>
</table>