<!DOCTYPE html>
<html>

<head>
    <title>New Task Assigned</title>
</head>

<body>
    <h2>Hello,</h2>
    <p>A new task has been assigned to you:</p>

    <ul>
        <li><strong>Title:</strong> {{ $task->title }}</li>
        <li><strong>Description:</strong> {{ $task->description ?? 'N/A' }}</li>
        <li><strong>Due Date:</strong> {{ $task->due_date->format('Y-m-d') }}</li>
        <li><strong>Status:</strong> {{ ucfirst($task->status) }}</li>
    </ul>

    <p>Please check your task dashboard for more details.</p>
</body>

</html>
