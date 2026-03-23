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
            'path_1'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'path_2'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'path_3'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'path_4'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'flag'        => '',
        ]);

        $filePath1 = $filePath2 = $filePath3 = $filePath4 = null;
        if ($request->hasFile('path1')) {
            $filePath1 = $request->file('path1')->store('menus', 'public');
        }
        if ($request->hasFile('path2')) {
            $filePath2 = $request->file('path2')->store('menus', 'public');
        }
        if ($request->hasFile('path3')) {
            $filePath3 = $request->file('path3')->store('menus', 'public');
        }
        if ($request->hasFile('path4')) {
            $filePath4 = $request->file('path4')->store('menus', 'public');
        }

        Menu::create([
            'category_id' => 1,
            'price' => 1,
            'is_best'   => 1,
            'name'        => $request->name,
            'desc'        => $request->desc,
            'path_1'        => $filePath1,
            'path_2'        => $filePath2,
            'path_3'        => $filePath3,
            'path_4'        => $filePath4,
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
            'path_1'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'path_2'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'path_3'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'path_4'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $filePath1 = $filePath2 = $filePath3 = $filePath4 = $menu->path;
        if (($request->hasFile('path_1')) && ($menu->path_1 != '')) {
            if ($menu->path_1 && Storage::disk('public')->exists($menu->path_1)) {
                Storage::disk('public')->delete($menu->path_1);
            }

            $filePath1 = $request->file('path_1')->store('menus', 'public');
        }else{
            $filePath1 = $menu->path_1;
        }
        
        if (($request->hasFile('path_2')) && ($menu->path_2 != '')) {
            if ($menu->path_2 && Storage::disk('public')->exists($menu->path_2)) {
                Storage::disk('public')->delete($menu->path_2);
            }

            $filePath2 = $request->file('path_2')->store('menus', 'public');
        }else{
            $filePath2 = $menu->path_2;
        }
        
        if (($request->hasFile('path_3')) && ($menu->path_3 != '')) {
            if ($menu->path_3 && Storage::disk('public')->exists($menu->path_3)) {
                Storage::disk('public')->delete($menu->path_3);
            }

            $filePath3 = $request->file('path_3')->store('menus', 'public');
        }else{
            $filePath3 = $menu->path_3;
        }
        
        if (($request->hasFile('path_4')) && ($menu->path_4 != '')) {
            if ($menu->path_4 && Storage::disk('public')->exists($menu->path_4)) {
                Storage::disk('public')->delete($menu->path_4);
            }

            $filePath4 = $request->file('path_4')->store('menus', 'public');
        }else{
            $filePath4 = $menu->path_4;
        }
        

        $menu->update([
            'category_id' => 1,
            'price' => 1,
            'is_best'   => 1,
            'name'        => $request->name,
            'desc'        => $request->desc,
            'path_1'        => $filePath1,
            'path_2'        => $filePath2,
            'path_3'        => $filePath3,
            'path_4'        => $filePath4,
            'flag'        => $request->flag,
        ]);
        return redirect()->route('admin.menu', ['flag' => $request->flag])->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($flag, $id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->path_1 && Storage::disk('public')->exists($menu->path_1)) {
            Storage::disk('public')->delete($menu->path_1);
        }
        if ($menu->path_2 && Storage::disk('public')->exists($menu->path_2)) {
            Storage::disk('public')->delete($menu->path_2);
        }
        if ($menu->path_3 && Storage::disk('public')->exists($menu->path_3)) {
            Storage::disk('public')->delete($menu->path_3);
        }
        if ($menu->path_4 && Storage::disk('public')->exists($menu->path_4)) {
            Storage::disk('public')->delete($menu->path_4);
        }

        $menu->delete();

        return redirect()->route('admin.menu', ['flag' => $flag])->with('success', 'Menu berhasil dihapus!');
    }
}
