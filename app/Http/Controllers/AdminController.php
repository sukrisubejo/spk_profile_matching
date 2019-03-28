<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Requests\Profile\PasswordRequest;
use App\Http\Requests\Profile\ProfileRequest;

class AdminController extends Controller
{
    public function editPassword()
    {
    	return view('profile.edit-password');
    }
    public function updatePassword(PasswordRequest $request)
    {
    	$passwords = Auth::user();
        $passwords->password = bcrypt($request->get('new_password'));
        $passwords->save();
        return redirect('settings/password')->with('alert-success', 'Password Berhasil Diubah');
    }

    public function editProfile()
    {
    	$admins = Auth::user();
    	return view('profile.edit-profile', compact('admins'));
    }

    public function updateProfile(ProfileRequest $request)
    {
    	$admins = Auth::user();
    	$admins->name = $request->name;
    	$admins->email = $request->email;
    	// print_r($admins);exit();
    	$admins->save();
    	return redirect('settings/profile')->with('alert-success', 'Profile Berhasil Diubah');
    }
}
