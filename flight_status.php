<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Status</title>
    <link rel="stylesheet" href="flights.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="flights.php"><i class="fas fa-plane"></i>Search Flight</a></li>
                <li><a href="routes.php"><i class="fas fa-route"></i>Flight Routes</a></li>
				<li><a href="flight_status.php"><i class="fas fa-info-circle"></i>Flight Status</a></li>
                <li><a href="booking.html"><i class="fas fa-ticket-alt"></i>Book Flight</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </nav>
        
        <div class="content">
            <h2>Flight Status</h2>
            <p>Check the real-time status of your flight.</p>

            <form method="POST" action="flight_status.php">
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