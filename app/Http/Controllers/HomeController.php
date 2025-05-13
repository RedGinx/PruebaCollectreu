<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
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

        $transactions = Transaction::where('buyer_id', $user->id)
            ->with('listing')
            ->latest()
            ->paginate(5);

        return view('home', compact('collections', 'transactions'));
    }
}
