<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Status</title>
    <link rel="stylesheet" href="flightstatus.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="SearchFlight.php">Search Flight</a></li>
                <li><a href="FlightStatus.php">Flight Status</a></li>
                <li><a href="Route.php">Route</a></li>
                <li><a href="Booking.html">Book Flight</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        
        <div class="content">
            <h2>Flight Status</h2>
            <p>Check the real-time status of your flight.</p>

            <form method="POST" action="FlightStatus.php">
                <div class="search-filter">
                    <input type="text" name="origin" placeholder="Enter Origin" required>
                    <input type="text" name="destination" placeholder="Enter Destination" required>
                    <button type="submit">Submit</button>
                </div>
            </form>

            <div class="flight-status">
                <?php include 'fetchflightstatus.php'; ?>
            </div>
        </div>
    </div>
</body>
</html>