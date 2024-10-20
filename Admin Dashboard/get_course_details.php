<?php
// get_course_details.php

header('Content-Type: application/json'); // Ensure the response is JSON

include 'db_connection.php';

// Check if 'id' is set in the GET request
if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    // Validate that 'id' is an integer
    if (!filter_var($courseId, FILTER_VALIDATE_INT)) {
        echo json_encode(['error' => 'Invalid course ID']);
        exit;
    }

    // Prepare the SQL query with a placeholder
    $sql = "SELECT * FROM courses WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the course ID to the query
        $stmt->bind_param("i", $courseId);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the course details and encode them as JSON
            $course = $result->fetch_assoc();
            echo json_encode($course);
        } else {
            // If no course is found, return an error message
            echo json_encode(['error' => 'Course not found']);
        }

        // Close the statement
        $stmt->close();
    } else {
        // If statement preparation fails
        echo json_encode(['error' => 'Database query failed']);
    }

    // Close the connection
    $conn->close();
} else {
    echo json_encode(['error' => 'No course ID provided']);
}
?>
