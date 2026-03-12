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

class HomeController extends Controller
{
    public function index(){
        $master = Master::latest()->first();
        $kedai = $master->groupedKedai();
        $wahana = $master->groupedWahana();
        $menu = Menu::latest()->where("is_best", true)->get();
        $event = Event::latest()->limit(3)->get();
        $slider = Slider::latest()->get();
        $gallery = Gallery::latest()->get();
        return view('index', ["master" => $master, "menu" => $menu, "event" => $event, "slider" => $slider, "gallery" => $gallery, "kedai" => $kedai, "wahana" => $wahana]);
    }
    public function about(){
        $master = Master::latest()->first();
        $facilities = Facility::latest()->get();
        $wisata = Entertainment::latest()->get();
        return view('about', ["master" => $master, "facilities" => $facilities, "wisata" => $wisata]);
    }
    public function menu(Request $request){
        $master = Master::latest()->first();
        $category = Categories::latest()->get();
        $menuQuery = Menu::with('category')->latest();

        if ($request->has('category') && $request->category != '') {
            $menuQuery->where('category_id', $request->category);
        }
        $menu = $menuQuery->get();
        return view('menu', ["master" => $master, "categories" => $category, "menu" => $menu]);
    }

    public function menu_detail($id)
    {
        $master = Master::latest()->first();
        $menu = Menu::findOrFail($id);
        // dd($menu);
        return view('menu_detail', [
            'master' => $master,
            'menu' => $menu
        ]);
    }

    public function event (Request $request)
    {
        $master = Master::latest()->first();
        $query = Event::query();

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
}
