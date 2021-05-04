<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    //add post from user admin panel
    public function addpost(StorePostRequest $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $addpost = new Admin;
        $addpost->title = $request->title;
        $addpost->body = $request->body;
        $addpost->dscription = $request->description;
        $addpost->image = $imageName;
        $addpost->user_id = $request->id;
        $addpost->save();
        return redirect('add-post')->with('success', 'One post added successfully');
    }

    // show post
    public function showpost()
    {
        $id = Session::get('id');
        $users = Admin::where('user_id', $id)->get();
        return view('show', ['user' => $users]);
    }

    // Edit post
    public function editpost($id)
    {
        $data = Admin::find($id);
        return view('edit', ['data' => $data]);
    }

    // Update Post
    public function postupdate(StorePostRequest $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $update = Admin::find($request->id);
        $update->title = $request->title;
        $update->body = $request->body;
        $update->dscription = $request->description;
        $update->image = $imageName;
        $update->save();
        return redirect('add-post')->with('success', 'one row updated successfully');
    }

    // Delete Post
    public function deletepost($id)
    {
        $delete = Admin::find($id);
        $delete->delete();
        return back()->with('success', 'one row deleted successfullly');
    }

    // logout
    public function logout()
    {
        if (session()->pull('id')) {
            return redirect('signin');
        }
    }
}
