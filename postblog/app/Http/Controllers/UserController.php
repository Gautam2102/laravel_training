<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DB;

class UserController extends Controller
{
    //insert form data
    public function insert(Request $request)
    {
        $validated = $request->validate
        ([
            'name' => 'required',
            'email' => 'required',
            'password'=>'required'
        ]);
        $insert=new User;
        $insert->name=$request->name;
        $insert->email=$request->email;
        $insert->password=Hash::make($request->password);
        $insert->save(); 
        return redirect('signup')->with('success','user registration successfully');
    }

    // user login
    public function login(Request $request)
    { 
        $validated = $request->validate
        ([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email=$request->email;
        $password=$request->password;
        $data= DB::table('users')->where('email',$email)->get();
        if($data->count() > 0)
        {
             $oldpassword=$data['0']->password;
            $id=$data['0']->id;
            Hash::check($password,$oldpassword);
            $request->session()->put('id',$id);
            return redirect('dashboard');    
        }
        else
        {
            return redirect('signin')->with('error','wrong Email And Password');
        }
    }
}
