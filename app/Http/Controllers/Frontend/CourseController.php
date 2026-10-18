<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\WebsiteSetting;

class CourseController extends Controller
{
    // Show all active courses
    public function index()
    {
        $websiteSetting = WebsiteSetting::first();

        $courses = Course::with([
            'modules' => function ($query) {
                $query->where('is_active', true)
                      ->orderBy('sort_order');
            }
        ])
        ->where('is_active', true)
        ->latest()
        ->paginate(9);

        return view(
            'frontend.courses.index',
            compact('websiteSetting', 'courses')
        );
    }

    // Show single course details
    public function show($id)
    {
        $websiteSetting = WebsiteSetting::first();

        $course = Course::with([
            'modules' => function ($query) {
                $query->where('is_active', true)
                      ->orderBy('sort_order');
            }
        ])
        ->where('is_active', true)
        ->findOrFail($id);

        return view(
            'frontend.courses.show',
            compact('websiteSetting', 'course')
        );
    }
}
