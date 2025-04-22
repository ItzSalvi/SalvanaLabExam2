<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 60px;
            color: white;
        }
        .sidebar a {
            color: white;
            padding: 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }
        .navbar {
            position: fixed;
            left: 250px;
            right: 0;
            top: 0;
            z-index: 1030;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Task Management System</h4>
        <a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.index') ? 'bg-primary' : '' }}"><i class="bi bi-file-earmark"></i> All Tasks</a>
        <a href="{{ route('tasks.create') }}" class="{{ request()->routeIs('tasks.create') ? 'bg-primary' : '' }}"><i class="bi bi-file-earmark-plus"></i> Create Task</a>
    </div>

    <!-- Main Content -->
    <div class="main-content pt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>
