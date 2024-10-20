<?php 
// delete_course.php

// Include database connection
include 'db_connection.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the course ID from the request body
    $courseId = $_POST['id'];

    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");

    // Bind the course ID parameter
    $stmt->bind_param("i", $courseId);

    // Execute the query
    if ($stmt->execute()) {
        // Return a success response
        echo json_encode(['success' => true, 'message' => 'Course deleted successfully.']);
    } else {
        // Return an error response
        echo json_encode(['success' => false, 'error' => 'Failed to delete the course.']);
    }

    // Close the statement
    $stmt->close();
} else {
    // Return an error response for invalid request method
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
