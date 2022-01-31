<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rack;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['validateClient']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $racks = Rack::with('books')->paginate(10);
        return view('home', compact('racks'));
    }
}
