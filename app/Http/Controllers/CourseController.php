<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $isEnrolled = false;
        
        if (Auth::check()) {
            $isEnrolled = Enrollment::where('user_id', Auth::id())
                                  ->where('course_id', $id)
                                  ->exists();
        }
        
        return view('courses.show', compact('course', 'isEnrolled'));
    }

    public function enroll($id)
    {
        $course = Course::findOrFail($id);
        
        $existingEnrollment = Enrollment::where('user_id', Auth::id())
                                      ->where('course_id', $id)
                                      ->first();
        
        if (!$existingEnrollment) {
            Enrollment::create([
                'user_id' => Auth::id(),
                'course_id' => $id,
                'progress' => 0,
                'enrollment_date' => now(),
            ]);
        }
        
        return redirect()->route('courses.show', $id)->with('success', 'Successfully enrolled in the course!');
    }
}
