<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::query()->latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => ['required', 'string', 'max:160'],
        'description' => ['nullable', 'string'],
        'is_active' => ['required', 'boolean'],
        'image' => ['nullable', 'image', 'max:2048'],
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('banners', 'public');
    }

    Banner::create($data);

    return redirect()
        ->route('admin.banners.index')
        ->with('success', 'Banner promo berhasil ditambahkan.');
}

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'description' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner promo berhasil diperbarui.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('success', 'Banner promo berhasil dihapus.');
    }
}