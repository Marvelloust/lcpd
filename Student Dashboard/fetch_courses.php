<?php
    session_start();
    include 'db_connection.php';

// Fetch courses from the database
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

$conn->close();

// Return courses as JSON
header('Content-Type: application/json');
echo json_encode($courses);
?>
