<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['user', 'course'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function myEnrollments()
    {
        $enrollments = Enrollment::where('user_id', auth()->id())
                                ->with('course')
                                ->get();
        return view('enrollments.my-enrollments', compact('enrollments'));
    }
}

