<?php

namespace App\Http\Controllers;

use App\Models\Entertainment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntertainmentController extends Controller
{
    public function index()
    {
        $entertainments = Entertainment::latest()->paginate(10);
        return view('dashboard-entertainment', compact('entertainments'));
    }

    
    public function create()
    {
        return view('input.entertainment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'path_1' => 'required|image|mimes:jpg,jpeg|max:2048',
            'path_2' => 'required|image|mimes:jpg,jpeg|max:2048',
            'path_3' => 'required|image|mimes:jpg,jpeg|max:2048',
            'price_weekday' => 'required|numeric',
            'price_weekend' => 'required|numeric',
            'title' => 'required|string',
            'desc' => 'nullable|string'
        ]);

        $path1 = $request->file('path_1')->store('entertainment', 'public');
        $path2 = $request->file('path_2')->store('entertainment', 'public');
        $path3 = $request->file('path_3')->store('entertainment', 'public');

        Entertainment::create([
            'path_1' => $path1,
            'path_2' => $path2,
            'path_3' => $path3,
            'price_weekday' => $request->price_weekday,
            'price_weekend' => $request->price_weekend,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        return redirect()->route('entertainment.index')
            ->with('success', 'Wahana berhasil ditambahkan');
    }

   
    public function edit(Entertainment $entertainment)
    {
        return view('input.entertainment', compact('entertainment'));
    }

    
    public function update(Request $request, Entertainment $entertainment)
    {
        $request->validate([
            'path_1' => 'image|mimes:jpg,jpeg|max:2048',
            'path_2' => 'image|mimes:jpg,jpeg|max:2048',
            'path_3' => 'image|mimes:jpg,jpeg|max:2048',
            'price_weekday' => 'required|numeric',
            'price_weekend' => 'required|numeric',
            'title' => 'required|string',
            'desc' => 'required|string',
        ]);

        if ($request->hasFile('path_1')) {
            Storage::disk('public')->delete($entertainment->path_1);

            $entertainment->path_1 = $request->file('path_1')->store('entertainment', 'public');
        }
        if ($request->hasFile('path_2')) {
            Storage::disk('public')->delete($entertainment->path_2);

            $entertainment->path_2 = $request->file('path_2')->store('entertainment', 'public');
        }
        if ($request->hasFile('path_3')) {
            Storage::disk('public')->delete($entertainment->path_3);

            $entertainment->path_3 = $request->file('path_3')->store('entertainment', 'public');
        }

        $entertainment->title = $request->title;
        $entertainment->desc = $request->desc;
        $entertainment->price_weekend = $request->price_weekend;
        $entertainment->price_weekday = $request->price_weekday;
        $entertainment->save();

        return redirect()->route('entertainment.index')
            ->with('success', 'Entertainment berhasil diperbarui');
    }

   
    public function destroy(Entertainment $entertainment)
    {
        Storage::disk('public')->delete($entertainment->path_1);
        Storage::disk('public')->delete($entertainment->path_2);
        Storage::disk('public')->delete($entertainment->path_3);
        $entertainment->delete();

        return redirect()->route('entertainment.index')
            ->with('success', 'Wahana berhasil dihapus');
    }
}
