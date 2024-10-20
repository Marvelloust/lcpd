<?php
// tasks_table.php

session_start();

// Include the database connection
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit(); // Exit if not authenticated
}

$user_id = $_SESSION['user_id'];

// Fetch all tasks from the database for the current user
$stmt = $conn->prepare("SELECT * FROM admin_tasks WHERE user_id = ? ORDER BY task_date ASC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Generate the table rows
while ($task = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($task['task_title']) . '</td>';
    echo '<td>' . htmlspecialchars($task['task_date']) . '</td>';
    echo '<td>' . htmlspecialchars(ucfirst($task['task_duration'])) . '</td>';
    echo '<td>';
    echo '<button class="btn btn-primary btn-sm edit-task-btn" data-task-id="' . $task['id'] . '">Edit</button> ';
    echo '<button class="btn btn-danger btn-sm delete-task-btn" data-task-id="' . $task['id'] . '">Delete</button>';
    echo '</td>';
    echo '</tr>';
}
?>
