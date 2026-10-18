<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('sort_order')
            ->orderBy('id')
            ->paginate(10);

        return view('super-admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('super-admin.hero-slides.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateSlide($request);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('hero-slides', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        HeroSlide::create($data);

        return redirect()
            ->route('super-admin.hero-slides.index')
            ->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('super-admin.hero-slides.edit', [
            'slide' => $heroSlide,
        ]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $data = $this->validateSlide($request);

        if ($request->hasFile('logo')) {
            if ($heroSlide->logo) {
                Storage::disk('public')->delete($heroSlide->logo);
            }

            $data['logo'] = $request->file('logo')
                ->store('hero-slides', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $heroSlide->update($data);

        return redirect()
            ->route('super-admin.hero-slides.index')
            ->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        if ($heroSlide->logo) {
            Storage::disk('public')->delete($heroSlide->logo);
        }

        $heroSlide->delete();

        return redirect()
            ->route('super-admin.hero-slides.index')
            ->with('success', 'Hero slide deleted successfully.');
    }

    public function toggleStatus(HeroSlide $heroSlide)
    {
        $heroSlide->update([
            'is_active' => ! $heroSlide->is_active,
        ]);

        return back()->with('success', 'Slide status updated.');
    }

    private function validateSlide(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'card1_icon' => 'nullable|string|max:100',
            'card1_title' => 'nullable|string|max:255',
            'card1_text' => 'nullable|string|max:255',

            'card2_icon' => 'nullable|string|max:100',
            'card2_title' => 'nullable|string|max:255',
            'card2_text' => 'nullable|string|max:255',

            'card3_icon' => 'nullable|string|max:100',
            'card3_title' => 'nullable|string|max:255',
            'card3_text' => 'nullable|string|max:255',

            'button1_text' => 'nullable|string|max:100',
            'button1_url' => 'nullable|string|max:2048',
            'button2_text' => 'nullable|string|max:100',
            'button2_url' => 'nullable|string|max:2048',

            'sort_order' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);
    }
}
