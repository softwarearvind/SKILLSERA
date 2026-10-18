<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\NavbarItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NavbarItemController extends Controller
{
    public function index()
    {
        $items = NavbarItem::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('super-admin.navbar.index', compact('items'));
    }

    public function create()
    {
        return view('super-admin.navbar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'url' => 'nullable|string|max:255',
            'type' => [
                'required',
                Rule::in(['link', 'demo', 'login']),
            ],
            'target' => [
                'required',
                Rule::in(['_self', '_blank']),
            ],
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        NavbarItem::create($data);

        return redirect()
            ->route('super-admin.navbar.index')
            ->with('success', 'Navbar item added successfully.');
    }

    public function edit(NavbarItem $navbar)
    {
        return view('super-admin.navbar.edit', [
            'item' => $navbar,
        ]);
    }

    public function update(Request $request, NavbarItem $navbar)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'url' => 'nullable|string|max:255',
            'type' => [
                'required',
                Rule::in(['link', 'demo', 'login']),
            ],
            'target' => [
                'required',
                Rule::in(['_self', '_blank']),
            ],
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $navbar->update($data);

        return redirect()
            ->route('super-admin.navbar.index')
            ->with('success', 'Navbar item updated successfully.');
    }

    public function destroy(NavbarItem $navbar)
    {
        $navbar->delete();

        return redirect()
            ->route('super-admin.navbar.index')
            ->with('success', 'Navbar item deleted successfully.');
    }
}
