<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
class SettingsController extends Controller
{
    public function index(){
        return view('profile.edit');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $updateUser = Admin::find($id);
       $updateUser->update([
        'email' => $request->email,
        'password' => Hash::make($request->password)
        ]);

        return back()->withStatus(__('Profile successfully updated.'));
    }
}
