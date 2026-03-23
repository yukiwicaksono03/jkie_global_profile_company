<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index($flag){
        $menus = Menu::with('category')->where('flag','=',$flag)->latest()->paginate(10);

        return view('dashboard-menu', compact('menus', 'flag'));
    }
    public function create($flag){
        $categories = Categories::all();

        return view('input.menu', compact('categories', 'flag'));
    }
    
    public function edit($flag, $id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Categories::all();

        return view('input.menu', compact('menu', 'categories', 'flag'));
    }

    public function store(Request $request, $flag)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'desc'        => 'required|string',
            'path'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'flag'        => '',
        ]);

        $filePath = null;
        if ($request->hasFile('path')) {
            $filePath = $request->file('path')->store('menus', 'public');
        }

        Menu::create([
            'category_id' => 1,
            'price' => 1,
            'is_best'   => 1,
            'name'        => $request->name,
            'desc'        => $request->desc,
            'path'        => $filePath,
            'flag'        => $request->flag,
        ]);

        return redirect()->route('admin.menu', ['flag' => $request->flag])->with('success', 'Menu berhasil ditambahkan!');
    }


    public function update(Request $request, $flag, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'desc'        => 'required|string',
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
            'category_id' => 1,
            'price' => 1,
            'is_best'   => 1,
            'name'        => $request->name,
            'desc'        => $request->desc,
            'path'        => $filePath,
            'flag'        => $request->flag,
        ]);
        return redirect()->route('admin.menu', ['flag' => $request->flag])->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($flag, $id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->path && Storage::disk('public')->exists($menu->path)) {
            Storage::disk('public')->delete($menu->path);
        }

        $menu->delete();

        return redirect()->route('admin.menu', ['flag' => $request->flag])->with('success', 'Menu berhasil dihapus!');
    }
}
