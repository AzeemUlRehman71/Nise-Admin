<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gifts = Gift::get();

        return view('gifts.index', compact('gifts'));

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
            'coin' => 'required',
            'global' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:1024',
        ]);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/gifts');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $gift_image = $name;
        }
        if ($request->has('svgaImage')) {
            $image = $request->file('svgaImage');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/gifts');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $svga_image = $name;
        }
        $gift = new Gift();
        $gift->id = $gift->latest('id')->first()->id + 1;
        $gift->title = $request->title;
        $gift->coins = $request->coin;
        $gift->global = $request->global == 1 ? true : false;
        $gift->image = $gift_image;
        $gift->svgaImage = $svga_image;
        $gift->save();


        return redirect()->back()->withStatus('Gift added successfully');

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
        $gift_delete = Gift::where('id', $id)->first();
        $gift_delete->delete();
        return back()->withStatus('Gift Deleted Successfully');
    }
}
