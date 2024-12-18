<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    // Prepare the SQL statement
    $stmt = $con->prepare("SELECT flight_number, origin, destination, flight_time, revised_time, flight_status FROM status WHERE origin = ? AND destination = ?");
    $stmt->bind_param("ss", $origin, $destination);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Flight Number</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Flight Time</th>
                    <th>Revised Time</th>
                    <th>Flight Status</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['flight_number']}</td>
                    <td>{$row['origin']}</td>
                    <td>{$row['destination']}</td>
                    <td>{$row['flight_time']}</td>
                    <td>{$row['revised_time']}</td>
                    <td>{$row['flight_status']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }

    $stmt->close();
    $con->close();
}
?>