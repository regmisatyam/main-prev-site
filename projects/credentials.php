<?php
// MySQL database connection
$servername = "sql101.infinityfree.com";
$username = "epiz_34259072";
$password = "7pYTVsKk9IKTzAN";
$database = "epiz_34259072_project_links";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
