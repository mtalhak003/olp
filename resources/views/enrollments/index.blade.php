<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Enrollments - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .table th {
            background: #f8f9fa;
            border: none;
            font-weight: 600;
        }
        .progress-bar-custom {
            height: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">🎓 LearnHub Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                <a class="nav-link" href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">All Enrollments</h1>
        
        <div class="table-container">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Progress</th>
                        <th>Enrollment Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->id }}</td>
                        <td>
                            <div>
                                <strong>{{ $enrollment->user->name }}</strong>
                                <br>
                                <small class="text-muted">{{ $enrollment->user->email }}</small>
                            </div>
                        </td>
                        <td>
                            <div>
                                <strong>{{ $enrollment->course->title }}</strong>
                                <br>
                                <small class="text-muted">{{ $enrollment->course->instructor }}</small>
                            </div>
                        </td>
                        <td>
                            <div class="progress progress-bar-custom">
                                <div class="progress-bar bg-success" role="progressbar" 
                                     style="width: {{ $enrollment->progress }}%" 
                                     aria-valuenow="{{ $enrollment->progress }}" 
                                     aria-valuemin="0" aria-valuemax="100">
                                    {{ $enrollment->progress }}%
                                </div>
                            </div>
                        </td>
                        <td>{{ $enrollment->enrollment_date->format('M d, Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="text-muted">
                                <h5>No enrollments found</h5>
                                <p>No students have enrolled in courses yet.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
