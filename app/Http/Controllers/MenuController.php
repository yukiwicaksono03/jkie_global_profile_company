<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::with('category')->latest()->paginate(10);
        return view("dashboard-menu", compact("menus"));
    }
    public function create(){
        $categories = Categories::all();
        return view("input.menu", compact("categories"));
    }
    
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Categories::all();
        return view('input.menu', compact('menu', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'desc'        => 'required|string',
            'price'        => 'required|numeric',
            'path'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('path')) {
            $filePath = $request->file('path')->store('menus', 'public');
        }

        Menu::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'desc'        => $request->desc,
            'price'        => $request->price,
            'path'        => $filePath,
            'is_best'     => $request->is_best,
        ]);

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'desc'        => 'required|string',
            'price'        => 'required|numeric',
            'path'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $filePath = $menu->path;

        if ($request->hasFile('path')) {
            if ($menu->path && Storage::disk('public')->exists($menu->path)) {
                Storage::disk('public')->delete($menu->path);
            }

            $filePath = $request->file('path')->store('menus', 'public');
        }

        $menu->update([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'desc'        => $request->desc,
            'price'        => $request->price,
            'path'        => $filePath,
            'is_best'     => $request->is_best,
        ]);

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->path && Storage::disk('public')->exists($menu->path)) {
            Storage::disk('public')->delete($menu->path);
        }

        $menu->delete();

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil dihapus!');
    }
}
