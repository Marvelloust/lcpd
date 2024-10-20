<?php
    session_start();
    include 'db_connection.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $student_id = intval($_GET['id']); // Get the student ID and cast it to an integer

    // Prepare and execute the query to fetch student details
    $query = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $student_id); // Bind the parameter
    $stmt->execute();
    
    // Fetch the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        // Return student details as a JSON response
        echo json_encode($student);
    } else {
        // Return an error if no student found
        echo json_encode(['error' => 'Student not found.']);
    }

    // Close the statement
    $stmt->close();
} else {
    // Return an error if 'id' parameter is not set
    echo json_encode(['error' => 'Invalid request.']);
}

// Close the database connection
$conn->close();
?>
