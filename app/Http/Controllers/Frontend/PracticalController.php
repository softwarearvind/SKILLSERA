<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class PracticalController extends Controller
{
   public function index()
{
    $websiteSetting = WebsiteSetting::first();

    return view('frontend.partical', compact('websiteSetting'));
}
}
