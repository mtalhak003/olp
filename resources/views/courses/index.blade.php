<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - Online Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .course-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .price-badge {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">🎓 LearnHub</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('enrollments.my') }}">My Courses</a>
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
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="display-4 text-center mb-2">Discover Amazing Courses</h1>
                <p class="lead text-center text-muted">Expand your knowledge with our expert-led courses</p>
            </div>
        </div>
        
        <div class="row">
            @forelse($courses as $course)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        @if($course->image_url)
                            <img src="{{ $course->image_url }}" class="card-img-top" alt="{{ $course->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-gradient" style="height: 200px; background: linear-gradient(45deg, #667eea, #764ba2);"></div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($course->description, 120) }}</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">👨‍🏫 {{ $course->instructor }}</small>
                                    <small class="text-muted">⏱️ {{ $course->duration }}</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price-badge">${{ $course->price }}</span>
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <h4>No courses available</h4>
                        <p>Check back later for new courses!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
