<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;


class BatchController extends Controller
{
     public function index()
    {
        $batches = Batch::with('course')
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('frontend.batches', compact('batches'));
    }
}
