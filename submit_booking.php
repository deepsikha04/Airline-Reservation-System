<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get form data
if(isset($_POST['submit'])){
$origin = $_POST['origin'];
$destination = $_POST['destination'];
$trip_type = $_POST['trip_type'];
$departure_date = $_POST['departure_date'];
$arrival_date = $_POST['arrival_date'];
$nationality = $_POST['nationality'];
$num_passengers = $_POST['num_passengers'];
}
// Prepare and bind
$stmt = $con->prepare("INSERT INTO bookings (origin, destination, trip_type, departure_date, arrival_date, nationality, num_passengers) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssi", $origin, $destination, $trip_type, $departure_date, $arrival_date, $nationality, $num_passengers);

// Execute the statement
if ($stmt->execute()) {
    echo "New booking created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$con->close();
?>
