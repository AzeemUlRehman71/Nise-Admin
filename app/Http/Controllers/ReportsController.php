<?php

namespace App\Http\Controllers;

use App\Reports;
use App\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->resolved)) {
            $reports = Reports::whereStatus(1)->get();
        } else {
            $reports = Reports::whereStatus(0)->get();
        }


        return view('reports.index', compact('reports'));

    }

    public function blockUser(Request $request)
    {
        $user = User::where('uniqueId', $request->user_id)->update(['status' => 2]);
        return redirect()->back()->withStatus('User Permanently Blocked');
    }
}
