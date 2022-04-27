<?php

namespace App\Http\Controllers;

use App\User;
use App\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->pending)) {
            $withdrawals = Withdraw::whereStatus(0)->get();
        } elseif (isset($request->rejected)) {
            $withdrawals = Withdraw::whereStatus(2)->get();
        } else {
            $withdrawals = Withdraw::whereStatus(1)->get();
        }


        return view('withdrawal.index', compact('withdrawals'));

    }

    public function accept($id)
    {
        Withdraw::where('id', $id)->update(['status' => 1]);
        return redirect()->back()->withStatus('Withdrawal Request Accepted Successfully ');

    }

    public function reject($id)
    {
        Withdraw::where('id', $id)->update(['status' => 2]);
        return redirect()->back()->withStatus('Withdrawal Request Rejected Successfully');
    }
}
