<?php
// dashboard.php

// Start the session
session_start();

// Assuming you have stored the admin's ID in the session during login
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Connect to the database
    include 'db_connection.php';

    // Fetch the logged-in admin's details from the database
    $stmt = $conn->prepare("SELECT first_name, last_name, profile_image FROM admins WHERE id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the admin is found
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $first_name = $admin['first_name'];
        $last_name = $admin['last_name'];
        // Check if the profile image exists; if not, use a default image
        $profile_image = !empty($admin['profile_image']) ? $admin['profile_image'] : 'data:image/png;base64,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'; // Default image if none is set
    } else {
        // If no admin is found, redirect to login or show an error
        header("Location: ../login.php");
        exit();
    }
} else {
    // If no session is set, redirect to login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/licon.png" type="image/x-icon">
    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <!-- Bootstrap CSS for Modals -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/licon.png" type="image/x-icon">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <header>
                <button class="toggle-btn" id="toggle-btn">&#9776;</button>
                <h2>To-do List</h2>
                <div class="user-wrapper">
                    <img src="<?php echo $profile_image; ?>" alt="User Image" style="width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;">
                    <div>
                        <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

            <!-- Calendar -->
            <div class="calendar mt-4">
                <div id="calendar"></div>
            </div>

            <!-- Modal to add/edit tasks -->
            <div class="modal fade" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="task-modal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="task-form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="task-modal-label">Add Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="task-id" name="task_id">
                                <div class="form-group">
                                    <label for="task-title">Task Title:</label>
                                    <input type="text" class="form-control" id="task-title" name="task_title" required>
                                </div>
                                <div class="form-group">
                                    <label for="task-date">Task Date:</label>
                                    <input type="date" class="form-control" id="task-date" name="task_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="task-duration">Task Duration:</label>
                                    <select class="form-control" id="task-duration" name="task_duration" required>
                                        <option value="day">Day</option>
                                        <option value="week">Week</option>
                                        <option value="month">Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Display tasks -->
            <div class="tasks mt-5">
                <h2>Tasks</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Task Title</th>
                            <th>Task Date</th>
                            <th>Task Duration</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tasks-table-body">
                        <?php
                        // Fetch all tasks from the database for the current user
                        $stmt = $conn->prepare("SELECT * FROM admin_tasks WHERE user_id = ?");
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Display the tasks
                        while ($task = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($task['task_title']) . '</td>';
                            echo '<td>' . date('D jS Y', strtotime($task['task_date'])) . '</td>';
                            echo '<td>' . htmlspecialchars($task['task_duration']) . '</td>';
                            echo '<td>';
                            echo '<button class="btn btn-primary btn-sm edit-task-btn" data-task-id="' . $task['id'] . '">Edit</button> ';
                            echo '<button class="btn btn-danger btn-sm delete-task-btn" data-task-id="' . $task['id'] . '">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include necessary JS libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS for Modals -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <!-- Custom Scripts -->
    <script src="js/scripts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false, // Set to false to prevent drag-n-drop
                selectable: true,
                selectMirror: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    <?php
                    // Fetch all tasks from the database for the current user
                    $stmt = $conn->prepare("SELECT * FROM admin_tasks WHERE user_id = ?");
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Display the tasks as events on the calendar
                    while ($task = $result->fetch_assoc()) {
                        $title = addslashes($task['task_title']);
                        $date = $task['task_date'];
                        $id = $task['id'];
                        echo "{ id: '$id', title: '$title', start: '$date', allDay: true },";
                    }
                    ?>
                ],
                dateClick: function (info) {
                    // Open the modal to add a new task
                    $('#task-modal').modal('show');
                    $('#task-form')[0].reset();
                    $('#task-date').val(info.dateStr);
                    $('#task-id').val('');
                    $('#task-modal-label').text('Add Task');
                },
                eventClick: function (info) {
                    // Open the modal to edit the task
                    var eventObj = info.event;
                    $('#task-modal').modal('show');
                    $('#task-id').val(eventObj.id);
                    $('#task-title').val(eventObj.title);
                    $('#task-date').val(info.event.startStr);
                    // Fetch additional data like duration via AJAX
                    $.ajax({
                        url: 'get_task.php',
                        type: 'GET',
                        data: { task_id: eventObj.id },
                        dataType: 'json',
                        success: function (task) {
                            if (task.status !== 'error') {
                                $('#task-duration').val(task.task_duration);
                                $('#task-modal-label').text('Edit Task');
                            } else {
                                alert('Failed to fetch task details.');
                            }
                        },
                        error: function () {
                            alert('There was an error processing your request.');
                        }
                    });
                }
            });

            calendar.render();

            // Handle the add/edit task form submission
            $('#task-form').submit(function (event) {
                event.preventDefault();
                var taskId = $('#task-id').val();
                var taskTitle = $('#task-title').val();
                var taskDate = $('#task-date').val();
                var taskDuration = $('#task-duration').val();

                var action = taskId ? 'edit' : 'add';

                $.ajax({
                    url: 'manage_tasks.php', // PHP script to handle add/edit/delete
                    type: 'POST',
                    data: {
                        task_id: taskId,
                        task_title: taskTitle,
                        task_date: taskDate,
                        task_duration: taskDuration,
                        action: action
                    },
                    dataType: 'json', // Ensure jQuery parses the response as JSON
                    success: function (res) {
                        if (res.status === 'success') {
                            // Reload the entire page to reflect changes
                            location.reload();
                        } else {
                            alert(res.message);
                        }
                    },
                    error: function () {
                        alert('There was an error processing your request.');
                    }
                });
            });

            // Handle edit task button click in the tasks table
            $(document).on('click', '.edit-task-btn', function () {
                var taskId = $(this).data('task-id');
                // Open the modal to edit the task
                $('#task-modal').modal('show');
                $('#task-form')[0].reset();
                $('#task-id').val(taskId);
                // Fetch the task details via AJAX
                $.ajax({
                    url: 'get_task.php',
                    type: 'GET',
                    data: { task_id: taskId },
                    dataType: 'json',
                    success: function (task) {
                        if (task.status !== 'error') {
                            $('#task-title').val(task.task_title);
                            $('#task-date').val(task.task_date);
                            $('#task-duration').val(task.task_duration);
                            $('#task-modal-label').text('Edit Task');
                        } else {
                            alert('Failed to fetch task details.');
                        }
                    },
                    error: function () {
                        alert('There was an error processing your request.');
                    }
                });
            });

            // Handle delete task button click in the tasks table
            $(document).on('click', '.delete-task-btn', function () {
                if (!confirm('Are you sure you want to delete this task?')) {
                    return;
                }

                var taskId = $(this).data('task-id');

                $.ajax({
                    url: 'manage_tasks.php',
                    type: 'POST',
                    data: {
                        task_id: taskId,
                        action: 'delete'
                    },
                    dataType: 'json', // Ensure jQuery parses the response as JSON
                    success: function (res) {
                        if (res.status === 'success') {
                            // Reload the entire page to reflect changes
                            location.reload();
                        } else {
                            alert(res.message);
                        }
                    },
                    error: function () {
                        alert('There was an error processing your request.');
                    }
                });
            });
        });
    </script>
</body>

</html>
