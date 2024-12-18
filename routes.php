
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Dashboard</title>
    <link rel="stylesheet" href="bookF.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        
    

        
   
	 <div class="container">
        <h2>Routes</h2>
        <p>Here you can view all available routes.</p>
        <!-- Add PHP code to fetch and display routes data from the database -->
		<?php
include 'db.php';

// Query to fetch flight routes for Nepal airports
$sql = "SELECT origin, destination, departure_time, arrival_time, price 
        FROM flights";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table>";
    echo "<tr><th>Origin</th><th>Destination</th><th>Departure Time</th><th>Arrival Time</th><th>Price</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["origin"]. "</td><td>" . $row["destination"]. "</td><td>" . $row["departure_time"]. "</td><td>" . $row["arrival_time"]. "</td><td>" . $row["price"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$con->close();
?>

    </div>
</body>
</html>
    </div>
</body>
</html>