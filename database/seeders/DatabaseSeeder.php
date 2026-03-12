<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        // ===========================
        // USERS
        // ===========================
        DB::table('users')->insert([
            [
                'name'       => 'Admin Botanika',
                'email'      => 'adminbotanika@gmail.com',
                'password'   => Hash::make('adminwebsitebotanikakuningan2025'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        // ===========================
        // MASTER
        // ===========================
        DB::table('masters')->insert([
            'foto_sejarah' => '-',
            'sejarah' => 'Botanika Coffee berdiri pada tahun 2020 dengan tujuan menghadirkan ruang untuk melepas penat, berbagi cerita, serta menikmati kopi dengan cita rasa terbaik.',
            'desc_facilities' => 'Nikmati berbagai wahana menarik untuk melengkapi pengalaman terbaikmu di Botanika Coffee.',
            'greating_home_1' => 'Selamat datang',
            'greating_home_2' => 'Menikmati Setiap Tegukan Mengabadikan Setiap Sudut',
            'greating_home_3' => 'Lebih dari sekadar kopi, sebuah destinasi. Tempat citarasa berpadu dengan keriaan dan inspirasi. Ciptakan ceritamu di rooftop dan spot foto unik kami',
            'visi' => 'Menjadi tempat terbaik bagi pecinta kopi dan ruang bertemu yang menginspirasi kreativitas, kebersamaan, dan kebaikan.',
            'misi' => 'Menyajikan kopi berkualitas tinggi dari petani lokal, Menciptakan lingkungan ramah dan nyaman untuk semua, Mengadakan event komunitas untuk karya dan kolaborasi.',
            'desc_gallery' => 'Suasana, momen, dan kegiatan terbaik dari kedai kami ☕🎶',
            'desc_our_menu' => 'Pilih kategori favoritmu dan temukan rasa terbaik dari Botanika Coffee.',
            'desc_our_menu_home' => 'Nikmati berbagai menu menarik yang kami selenggarakan di BOTANIKA Coffee setiap minggunya!',
            'desc_event' => 'Temukan beragam acara menarik yang siap memeriahkan hari-harimu! Dari live music, pameran seni, workshop seru, hingga event spesial lainnya, semuanya bisa kamu nikmati di sini.',
            'desc_event_home' => 'Nikmati berbagai kegiatan menarik yang kami selenggarakan di BOTANIKA Coffee setiap minggunya!',
            'kedai_senin' => '',
            'kedai_selasa' => '',
            'kedai_rabu' => '',
            'kedai_kamis' => '',
            'kedai_jumat' => '',
            'kedai_sabtu' => '',
            'kedai_minggu' => '',
            'wahana_senin' => '',
            'wahana_selasa' => '',
            'wahana_rabu' => '',
            'wahana_kamis' => '',
            'wahana_jumat' => '',
            'wahana_sabtu' => '',
            'wahana_minggu' => '',
            'slider_delay' => '3000',
            'title_footer' => 'Botanika',
            'desc' => 'View • Coffee • Food',
            'link_instagram' => '-',
            'link_facebook' => '-',
            'link_youtube' => '-',
            'link_tiktok' => '-',
            'link_maps' => '-',
            'alamat' => 'Alamat: Jl. Boenoet Lembur Kuring, Puncak, Kec. Cigugur, Kabupaten Kuningan, Jawa Barat 45552',
            'whatsapp' => '081324926596',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        // ===========================
        // Facility
        // ===========================
        // DB::table('facilities')->insert([
        //    [ 'name' => 'Free Wifi',
        //     'desc' => 'Akses internet gratis untuk bekerja, belajar, atau sekadar berselancar di dunia maya.'],
        //    [ 'name' => 'Barista Profesional',
        //     'desc' => 'Dilengkapi barista berpengalaman yang meracik kopi dari biji pilihan.'],
        // ]);

        // ===========================
        // CATEGORIES
        // ===========================
        $categories = [
            ['name' => 'Coffee', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Non Coffee', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Food', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Snack', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dessert', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);


        // ===========================
        // MENUS 
        // ===========================
        // $menus = [];
        // $trueIndexes = collect(range(1, 50))->shuffle()->take(4)->toArray();
        // for ($i = 1; $i <= 50; $i++) {
        //     $menus[] = [
        //         'category_id' => rand(1, 5),
        //         'name' => "Menu $i",
        //         'desc' => "Deskripsi menu ke-$i",
        //         'path' => "storage/menu/menu_$i.jpg",
        //         "price" => "100000",
        //         'is_best' => in_array($i, $trueIndexes),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // DB::table('menus')->insert($menus);



        // ===========================
        // EVENTS 
        // ===========================
        // $events = [];
        // for ($i = 1; $i <= 20; $i++) {
        //     $events[] = [
        //         'name' => "Event $i",
        //         'desc' => "Deskripsi event ke-$i",
        //         'photo' => "storage/event/event_$i.jpg",
        //         'date' => Carbon::now()->addDays($i),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // DB::table('events')->insert($events);
    }
}
