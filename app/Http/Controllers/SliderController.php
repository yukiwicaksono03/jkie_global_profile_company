<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('dashboard-slider', compact('sliders'));
    }

    
    public function create()
    {
        return view('input.slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required|image|mimes:jpg,jpeg,webp|max:2048',
            'desc' => 'nullable|string'
        ]);

        $path = $request->file('path')->store('slider', 'public');

        Slider::create([
            'path' => $path,
            'desc' => $request->desc
        ]);

        return redirect()->route('slider.index')
            ->with('success', 'Slider berhasil ditambahkan');
    }

   
    public function edit(Slider $slider)
    {
        return view('input.slider', compact('slider'));
    }

    
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'path' => 'nullable|image|mimes:jpg,jpeg,webp|max:2048',
            'desc' => 'nullable|string'
        ]);

        if ($request->hasFile('path')) {
            Storage::disk('public')->delete($slider->path);

            $slider->path = $request->file('path')->store('slider', 'public');
        }

        $slider->desc = $request->desc;
        $slider->save();

        return redirect()->route('slider.index')
            ->with('success', 'Slider berhasil diperbarui');
    }

   
    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->path);
        $slider->delete();

        return redirect()->route('slider.index')
            ->with('success', 'Slider berhasil dihapus');
    }
}
