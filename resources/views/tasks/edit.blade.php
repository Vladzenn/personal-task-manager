<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="task_name">Task Name:</label>
            <input
                type="text"
                id="task_name"
                name="task_name"
                value="{{ $task->task_name }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="description">Description:</label>
            <textarea
                id="description"
                name="description"
                required
            >{{ $task->description }}</textarea>
        </div>

        <br>

        <div>
            <label for="status">Status:</label>

            <select id="status" name="status">
                <option value="Pending"
                    {{ $task->status == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ $task->status == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        <br>

        <div>
            <label for="due_date">Due Date:</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ $task->due_date }}"
                required
            >
        </div>

        <br>

        <button type="submit">Update Task</button>
    </form>

    <br>

    <a href="{{ route('tasks.index') }}">Back to Tasks</a>

</body>
</html>