<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Menu;
use App\Models\Categories;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Entertainment;
use Stichoza\GoogleTranslate\GoogleTranslate;

class HomeController extends Controller
{

    public function index(){
        $master = Master::latest()->first();
        $kedai = $master->groupedKedai();
        $wahana = $master->groupedWahana();
        $menu = Menu::latest()->where('flag','=','1')->get();
        $event = Event::latest()->limit(3)->get();
        $slider = Slider::find(1);
        $gallery = Gallery::latest()->get();

        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();
        return view('index', ["master" => $master, "menu" => $menu, "menu_by_folder" => $menu_by_folder, "menu_by_dropdown" => $menu_by_dropdown, "event" => $event, "slider" => $slider, "gallery" => $gallery, "kedai" => $kedai, "wahana" => $wahana]);
    }
    public function about(){
        $master = Master::latest()->first();
        $facilities = Facility::latest()->get();
        $wisata = Entertainment::latest()->get();
        $slider = Slider::find(2);

        $desc_who_we_are = $this->translateKeepHtml($master->sejarah,bahasa());

        $menuQuery = Menu::with('category')->where('flag','=',5)->latest();
        $menu = $menuQuery->get();

        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();
        
        return view('about', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata, "slider" => $slider, "desc_who_we_are" => $desc_who_we_are, "menu" => $menu, "menu_by_folder" => $menu_by_folder, "menu_by_dropdown" => $menu_by_dropdown]);
    }
    public function menu(Request $request, $flag){
        $master = Master::latest()->first();
        $category = Categories::latest()->get();
        $menuQuery = Menu::with('category')->where('flag','=',$flag)->latest();

        $disp_desc = 'none !important;';
        if($flag == 1){
            $slider = Slider::find(3);
            $menutitle = $this->translateKeepHtml('Service & Product',bahasa());
            $menudesc = $this->translateKeepHtml('We deliver comprehensive inspection engineering services and solutions to ensure quality, compliance, and reliability across all project phases.',bahasa());
        }elseif($flag == 2){
            $slider = Slider::find(4);
            $menutitle = $this->translateKeepHtml('Insights',bahasa());
            $menudesc = $this->translateKeepHtml('We provide data-driven insights and technical analysis to support informed decision-making and continuous improvement in inspection and engineering processes.',bahasa());
            $disp_desc = '';
        }elseif($flag == 3){
            $slider = Slider::find(5);
        }elseif($flag == 4){
            $slider = Slider::find(6);
        }

        if ($request->has('category') && $request->category != '') {
            $menuQuery->where('category_id', $request->category);
        }
        $menu = $menuQuery->get();

        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();
        if($flag == '3'){
            return view('clients', ["master" => $master, "categories" => $category, "menu" => $menu, "menu_by_folder" => $menu_by_folder, "menu_by_dropdown" => $menu_by_dropdown, "slider" => $slider]);
        }elseif($flag == '4'){
            return view('careers', ["master" => $master, "categories" => $category, "menu" => $menu, "menu_by_folder" => $menu_by_folder, "menu_by_dropdown" => $menu_by_dropdown, "slider" => $slider]);
        }else{
            return view('menu', ["master" => $master, "categories" => $category, "menu" => $menu, "menu_by_folder" => $menu_by_folder, "menu_by_dropdown" => $menu_by_dropdown, "slider" => $slider, 'menutitle' => $menutitle, 'menudesc'  => $menudesc, 'disp_desc' => $disp_desc]);
        }
    }

    function translateKeepHtml($text, $target = 'id') {
        // Step 1: Extract tags
        preg_match_all('/<[^>]+>/', $text, $matches);

        $placeholders = [];
        $cleanText = $text;

        foreach ($matches[0] as $i => $tag) {
            $key = "__TAG{$i}__";
            $placeholders[$key] = $tag;
            $cleanText = str_replace($tag, $key, $cleanText);
        }

        // Step 2: Translate text without tags
        $tr = new GoogleTranslate($target);
        $translated = $tr->translate($cleanText);

        // Step 3: Restore tags
        foreach ($placeholders as $key => $tag) {
            $translated = str_replace($key, $tag, $translated);
        }

        return $translated;
    }

    public function menu_detail_by_client($id)
    {
        $master = Master::latest()->first();
        $category = Categories::latest()->get();
        $menuQuery = Menu::with('category')->where('flag','=',3)->latest();

        $disp_desc = 'none !important;';
        if($id == 1){
            $slider = Slider::find(3);
            $menutitle = $this->translateKeepHtml('Service & Product',bahasa());
            $menudesc = $this->translateKeepHtml('We deliver comprehensive inspection engineering services and solutions to ensure quality, compliance, and reliability across all project phases.',bahasa());
        }elseif($id == 2){
            $slider = Slider::find(4);
            $menutitle = $this->translateKeepHtml('Insights',bahasa());
            $menudesc = $this->translateKeepHtml('We provide data-driven insights and technical analysis to support informed decision-making and continuous improvement in inspection and engineering processes.',bahasa());
            $disp_desc = '';
        }elseif($id == 3){
            $slider = Slider::find(5);
        }elseif($id == 4){
            $slider = Slider::find(6);
        }

        if ($id != '') {
            $menuQuery->where('type_client', $id);
        }
        $menu = $menuQuery->get();

        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();

            return view('menu_detail_by_client', ["master" => $master, "categories" => $category, "menu" => $menu, "menu_by_folder" => $menu_by_folder, "menu_by_dropdown" => $menu_by_dropdown, "slider" => $slider]);
        }

    public function menu_detail_by_dropdown($id)
    {
        $master = Master::latest()->first();
        $menu = Menu::findOrFail($id);
        $slider = Slider::find(2);

        $desc = $menu->desc;
        if($id <> 49){
            $desc = $this->translateKeepHtml($menu->desc,bahasa());
        }
        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();

        return view('menu_detail_by_dropdown', [
            'master' => $master,
            'menu' => $menu,
            'menu_by_folder' => $menu_by_folder,
            'menu_by_dropdown' => $menu_by_dropdown,
            'slider' => $slider,
            'desc'  => $desc,
        ]);
    }

    public function menu_detail_by_folder($id)
    {
        $master = Master::latest()->first();
        $menu = Menu::findOrFail($id);
        $slider = Slider::find(2);

        $desc = $this->translateKeepHtml($menu->desc,bahasa());
        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();

        return view('menu_detail_by_folder', [
            'master' => $master,
            'menu' => $menu,
            'menu_by_folder' => $menu_by_folder,
            'menu_by_dropdown' => $menu_by_dropdown,
            'slider' => $slider,
            'desc'  => $desc,
        ]);
    }

    public function menu_detail($id)
    {
        $master = Master::latest()->first();
        $menu = Menu::findOrFail($id);
        $slider = Slider::find(2);

        $desc = $this->translateKeepHtml($menu->desc,bahasa());

        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();

        return view('menu_detail', [
            'master' => $master,
            'menu' => $menu,
            'menu_by_folder' => $menu_by_folder,
            'menu_by_dropdown' => $menu_by_dropdown,
            'slider' => $slider,
            'desc'  => $desc,
        ]);
    }

    public function event (Request $request)
    {
        $master = Master::latest()->first();
        $query = Event::query();
        $slider = Slider::find(2);

        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }

        if ($request->filled('month')) {
            $query->whereMonth('date', $request->month);
        }

        $events = $query->latest()->paginate(10);

        return view('event', [
            'master' => $master,
            'events' => $events
        ]);
    }

    public function clients(){
        $master = Master::latest()->first();
        $facilities = Facility::latest()->get();
        $wisata = Entertainment::latest()->get();
        $slider = Slider::find(2);
        return view('clients', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata, "slider" => $slider]);
    }

    public function contact(){
        $master = Master::latest()->first();
        $facilities = Facility::latest()->get();
        $wisata = Entertainment::latest()->get();
        $slider = Slider::find(7);

        $menuQuery_by_folder = Menu::with('category')->where('flag','=',5)->orderBy('urutan', 'asc');
        $menu_by_folder = $menuQuery_by_folder->get();
        $menuQuery_by_dropdown = Menu::with('category')->where('flag','=',1)->orderBy('urutan', 'asc');
        $menu_by_dropdown = $menuQuery_by_dropdown->get();
        return view('contact', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata, "slider" => $slider, "menu_by_folder" => $menu_by_folder, "menu_by_dropdown" => $menu_by_dropdown]);
    }

    public function careers(){
        $master = Master::latest()->first();
        $facilities = Facility::latest()->get();
        $wisata = Entertainment::latest()->get();
        $slider = Slider::find(2);
        return view('careers', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata, "slider" => $slider]);
    }
}
