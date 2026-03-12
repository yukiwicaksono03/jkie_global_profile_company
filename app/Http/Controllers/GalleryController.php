<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('dashboard-gallery', compact('galleries'));
    }

    
    public function create()
    {
        return view('input.gallery');
    }

    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required|image|mimes:jpg,jpeg|max:2048',
            'title' => 'required|string',
            'desc' => 'nullable|string'
        ]);

        $path = $request->file('path')->store('gallery', 'public');

        Gallery::create([
            'path' => $path,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery berhasil ditambahkan');
    }

   
    public function edit(Gallery $gallery)
    {
        return view('input.gallery', compact('gallery'));
    }

    
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'path' => 'nullable|image|mimes:jpg,jpeg,webp|max:2048',
            'title' => 'required|string',
            'desc' => 'string',
        ]);

        if ($request->hasFile('path')) {
            Storage::disk('public')->delete($gallery->path);

            $gallery->path = $request->file('path')->store('gallery', 'public');
        }

        $gallery->title = $request->title;
        $gallery->desc = $request->desc;
        $gallery->save();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery berhasil diperbarui');
    }

   
    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->path);
        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery berhasil dihapus');
    }
}
