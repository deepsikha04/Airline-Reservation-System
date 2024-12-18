<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_booking'])) {
    // Update booking information
    $booking_id = $_POST['booking_id'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $trip_type = $_POST['trip_type'];
    $departure_date = $_POST['departure_date'];
    $arrival_date = $_POST['arrival_date'];
    $nationality = $_POST['nationality'];
    $num_passengers = $_POST['num_passengers'];

    $sql = "UPDATE bookings SET origin=?, destination=?, trip_type=?, departure_date=?, arrival_date=?, nationality=?, num_passengers=? WHERE booking_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssii", $origin, $destination, $trip_type, $departure_date, $arrival_date, $nationality, $num_passengers, $booking_id);

    if ($stmt->execute()) {
        echo "Booking updated successfully.";
    } else {
        echo "Error updating booking: " . $con->error;
    }
}

// Fetch all bookings
$sql = "SELECT * FROM bookings";
$result = $con->query($sql);

if ($result === false) {
    die("Error fetching bookings: " . $con->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="managebook.css">
</head>
<body>
    <div class="container">
        
    <main>
        <h1>Manage Bookings</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Trip Type</th>
                    <th>Departure Date</th>
                    <th>Arrival Date</th>
                    <th>Nationality</th>
                    <th>Number of Passengers</th>
                    <th>Booking Date</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <form method="POST" action="manage_bookings.php">
                            <td><input type="text" name="origin" value="<?php echo $row['origin']; ?>"></td>
                            <td><input type="text" name="destination" value="<?php echo $row['destination']; ?>"></td>
                            <td><input type="text" name="trip_type" value="<?php echo $row['trip_type']; ?>"></td>
                            <td><input type="date" name="departure_date" value="<?php echo $row['departure_date']; ?>"></td>
                            <td><input type="date" name="arrival_date" value="<?php echo $row['arrival_date']; ?>"></td>
                            <td><input type="text" name="nationality" value="<?php echo $row['nationality']; ?>"></td>
                            <td><input type="number" name="num_passengers" value="<?php echo $row['num_passengers']; ?>"></td>
                            <td><?php echo $row['booking_date']; ?></td>
                            <td>
                                <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                <input type="submit" name="update_booking" value="Update">
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No bookings available.</p>
        <?php endif; ?>
    </main>
</body>
</html>

<?php
$con->close();
?>
