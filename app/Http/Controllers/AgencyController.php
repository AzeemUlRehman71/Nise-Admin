<?php

namespace App\Http\Controllers;
use App\Agency;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $agency = Agency::get();

        return view('agency.index', compact('agency'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'phone' => 'required|string',
            'agency_code' => 'required|string',
            'nise_id' => 'required|string',
            'country' => 'required|string',
        ]);

        $agency = new Agency;
        $agency->id = $agency->latest('id')->first()->id + 1;
        $agency->name = $request->name;
        $agency->phone = $request->phone;
        $agency->code = $request->agency_code;
        $agency->nise_id = $request->nise_id;
        $agency->target = 0;
        $agency->save();

    
        $user = new User;
        $user->id = $user->latest('id')->first()->id+1;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->uniqueId = $request->nise_id;
        $user->mobile = $request->phone;
        $user->status = 0;
        $user->points = 0;
        $user->image = 'path';
        $user->gender = 0;
        $user->dob = date('Y-m-d',strtotime("2012-01-20"));      
        $user->save();


        

        $agency->password =  Hash::make($request->password);
        $agency->location = $request->country;
        $agency->status = 0;
        $agency->post = 0;
        $agency->created_by =  auth()->user()->id;
      

        return redirect()->back()->withStatus('Management added successfully');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
