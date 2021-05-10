<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <div class="container">
        <div class="section pb-0">
            <h1 class="title is-1">Task List</h1>
        </div>
        <div class="section">
            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <p class="notification is-danger">
                    {{ session('error') }}
                </p>
            @endif
            <form class="has-addons" method="POST" action="/create" id="task-form">
                @csrf
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Task Name</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input is-fullwidth" name="name" type="text" placeholder="Task Name">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Start Date</label>
                    </div>
                    <div class="field-body">
                        <p class="control">
                                <input class="input" name="start_date" type="datetime-local" min="">
                        </p>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Due Date</label>
                    </div>
                    <div class="field-body">
                        <p class="control">
                            <input class="input" name="due_date" type="datetime-local" min="">
                        </p>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"></label>
                    </div>
                    <div class="field-body">
                        <p class="control">
                            <button class="button is-primary">
                                Submit
                            </button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <div class="pt-6">
            @if(count($returns))
            <table class="table is-fullwidth" border="1px" cellpadding="5px" cellspacing="0">
                <thead>
                <tr>
                    <th class="has-text-centered">ID</th>
                    <th class="has-text-centered">Name</th>
                    <th class="has-text-centered">Start Date</th>
                    <th class="has-text-centered">Due Date</th>
                    <th class="has-text-centered">Status</th>
                    <th class="has-text-centered">Clear</th>
                </tr>
                </thead>
                <tbody>
                @foreach($returns as $task)
                    <tr>
                        <td class="has-text-centered">{{ $task->id }}</td>
                        <td class="has-text-centered">{{ $task->name }}</td>
                        <td class="has-text-centered">
                                    <span>
                                        {{ $task->start_date }}
                                    </span>
                        </td>
                        <td class="has-text-centered">
                                    <span
                                        @if($task->due_date)
                                        style="color:red;"
                                        @endif
                                    >
                                        {{ $task->due_date }}
                                    </span>
                        </td>
                        <td class="has-text-centered" align="center">
                            @if($task->status)
                                Done
                            @else

                            <form method="POST" action="/change_status" id="toggle-form">
                                @csrf
                                <input name="status" type="checkbox" value="1" onchange="toggleIsDone({{ $task->id }})">
                            </form>
                            @endif
                        </td>
                        <td class="has-text-centered">
                            @if($task->status)
                            <form method="POST" action="/clear" id="archive-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $task->id }}">
                                <button class="button is-danger">Clear</button>
                            </form>
                            @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
                <div class="clear-all-status-done">
                    <form method="POST" action="/clear_all" id="archive-form">
                        @csrf
                        <input type="hidden" name="clear_all" value="1">
                        <button class="button is-danger">Clear All Status Done</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    toggleIsDone = (id) => {
        let input = document.createElement("input");
        input.name = "id"
        input.type = "hidden"
        input.value = id
        let form = document.getElementById('toggle-form')
        form.appendChild(input)
        form.submit()
    }
</script>
</body>
</html>
