<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        $master = Master::first();
        return view("dashboard", compact('master'));
    }
    public function update(Request $request)
    {
        $master = Master::firstOrFail();

        $data = $request->validate([
            'greating_home_1' => 'nullable|string',
            'greating_home_2' => 'nullable|string',
            'greating_home_3' => 'nullable|string',

            'kedai_senin' => 'nullable|string',
            'kedai_selasa' => 'nullable|string',
            'kedai_rabu' => 'nullable|string',
            'kedai_kamis' => 'nullable|string',
            'kedai_jumat' => 'nullable|string',
            'kedai_sabtu' => 'nullable|string',
            'kedai_minggu' => 'nullable|string',

            'wahana_senin' => 'nullable|string',
            'wahana_selasa' => 'nullable|string',
            'wahana_rabu' => 'nullable|string',
            'wahana_kamis' => 'nullable|string',
            'wahana_jumat' => 'nullable|string',
            'wahana_sabtu' => 'nullable|string',
            'wahana_minggu' => 'nullable|string',

            'desc_wahana' => 'nullable|string',
            'desc_gallery' => 'nullable|string',
            'desc_facilities' => 'nullable|string',
            'desc_our_menu' => 'nullable|string',
            'desc_our_menu_home' => 'nullable|string',
            'desc_event' => 'nullable|string',
            'desc_event_home' => 'nullable|string',

            'foto_sejarah_1' => 'nullable|image|mimes:jpg,jpeg,webp|max:2048',
            'foto_sejarah_2' => 'nullable|image|mimes:jpg,jpeg,webp|max:2048',
            'foto_sejarah_3' => 'nullable|image|mimes:jpg,jpeg,webp|max:2048',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',

            'slider_delay' => 'nullable|string',
            'title_footer' => 'nullable|string',
            'desc' => 'nullable|string',

            'link_instagram' => 'nullable|string',
            'link_facebook' => 'nullable|string',
            'link_youtube' => 'nullable|string',
            'link_tiktok' => 'nullable|string',
            'link_maps' => 'nullable|string',

            'alamat' => 'nullable|string',
            'whatsapp' => 'nullable|string',
        ]);


        if ($request->hasFile('foto_header')) {
            if ($master->foto_header && Storage::disk('public')->exists($master->foto_header)) {
                Storage::disk('public')->delete($master->foto_header);
            }
            $filePath = $request->file('foto_header')->store('home', 'public');
            $data['foto_header'] = $filePath;
        }

        if ($request->hasFile('foto_sejarah_1')) {
            if ($master->foto_sejarah_1 && Storage::disk('public')->exists($master->foto_sejarah_1)) {
                Storage::disk('public')->delete($master->foto_sejarah_1);
            }
            $filePath = $request->file('foto_sejarah_1')->store('home', 'public');
            $data['foto_sejarah_1'] = $filePath;
        }
        if ($request->hasFile('foto_sejarah_2')) {
            if ($master->foto_sejarah_2 && Storage::disk('public')->exists($master->foto_sejarah_2)) {
                Storage::disk('public')->delete($master->foto_sejarah_2);
            }
            $filePath = $request->file('foto_sejarah_2')->store('home', 'public');
            $data['foto_sejarah_2'] = $filePath;
        }
        if ($request->hasFile('foto_sejarah_3')) {
            if ($master->foto_sejarah_3 && Storage::disk('public')->exists($master->foto_sejarah_3)) {
                Storage::disk('public')->delete($master->foto_sejarah_3);
            }
            $filePath = $request->file('foto_sejarah_3')->store('home', 'public');
            $data['foto_sejarah_3'] = $filePath;
        }
        if ($request->hasFile('foto_sejarah_4')) {
            if ($master->foto_sejarah_4 && Storage::disk('public')->exists($master->foto_sejarah_4)) {
                Storage::disk('public')->delete($master->foto_sejarah_4);
            }
            $filePath = $request->file('foto_sejarah_4')->store('home', 'public');
            $data['foto_sejarah_4'] = $filePath;
        }


        $master->update($data);

        return redirect()->route('dashboard')->with('success', 'Master berhasil diperbarui!');

    }
}
