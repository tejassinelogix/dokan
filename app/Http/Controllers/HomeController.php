<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Product;
use App\Homebanner;
use App\Subbanner;
use App\Blogsection;
use App\Promobanner;
use App\Clientlogo;
use App;
use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $new_arrival = Product::where('new_arrival', '1')->paginate(50);
        $data = category::latest()->paginate(50);
        $banner = Homebanner::latest()->paginate(50);
        $subbanner = Subbanner::latest()->orderBy('id', 'desc')->paginate(50);
        $blogsection = Blogsection::latest()->paginate(50);
        $product = Product::get();
        $promobanner = Promobanner::get();
        $clientlogo = Clientlogo::get();
        $locale_lan = Session::get('locale');
        return view('index', compact('data', 'new_arrival', 'locale_lan', 'banner', 'subbanner', 'blogsection', 'product', 'promobanner', 'clientlogo'));
    }
}
