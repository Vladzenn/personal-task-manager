<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>

    <h1>Add New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div>
            <label for="task_name">Task Name:</label>
            <input type="text" id="task_name" name="task_name" required>
        </div>

        <br>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <br>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <br>

        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date" required>
        </div>

        <br>

        <button type="submit">Save Task</button>
    </form>

    <br>

    <a href="{{ route('tasks.index') }}">Back to Tasks</a>

</body>
</html>