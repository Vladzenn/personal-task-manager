<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    @vite('resources/css/app.css')

</head>

<body>

    <!-- Bong bong -->

    <div id="bongo-cat">
        <img
            id="bongo-image"
            src="{{ asset('images/bongo-idle.png') }}"
            alt="Bongo Cat"
        >
    </div>


    <!-- Container aall -->

    <div class="container">


        <!-- Header -->

        <div class="header">

            <div class="logo">

                <div class="logo-icon">
                    ✓
                </div>

                <div>

                    <h1>
                        Personal Task Manager
                    </h1>

                    <p class="subtitle">
                        Keep track of your tasks and deadlines.
                    </p>

                </div>

            </div>


            <a
                href="{{ route('tasks.create') }}"
                class="add-button"
            >
                + Add Task
            </a>

        </div>


        <!-- Task Section -->

        <div class="section-header">

            <h2>
                My Tasks
            </h2>

            <span class="task-count">
                {{ $tasks->count() }} task(s)
            </span>

        </div>


        <!-- Check if there are tasks -->

        @if ($tasks->isEmpty())

            <div class="task-card">

                <div class="empty-state">

                    <div class="empty-icon">
                        ✓
                    </div>

                    <h3>
                        No tasks yet
                    </h3>

                    <p>
                        Create your first task to get started.
                    </p>

                    <a
                        href="{{ route('tasks.create') }}"
                        class="add-button"
                    >
                        + Create Task
                    </a>

                </div>

            </div>

        @else

            <!-- Task Table -->

            <div class="task-card">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Task
                            </th>

                            <th>
                                Description
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Due Date
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($tasks as $task)

                            <tr>

                                <!-- Task Name -->

                                <td>

                                    <div class="task-name">
                                        {{ $task->task_name }}
                                    </div>

                                </td>


                                <!-- Description -->

                                <td>

                                    <div class="description">
                                        {{ $task->description }}
                                    </div>

                                </td>


                                <!-- Status -->

                                <td>

                                    <form
                                        action="{{ route('tasks.status', $task->id) }}"
                                        method="POST"
                                        class="status-form"
                                    >

                                        @csrf

                                        @method('PATCH')


                                        <select
                                            name="status"
                                            class="status-select"
                                            onchange="this.form.submit()"
                                        >

                                            <option
                                                value="Pending"
                                                {{ $task->status == 'Pending' ? 'selected' : '' }}
                                            >
                                                Pending
                                            </option>


                                            <option
                                                value="Completed"
                                                {{ $task->status == 'Completed' ? 'selected' : '' }}
                                            >
                                                Completed
                                            </option>

                                        </select>

                                    </form>

                                </td>


                                <!-- Due Date -->

                                <td>

                                    <div class="due-date">
                                        {{ $task->due_date }}
                                    </div>

                                </td>


                                <!-- Actions -->

                                <td>

                                    <div class="actions">


                                        <!-- Edit -->

                                        <a
                                            href="{{ route('tasks.edit', $task->id) }}"
                                            class="edit-button"
                                        >
                                            Edit
                                        </a>


                                        <!-- Delete -->

                                        <form
                                            action="{{ route('tasks.destroy', $task->id) }}"
                                            method="POST"
                                            class="delete-form"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="delete-button"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>


    <!-- Bongo -->

    <script>

        const bongoCat = document.getElementById('bongo-image');

        document.addEventListener('click', function () {

            bongoCat.src = "{{ asset('images/bongo-tap.png') }}";


            setTimeout(function () {

                bongoCat.src = "{{ asset('images/bongo-idle.png') }}";

            }, 200);

        });

    </script>

</body>

</html>