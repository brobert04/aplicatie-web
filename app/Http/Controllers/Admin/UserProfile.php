<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ResetPasswordRequest;

class UserProfile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $user = User::find(auth()->id());
        return view('admin.user-profile', ['user' => $user]);

    }

    public function editUser(UpdateUserRequest $request)
    {

        $this->validate($request, ['email' => 'unique:users,email,' . auth()->id(),], ['email.unique' => 'Adresa de email este deja folosită de alt utilizator!']);
        $user = User::find(auth()->id());

        if ($request->hasFile('profile_photo')) {
            if (!($user->profile_picture == 'default.png')) {
                File::delete('images/users/' . $user->profile_picture);
            }
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            $request->file('profile_photo')->move('images/users', $photo_name);
            $user->profile_picture = $photo_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->address = $request->address;

        $user->save();
        return redirect()->route('user.profile')->with('success', 'Profilul a fost actualizat cu succes!');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        if(Auth::attempt(['email'=>auth()->user()->email, 'password'=>$request->password]))
        {
            $newPassword = bcrypt($request->newpassword);
            $user = User::find(auth()->user()->id);
            $user->password = $newPassword;
            $user->save();
            return redirect()->back()->with('success', 'Parola a fost schimbată cu succes!');
        }
        else
        {
            return redirect()->back()->with('error', 'Parola actuală este greșită!');
        }
    }
}
