<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Flights</title>
    <link rel="stylesheet" href="flights.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="flights.php"><i class="fas fa-plane"></i> Search Flight</a></li>
                <li><a href="routes.php"><i class="fas fa-route"></i> Flight Routes</a></li>
                <li><a href="flight_status.php"><i class="fas fa-info-circle"></i> Flight Status</a></li>
                <li><a href="booking.html"><i class="fas fa-ticket-alt"></i> Book Flight</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logoff</a></li>
            </ul>
        </nav>

        
    </div>

    <?php
session_start();

include 'db.php';

$flights = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    $sql = "SELECT * FROM flights WHERE origin = '$origin' AND destination = '$destination'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $flights[] = $row;
        }
    } else {
        echo "No flights found.";
    }
}
?>



    
        <main>
            <h2>Search Flights</h2>
            <form method="post" action="">
                <label for="origin">Origin</label>
                <input type="text" id="origin" name="origin" required>
                <label for="destination">Destination</label>
                <input type="text" id="destination" name="destination" required>
                <button type="submit">Search</button>
            </form>
            <?php if (!empty($flights)): ?>
                <h3>Available Flights</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flights as $flight): ?>
                            <tr>
                                <td><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['departure_time']; ?></td>
                                <td><?php echo $flight['arrival_time']; ?></td>
                                <td><?php echo $flight['price']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>

    </div>
</body>
</html>
