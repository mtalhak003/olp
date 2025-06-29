<!-- filepath: t:\Computer Syestem Engineering\6 semester CSE\DBS Lab\xampp\myapp\resources\views\courses\show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - Online Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .course-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 0;
        }
        .course-info {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-top: -2rem;
            position: relative;
            z-index: 1;
        }
        .btn-enroll {
            background: linear-gradient(45deg, #28a745, #20c997);
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: bold;
        }
        .btn-enrolled {
            background: #6c757d;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">🎓 LearnHub</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('courses.index') }}">← Back to Courses</a>
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

    <div class="course-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 mb-3">{{ $course->title }}</h1>
                    <p class="lead">{{ $course->description }}</p>
                </div>
                <div class="col-lg-4 text-end">
                    @if($course->image_url)
                        <img src="{{ $course->image_url }}" class="img-fluid rounded" alt="{{ $course->title }}" style="max-height: 200px;">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="course-info">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8">
                    <h3>About This Course</h3>
                    <p class="text-muted">{{ $course->description }}</p>
                    
                    <h4 class="mt-4">Course Details</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">👨‍🏫 <strong>Instructor:</strong> {{ $course->instructor }}</li>
                        <li class="mb-2">⏱️ <strong>Duration:</strong> {{ $course->duration }}</li>
                        <li class="mb-2">💰 <strong>Price:</strong> ${{ $course->price }}</li>
                    </ul>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h2 class="text-success mb-3">${{ $course->price }}</h2>
                            
                            @if($isEnrolled)
                                <button class="btn btn-enrolled text-white w-100" disabled>
                                    ✓ Already Enrolled
                                </button>
                                <small class="text-muted d-block mt-2">You're enrolled in this course</small>
                            @else
                                <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-enroll text-white w-100">
                                        Enroll Now
                                    </button>
                                </form>
                                <small class="text-muted d-block mt-2">30-day money-back guarantee</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>