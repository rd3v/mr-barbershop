<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Auth;
use Hash;

class ProfileController extends Controller
{

    public function profile() {
        $user  = Auth::user();
        return view('admin.profile', compact('user'));
    }    

    public function update_kapster() {

    }

    public function update_pwd(Request $request, $id) {
        if (Hash::check($request->old_pwd, Auth::user()->password)) {
            if ($request->new_pwd == $request->confirm_new_pwd) {

                $user = Auth::user();
                $user->password = Hash::make($request->new_pwd);
                $user->save();

                return redirect()->back();
            } else {
                session()->flash('errors', 'Password baru tidak sama!');
                return redirect()->back();
            }
        } else {
            session()->flash('errors', 'Password lama tidak sama!');
            return redirect()->back();
        }
    }
}
