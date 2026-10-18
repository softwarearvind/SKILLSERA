<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::latest()->paginate(10);

        return view('super-admin.trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('super-admin.trainers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'skills' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('trainers', 'public');
        }

        $data['skills'] = collect(explode(',', $request->input('skills', '')))
            ->map(fn ($skill) => trim($skill))
            ->filter()
            ->values()
            ->all();

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $request->input('sort_order', 0);

        Trainer::create($data);

        return redirect()
            ->route('super-admin.trainers.index')
            ->with('success', 'Trainer added successfully.');
    }

    public function edit(Trainer $trainer)
    {
        return view('super-admin.trainers.edit', compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'skills' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            if ($trainer->photo) {
                Storage::disk('public')->delete($trainer->photo);
            }

            $data['photo'] = $request->file('photo')
                ->store('trainers', 'public');
        }

        $data['skills'] = collect(explode(',', $request->input('skills', '')))
            ->map(fn ($skill) => trim($skill))
            ->filter()
            ->values()
            ->all();

        $data['is_active'] = $request->boolean('is_active');

        $trainer->update($data);

        return redirect()
            ->route('super-admin.trainers.index')
            ->with('success', 'Trainer updated successfully.');
    }

    public function destroy(Trainer $trainer)
    {
        if ($trainer->photo) {
            Storage::disk('public')->delete($trainer->photo);
        }

        $trainer->delete();

        return redirect()
            ->route('super-admin.trainers.index')
            ->with('success', 'Trainer deleted successfully.');
    }
}
