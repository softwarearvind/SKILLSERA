<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\WebsiteSetting;
use App\Models\HeroSlide;
use App\Models\Placement;
use App\Models\Trainer;

class HomeController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::first();
        $heroSlides = HeroSlide::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
       $courses = Course::with('modules')->where('is_active', true)->latest()->take(6)->get();
       $placements = Placement::where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->orderByDesc('id')->get();
       $trainers = Trainer::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();

$courseSlides = $courses->chunk(3);

        $batches = Batch::with('course')
            ->where('is_active', true)
            ->whereDate('start_date', '>=', today())
            ->orderBy('start_date')
            ->take(6)
            ->get();



        return view(
            'frontend.home',
            compact(
                'websiteSetting',
                'courses',
                'batches',
                 'heroSlides',
                 'courseSlides',
                 'placements',
                 'trainers'
            )
        );
    }
}
