<?php
// add_instructor.php

// Start the session
session_start();

// Set the response header to JSON
header('Content-Type: application/json');

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access. Please log in.']);
    exit();
}

// Connect to the database
include 'db_connection.php';

// Function to sanitize input data
function sanitize_input($data, $conn) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $name = isset($_POST['name']) ? sanitize_input($_POST['name'], $conn) : '';
    $email = isset($_POST['email']) ? sanitize_input($_POST['email'], $conn) : '';
    $phone = isset($_POST['phone']) ? sanitize_input($_POST['phone'], $conn) : '';

    // Basic validation
    if (empty($name) || empty($email) || empty($phone)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit();
    }

    // Optional: Validate phone number format
    // For example, only allow digits, spaces, dashes, and parentheses
    if (!preg_match('/^[0-9\s\-()]+$/', $phone)) {
        echo json_encode(['success' => false, 'message' => 'Invalid phone number format.']);
        exit();
    }

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT id FROM instructors WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'An instructor with this email already exists.']);
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    // Insert the instructor into the database
    $stmt = $conn->prepare("INSERT INTO instructors (name, email, phone) VALUES (?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Database error: Unable to prepare statement.']);
        $conn->close();
        exit();
    }
    $stmt->bind_param("sss", $name, $email, $phone);

    if ($stmt->execute()) {
        // Get the inserted instructor's ID
        $instructor_id = $stmt->insert_id;

        // Return success response with instructor details
        echo json_encode([
            'success' => true,
            'message' => 'Instructor added successfully!',
            'instructor' => [
                'id' => $instructor_id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone
            ]
        ]);
    } else {
        // Return error message
        echo json_encode(['success' => false, 'message' => 'Error adding instructor. Please try again.']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If not a POST request, deny access
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}
?>
