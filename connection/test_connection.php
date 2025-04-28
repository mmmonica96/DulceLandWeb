<?php
$conn = new mysqli("localhost", "root", "", "dulceland");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SHOW TABLES");

if ($result) {
    echo "Tables found in 'dulceland':<br>";
    while ($row = $result->fetch_array()) {
        echo $row[0] . "<br>";
    }
} else {
    echo "No tables found or error: " . $conn->error;
}

$conn->close();
?>

