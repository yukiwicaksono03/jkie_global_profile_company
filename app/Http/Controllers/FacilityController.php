<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index(){
        $facility = Facility::latest()->paginate(10);
        return view("dashboard-facility", compact("facility"));
    }
    public function create(){
        return view("input.facility");
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('input.facility', compact('facility'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'desc'  => 'required|string',
        ]);

        Facility::create([
            'name'  => $request->name,
            'desc'  => $request->desc,
        ]);

        return redirect()->route('admin.facility')->with('success', 'Facility berhasil ditambahkan!');
    }
    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'desc'  => 'required|string',
        ]);

        $facility->update([
            'name'  => $request->name,
            'desc'  => $request->desc,
        ]);

        return redirect()->route('admin.facility')->with('success', 'Facility berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return redirect()->back()->with('success', 'Facility berhasil dihapus!');
    }
}
