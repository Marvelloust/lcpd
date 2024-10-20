<?php
// manage_tasks.php

session_start();
header('Content-Type: application/json');

// Include the database connection
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Retrieve action from POST data
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action === 'add') {
    // Add a new task
    $task_title = isset($_POST['task_title']) ? trim($_POST['task_title']) : '';
    $task_date = isset($_POST['task_date']) ? $_POST['task_date'] : '';
    $task_duration = isset($_POST['task_duration']) ? $_POST['task_duration'] : '';

    // Basic validation
    if (empty($task_title) || empty($task_date) || empty($task_duration)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO admin_tasks (task_title, task_date, task_duration, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $task_title, $task_date, $task_duration, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add task.']);
    }

} elseif ($action === 'edit') {
    // Edit an existing task
    $task_id = isset($_POST['task_id']) ? intval($_POST['task_id']) : 0;
    $task_title = isset($_POST['task_title']) ? trim($_POST['task_title']) : '';
    $task_date = isset($_POST['task_date']) ? $_POST['task_date'] : '';
    $task_duration = isset($_POST['task_duration']) ? $_POST['task_duration'] : '';

    // Basic validation
    if ($task_id <= 0 || empty($task_title) || empty($task_date) || empty($task_duration)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Update the task in the database
    $stmt = $conn->prepare("UPDATE admin_tasks SET task_title = ?, task_date = ?, task_duration = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sssii", $task_title, $task_date, $task_duration, $task_id, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update task.']);
    }

} elseif ($action === 'delete') {
    // Delete a task
    $task_id = isset($_POST['task_id']) ? intval($_POST['task_id']) : 0;

    if ($task_id <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid task ID.']);
        exit();
    }

    // Delete the task from the database
    $stmt = $conn->prepare("DELETE FROM admin_tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete task.']);
    }

} else {
    // Invalid action
    echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
}
?>
