<?php

namespace App\Http\Controllers;

use App\setting;
use Illuminate\Http\Request;
use App\User;
use App\CheckinCredits;
use App\VideoadCredits;
use App\FriendsCredits;
use App\CallRate;
use DB;
class CallRatesController extends Controller
{
    public function index(){

        $call_rate = CallRate::get();
        $user    = User::get();
        $setting = setting::get();
        $checkin = CheckinCredits::first();
        $videoad = VideoadCredits::first();
        $friends = FriendsCredits::first();

        return view('users.call-rates', compact('call_rate', 'checkin', 'videoad', 'friends', 'user' ,'setting'));
    }

    public function edit(Request $request, $id){
        $edit = CallRate::where('id', $id)->first();
        return view('users.call-rates-edit', compact('edit'));
    }

    public function update(Request $request, $id){
        $update = CallRate::find($id);
        DB::table('call_rates')->where('id', $id)->update([
            'call_rate' => $request->call_rate
            ]);

        return redirect()->back()->withStatus('Call Rate edit successfully');
    }

    public function addCredit(Request $request){
        $this->validate($request,[
            'addcredit' => 'required|numeric '
            ]);

        DB::table('call_rates')->increment('call_rate', $request->addcredit);

        return redirect()->back()->withStatus('Call Rate added successfully');

    }

    public function minusCredit(Request $request){
        $this->validate($request,[
            'minuscredit' => 'required|numeric '
            ]);

        DB::table('call_rates')->decrement('call_rate', $request->minuscredit);

        return redirect()->back()->withStatus('Call Rate minus successfull');

    }

    public function reset(){
        $pdo = DB::connection()->getPdo();
        $sql = 'UPDATE call_rates SET call_rate = cost';
        $reset = $pdo->prepare($sql);
        $reset->execute();

        return redirect()->back()->withStatus('Call Rate reset with the Cost value successfull');

    }
}
