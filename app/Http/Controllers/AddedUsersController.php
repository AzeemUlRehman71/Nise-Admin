<?php

namespace App\Http\Controllers;

use App\CheckinCredits;
use App\FriendsCredits;
use App\VideoadCredits;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Admin;
use DB;
use App\setting;
class AddedUsersController extends Controller
{
    public function index(){
        $user    = User::get();
        $setting = setting::get();
        $checkin = CheckinCredits::first();
        $videoad = VideoadCredits::first();
        $friends = FriendsCredits::first();
        
        return view('users.user', compact('user', 'checkin', 'videoad', 'friends','setting'));
    }

    public function destroy(Request $request, $id){
    
        $user_delete = User::where('id', $id)->first();
        $user_delete->delete();
        return back()->withStatus('User Deleted Successfully');
    
    }

    public function management(){
    
        $admin    = Admin::where('post','<','10')->get();
        return view('management.management', compact('admin'));
    
    }

    public function addManagement(Request $request){


        $this->validate($request,[
            'username' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string',
            'country' => 'required|string',
            'usertype' => 'required|string',
        ]);

        $admin = new Admin;
        $admin->name = $request->username;
        $admin->email = $request->email;
        $admin->password =  Hash::make($request->password);
        $admin->location = $request->country;
        $admin->status = 0;
        $admin->post = 0;
        $admin->created_by =  auth()->user()->id;
        $admin->save();

        return redirect()->back()->withStatus('Management added successfully');
    }

    public function destroyManagement(Request $request, $id){

        $user_delete = Admin::where('id', $id)->first();
        $user_delete->delete();
        return back()->withStatus('Management Deleted Successfully');
    
    }
    public function passwordupdate(Request $request){
    
        $admin    = Admin::get();
        foreach($admin as $admi){

            $page = Admin::find($admi['id']);

            // Make sure you've got the Page model
            if($page) {
            
                $page->password = Hash::make($admi['password']);
                $page->save();
               
            }

        }
        exit;


        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();


        print_r($admin);
        dd($admin); 

        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();

    }

}
