<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontUserController extends Controller
{
    public function frontUserProfile()
    {
        return view('frontend.frontUser.frontUser');
    }

    public function frontUserProfileUpdate(Request $request)
    {


        $fileName = (auth()->user()->image);
        if ($request->hasFile('image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads/frontUser', $fileName);
        }

        $User = User::find(auth()->user()->id)->update([
            'image' => $fileName,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone

        ]);

        notify()->success('Profile', 'Update Successfully');

        return redirect()->back();
    }
}
