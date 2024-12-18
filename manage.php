<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_flight'])) {
    // Update flight information
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = $_POST['price'];

    $sql = "UPDATE flights SET origin=?, destination=?, departure_time=?, arrival_time=?, price=? WHERE flight_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssdi", $origin, $destination, $departure_time, $arrival_time, $price, $flight_id);

    if ($stmt->execute()) {
        echo "Flight updated successfully.";
    } else {
        echo "Error updating flight: " . $con->error;
    }
}

// Fetch all flights
$sql = "SELECT * FROM flights";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Flights</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="homeadmin.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="manage.php"><i class="fas fa-route"></i> Manage flight</a></li>
                <li><a href="managebook.php"><i class="fas fa-ticket-alt"></i>Manage booking</a></li>
                <li><a href="logoutadmin.php"><i class="fas fa-sign-out-alt"></i> Logoff</a></li>
            </ul>
        </nav>
		</div>
    <main>
        <h1>Manage Flights</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <form method="POST" action="manage_flights.php">
                            <td><input type="text" name="origin" value="<?php echo $row['origin']; ?>"></td>
                            <td><input type="text" name="destination" value="<?php echo $row['destination']; ?>"></td>
                            <td><input type="datetime-local" name="departure_time" value="<?php echo $row['departure_time']; ?>"></td>
                            <td><input type="datetime-local" name="arrival_time" value="<?php echo $row['arrival_time']; ?>"></td>
                            <td><input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>"></td>
                            <td>
                                <input type="submit" name="update_flight" value="Update">
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No flights available.</p>
        <?php endif; ?>
    </main>
</body>
</html>

<?php
$con->close();
?>
