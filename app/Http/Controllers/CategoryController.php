<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index(){
        $category = Categories::latest()->paginate(10);
        return view("dashboard-category", compact('category'));
    }
    public function create()
    {   
        return view('input.category');
    }

    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('input.category', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categories::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = Categories::findOrFail($id);

        if ($category->menus()->count() > 0) {
            return redirect()->route('admin.category')->with('error', 'Kategori tidak bisa dihapus karena masih digunakan di menu!');
        }

        $category->delete();

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil dihapus!');
    }

}
