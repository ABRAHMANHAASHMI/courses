<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        $url = asset('uploads/avatars/'.Auth::user()->user_avatar);
        return view('users.edit', compact('user','url'));
    }

    public function update(User $user)
    {
        if (request('password') != null)
        {
            if (Hash::check (request('password'),Auth::user()->password) == true )
            {
                if (Hash::check(request('newPassword'), Auth::user()->password) != true)
                {
                    $this->validate(request(), [
                        'name' => 'required|min:3',
                        'email' => 'required|email',
                        'newPassword' => 'required|min:6|confirmed'
                    ]);
                    $user->name = request('name');
                    $user->email = request('email');
                    $user->password = bcrypt(request('newPassword'));
                    $user->save();
                    return back()->with("success","Password changed successfully !");
                }
                else
                {
                    return back()->with("error","New Password cannot be same as your current password. Please choose a different password");

                }
            }
            else{
                return back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            }
        }

        elseif(request('password') == null)
        {

            $this->validate(request(), [
                'name' => 'required|min:3',
                'email' => 'required|email'
            ]);
            $user->name = request('name');
            $user->email = request('email');
            $user->save();
            return back()->with("success","Personal info changed successfully !");
        }
    }


    public function update_avatar(Request $request){


        if ($request['avatar'] != null){
            $request->validate([
                'avatar' => 'image|mimes:jpg,png',
            ]);

            $user = Auth::user();


            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

            request()->avatar->move(public_path('uploads/avatars'), $avatarName);

            $user->user_avatar = $avatarName;
            $user->save();

            return back()->with('success','You have successfully upload image.');
        }
        else{
            return back()->with('error','no image selected.');
        }
    }

    public function profile_remove(){

       $avatar = Auth::user();
       $avatar->user_avatar =  null;
       $avatar->save();


       return back()->with('success','You have successfully delete image.');
    }
}