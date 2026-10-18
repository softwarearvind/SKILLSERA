<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WebsitePage;
use App\Models\WebsiteSetting;
use App\Models\Course;

class AboutController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::first();

        $page = WebsitePage::where('slug', 'about-us')
            ->where('is_active', true)
            ->first();
       $courses = Course::with('modules')->where('is_active', true)->latest()->take(6)->get();


        return view(
            'frontend.about',
            compact('websiteSetting', 'page','courses')
        );
    }
}
