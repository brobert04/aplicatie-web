<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function showUsers(){
        $users = User::all()->sortBy('name');
        return view('admin.users')->with('users', $users);
    }
    public function newUser(){
        return view('admin.new-users');
    }

    public function createUser(CreateUserRequest $request){

        $user  = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->address  = $request->address;
        $user->role  = $request->role;
        $user->password =bcrypt($request->password);

        if($request->hasFile('profile_photo')){
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '',$request->name) .'_' . time().'.'.$extension;
            $request->file('profile_photo')->move('images/users', $photo_name);
            $user->profile_picture = $photo_name;
        }

        $user->save();
        return redirect(route('users'))->withInput()->with('success', 'Utilizatorul' .' '.$user->name. ' '. 'a fost creat cu succes!');
    }

    public function editUserForm($id){
        $user=User::find($id);
        return view('admin.edit-user')->with('user', $user);
    }
    public function editUser(UpdateUserRequest $request, $id){

        $this->validate($request,
            [
                'email'=>'unique:users,email,'.$id,
            ],
            [
                'email.unique'=>'Adresa de email este deja folosită de alt utilizator!'
            ]
        );

        $user = User::find($id);

        if($request->hasFile('profile_photo')){
            if(!($user->profile_picture == 'default.png')){
                File::delete('images/users/'.$user->profile_picture);
            }
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '',$request->name) .'_' . time().'.'.$extension;
            $request->file('profile_photo')->move('images/users', $photo_name);
            $user->profile_picture = $photo_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->address  = $request->address;
        $user->role  = $request->role;

        //verificare email
        if($request->emailvalidation =='mark'){
            $user->email_verified_at = now();
        }
        elseif($request->emailvalidation =='invalid'){
            $user->email_verified_at = null;
        }
        elseif($request->emailvalidation=='send'){
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        $user->save();
        return redirect(route('users'))->withInput()->with('success', 'Utilizatorul' .' '.$user->name. ' '. 'a fost actualizat cu succes!');
    }

    function deleteUser(Request $request, $id){
        $user = User::find($id);

        if($user->role=='admin'){
            return redirect(route('users'))->withInput()->with('error', 'Nu puteți șterge un administrator!');
        }
        if(!($user->profile_picture == 'default.png')){
            File::delete('images/users/'.$user->profile_picture);
        }
        $user->delete();
        return redirect(route('users'))->withInput()->with('success', 'Utilizatorul' .' '.$user->name. ' '. 'a fost șters cu succes!');
    }
}
