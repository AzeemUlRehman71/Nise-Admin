<?php
namespace App\Http\Controllers\Auth;

use App\CheckinCredits;
use App\FriendsCredits;
use App\VideoadCredits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\setting;
use App\User;

use Route;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user    = User::get();

        $setting = setting::get();

        $checkin = CheckinCredits::get();

        $videoad = VideoadCredits::get();

        $friends = FriendsCredits::get();
        return view('dashboard', compact('user', 'checkin', 'videoad', 'friends','setting'));
    }
}
