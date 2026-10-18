<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteManagementController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::first();

        return view(
            'super-admin.website.index',
            compact('settings')
        );
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'gst_number' => 'nullable|string|max:20',
            'gst_registered_name' => 'nullable|string|max:255',
            'gst_address' => 'nullable|string',

            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,ico,webp|max:1024',
        ]);

        $settings = WebsiteSetting::first();

        if (!$settings) {
            $settings = new WebsiteSetting();
        }

        $settings->site_name = $request->site_name;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->address = $request->address;

         $settings->gst_number = $request->gst_number;
        $settings->gst_registered_name = $request->gst_registered_name;
        $settings->gst_address = $request->gst_address;

        $settings->facebook = $request->facebook;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;
        $settings->linkedin = $request->linkedin;

        $settings->meta_title = $request->meta_title;
        $settings->meta_description = $request->meta_description;
        $settings->meta_keywords = $request->meta_keywords;

        if ($request->hasFile('logo')) {

            $settings->logo = $request
                ->file('logo')
                ->store('website', 'public');
        }

        if ($request->hasFile('favicon')) {

            $settings->favicon = $request
                ->file('favicon')
                ->store('website', 'public');
        }

        $settings->save();

        return back()->with(
            'success',
            'Website settings updated successfully.'
        );
    }
}
