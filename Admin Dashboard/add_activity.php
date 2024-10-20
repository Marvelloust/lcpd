<?php
// Start the session
session_start();

// Assuming you have stored the admin's ID in the session during login
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Connect to the database
    include 'db_connection.php';

    // Get the activity title, start date, and end date from the form
    $activity_title = $_POST['activity_title'];
    $activity_start_date = $_POST['activity_start_date'];
    $activity_end_date = $_POST['activity_end_date'];

    // Insert the activity into the database
    $stmt = $conn->prepare("INSERT INTO activities (activity_title, activity_start_date, activity_end_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $activity_title, $activity_start_date, $activity_end_date);
    $stmt->execute();

    // Redirect to the dashboard
    header("Location: activities.php");
    exit();
} else {
    // Redirect to the login page if the admin is not logged in
    header("Location: login.php");
    exit();
}
?>