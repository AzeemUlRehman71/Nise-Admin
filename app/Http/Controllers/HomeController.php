<?php

namespace App\Http\Controllers;

use App\CheckinCredits;
use App\FriendsCredits;
use App\VideoadCredits;
use Illuminate\Http\Request;
use App\setting;
use App\User;


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
        $user    = User::get();
        $setting = array();//setting::get();  
        $checkin = array();//CheckinCredits::first();
        $videoad = array();//VideoadCredits::first();
        $friends = array();//FriendsCredits::first();
        // dd($checkin);

        return view('dashboard', compact('user', 'checkin', 'videoad', 'friends','setting'));
    }
}
