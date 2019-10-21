<?php

namespace App\Http\Controllers\BackEnd;


use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function showUserlist(){

          $users = DB::table('users')->paginate(5);

        $data['user'] = User::all();
//        dd($user);
        return view("BackEnd.user.list",$data);
//        $user = User::all();
//        return view("user.list")->with('user',$user);
    }

    public function edit($id){
        $data['user'] = User::find($id);
//        dd($user);

//        $user = User::where('id',$id)->all();
        return view('user.edit',$data);
    }

    public function editUser(Request $request){
//        dd($request->all());

        $request->validate([
            'user_id' => 'required',
            'name' => 'required|max:25',
            'password' => 'required|confirmed',
            'contact' => 'required|min:5|max:12'
        ]);

 
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->contact_number = $request->contact;

        if(($request->user_avatar != null)){
            //delete previous user profile
            Storage::delete('public/users'.$user->user_avatar);
            $user->user_avatar = $request->file('user_avatar')->store('users','public');
        }
        $user->save();

        return redirect()->route('admin.user.list');
    }

    public function deleteUser(Request $request){
        
         $user_info = User::find($request->id);
         Storage::delete('public/'.$user_info->user_avatar);
         
         $user_info ->delete();


       
       
       return redirect()->route('admin.user');
    }

    public function getaddUser(){
    
        return view('BackEnd.user.user-register');

    }

    public function addUser(Request $request){
//        dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact' => ['required','string'],
//            'user_avatar' => 'required|mimes:jpeg,png,gif,jpg'
        ]);

        if(isset($request->user_avatar)){
            $request->validate([
                'user_avatar' => 'required|mimes:jpeg,png,gif,jpg'
            ]);
        }

//        dd('validated');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->created_at = date('Y-m-d H:i:s');

        $user->contact_number = $request->contact;
        $user->password = Hash::make($request->password);

        if(($request->user_avatar != null)){
            $user->user_avatar = $request->file('user_avatar')->store('users','public');
//            $request->file('image')->store('offers', 'public');
//            $user->user_avatar = $path;
        }

//        $user->user_avatar = $request->name;
        $user->save();

        return redirect()->route('admin.user');


    }
}
