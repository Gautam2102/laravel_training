<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // show home page
    public function index()
    {
        return view('home');
    }
   
    // show post
    public function show()
    {
      $id=  Auth::user()->id;
      $users = Admin::where('user_id', $id)->paginate(5);
      return view('show',['data'=>$users]);
        
    }
    
    // add post ui
    public function addpost()
    {
        return view('addpost');
    }

    // insert post
    public function insertpost(StorePostRequest $request)
    {
        
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $addpost = new Admin;
        $addpost->title = $request->title;
        $addpost->body = $request->body;
        $addpost->dscription = $request->description;
        $addpost->image = $imageName;
        $addpost->user_id = $request->user_id;
        $addpost->save();
        return redirect('addpost')->with('success', 'One post added successfully');
    }

    // edit post
    public function editpost($id)
    {
        $data = Admin::find($id);
        return view('edit', ['data' => $data]);
    }

    public function deletepost($id)
    {
        $delete = Admin::find($id);
        $delete->delete();
        return back()->with('success', 'one row deleted successfullly');
    }
}
