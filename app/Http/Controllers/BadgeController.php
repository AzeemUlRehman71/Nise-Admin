<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Badge;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $badges = Badge::get();

        return view('badges.index', compact('badges'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'badge' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->has('badge')) {
            $image = $request->file('badge');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/badges');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $badge_image = $name;
        } else {
            $badge_image = '';
        }
        $badge = new Badge();
        $badge->id = $badge->latest('id')->first()->id + 1;
        $badge->title = $request->title;
        $badge->badge = $badge_image;
        $badge->save();


        return redirect()->back()->withStatus('Badge added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $badge_delete = Badge::where('id', $id)->first();
        $badge_delete->delete();
        return back()->withStatus('Badge Deleted Successfully');
    }
}
