<?php

// MySQL database connection

$servername = "sql101.infinityfree.com";

$username = "epiz_[*hidden*]";//Replace with correct db username 

$password = "7pYTVsK***k9IKT*]zAN";

$database = "epiz_[*hidden*]_project_links";//Replace with correct db table name.



// Create connection

$conn = new mysqli($servername, $username, $password, $database);



// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

