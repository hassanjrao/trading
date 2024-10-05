<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get 6 firms in random order
        $firms=Firm::inRandomOrder()->limit(6)->get();

        // get random firm

        return view('front.home', compact('firms'));
    }
}
