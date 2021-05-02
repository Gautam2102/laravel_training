<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //add post from user admin panel
    public function addpost(Request $request)
    {
        $request->validate
        ([
            'title'=>'required',
            'body'=>'required',
            'description'=>'required',
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $addpost=new Admin;
        $addpost->title=$request->title;
        $addpost->body=$request->body;
        $addpost->dscription=$request->description;
        $addpost->image=$imageName;
        $addpost->user_id=$request->id;
        $addpost->save();
        return redirect('add-post')->with('success','One post added successfully');
        
    }

    // show post 
    public function showpost($id)
    {
        $users =Admin::where('user_id',$id)->get();
        return view('show',$users);
    }
}
