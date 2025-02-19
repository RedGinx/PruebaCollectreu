<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class
HomeController extends Controller
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
        $user = auth()->user();
        $collections = $user->collections()->orderBy('updated_at', 'desc')->take(4)->get();
        return view('home', compact('collections'));
    }
}
