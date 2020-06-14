<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tender;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $tenders = Tender::count();
        $active_tenders = Tender::where('status', true)->with('tenderCategories')->get();
        //dd($tenders->toArray());
        return view('home', compact('active_tenders', 'tenders'));
    }
}
