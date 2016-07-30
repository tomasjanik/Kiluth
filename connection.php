<?php
$servername = "localhost";
$username = "poomiepoom";
$password = "Poom20051997";
$dbname = "poom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Success";
}

mysql_close(); //Close connection
?>