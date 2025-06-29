estem Engineering\6 semester CSE\DBS Lab\xampp\myapp\resources\views\enrollments\my-enrollments.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - Online Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .course-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .course-card:hover {
            transform: translateY(-5px);
        }
        .progress-bar-custom {
            height: 25px;
            border-radius: 12px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">🎓 LearnHub</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('courses.index') }}">All Courses</a>
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
        <h1 class="mb-4">My Enrolled Courses</h1>
        
        <div class="row">
            @forelse($enrollments as $enrollment)
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $enrollment->course->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($enrollment->course->description, 100) }}</p>
                            
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Progress</span>
                                    <span class="text-muted">{{ $enrollment->progress }}%</span>
                                </div>
                                <div class="progress progress-bar-custom">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                         style="width: {{ $enrollment->progress }}%" 
                                         aria-valuenow="{{ $enrollment->progress }}" 
                                         aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Enrolled: {{ $enrollment->enrollment_date->format('M d, Y') }}</small>
                                <a href="{{ route('courses.show', $enrollment->course->id) }}" class="btn btn-primary">Continue Learning</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card text-center">
                        <div class="card-body py-5">
                            <h3>No Courses Enrolled</h3>
                            <p class="text-muted mb-4">You haven't enrolled in any courses yet. Start your learning journey today!</p>
                            <a href="{{ route('courses.index') }}" class="btn btn-primary btn-lg">Browse Courses</a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>