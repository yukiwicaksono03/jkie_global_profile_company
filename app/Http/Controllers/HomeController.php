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
        return view('index', ["master" => $master, "menu" => $menu, "event" => $event, "slider" => $slider, "gallery" => $gallery, "kedai" => $kedai, "wahana" => $wahana]);
    }
    public function about(){
        $master = Master::latest()->first();
        $facilities = Facility::latest()->get();
        $wisata = Entertainment::latest()->get();
        $slider = Slider::find(1);
        return view('about', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata, "slider" => $slider]);
    }
    public function menu(Request $request, $flag){
        $master = Master::latest()->first();
        $category = Categories::latest()->get();
        $menuQuery = Menu::with('category')->where('flag','=',$flag)->latest();
        $slider = Slider::find(2);

        if ($request->has('category') && $request->category != '') {
            $menuQuery->where('category_id', $request->category);
        }
        $menu = $menuQuery->get();
        if($flag == '3'){
            return view('clients', ["master" => $master, "categories" => $category, "menu" => $menu, "slider" => $slider]);
        }else{
            return view('menu', ["master" => $master, "categories" => $category, "menu" => $menu, "slider" => $slider]);
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

    public function menu_detail($id)
    {
        $master = Master::latest()->first();
        $menu = Menu::findOrFail($id);
        $slider = Slider::find(2);

        $language = session('locale','en');
        $desc = $this->translateKeepHtml($menu->desc,$language);
        // dd($menu);
        return view('menu_detail', [
            'master' => $master,
            'menu' => $menu,
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
        $slider = Slider::find(2);
        return view('contact', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata, "slider" => $slider]);
    }

    public function careers(){
        $master = Master::latest()->first();
        $facilities = Facility::latest()->get();
        $wisata = Entertainment::latest()->get();
        $slider = Slider::find(2);
        return view('careers', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata, "slider" => $slider]);
    }
}
