<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlacementController extends Controller
{
    public function index()
    {
        $placements = Placement::orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(15);

        return view('super-admin.placements.index', compact('placements'));
    }

    public function create()
    {
        return view('super-admin.placements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'college_name' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_role' => 'required|string|max:255',
            'course_name' => 'nullable|string|max:255',
            'announcement' => 'nullable|string',
            'sort_order' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('student_photo')) {
            $data['student_photo'] = $request
                ->file('student_photo')
                ->store('placements', 'public');
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        Placement::create($data);

        return redirect()
            ->route('super-admin.placements.index')
            ->with('success', 'Placement added successfully.');
    }

    public function edit(Placement $placement)
    {
        return view(
            'super-admin.placements.edit',
            compact('placement')
        );
    }

    public function update(Request $request, Placement $placement)
    {
        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'college_name' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_role' => 'required|string|max:255',
            'course_name' => 'nullable|string|max:255',
            'announcement' => 'nullable|string',
            'sort_order' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('student_photo')) {
            if ($placement->student_photo) {
                Storage::disk('public')->delete(
                    $placement->student_photo
                );
            }

            $data['student_photo'] = $request
                ->file('student_photo')
                ->store('placements', 'public');
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        $placement->update($data);

        return redirect()
            ->route('super-admin.placements.index')
            ->with('success', 'Placement updated successfully.');
    }

    public function destroy(Placement $placement)
    {
        if ($placement->student_photo) {
            Storage::disk('public')->delete(
                $placement->student_photo
            );
        }

        $placement->delete();

        return redirect()
            ->route('super-admin.placements.index')
            ->with('success', 'Placement deleted successfully.');
    }
}
