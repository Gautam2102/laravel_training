<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Product;
use App\Event\UserCreate;
use App\Http\Requests\StorePostRequest;
use App\Models\Admin;
use App\Models\role;
use Auth;
use Artisan;
use DataTables;
use App\Jobs\SendEmailjob;

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
        return view('show');
      
    }

    // show post from request ajax
    public function showdata()
    {
        $user_id = Auth::user()->id;

        return DataTables::of(Admin::query()->where('user_id', $user_id))->addColumn('action', function ($id) {
            return '<a href="editpost/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deletepost/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
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
        $addpost->country = $request->country;
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

    // update post
    public function updatepost(Request $request)
    {
        $addpost =  Admin::find($request->id);
        $addpost->title = $request->title;
        $addpost->body = $request->body;
        $addpost->dscription = $request->description;
        $addpost->country = $request->country;
        $addpost->user_id = $request->user_id;
        $addpost->save();
        return redirect('show')->with('success', 'One post added successfully');
    }

    public function deletepost($id)
    {
        $delete = Admin::find($id);
        $delete->delete();
        return back()->with('success', 'one row deleted successfullly');
    }

    // public function sendEmail()
    // {
    //     $details = [
    //         'title' => 'Mail from Gautam kant',
    //         'body' => 'This is for testing mail using gmail.',
    //     ];
    //     event(new UserCreate('aryankant2102@gmail.com', $details));

    // }
    public function product()
    {
  
        $product = Product::create([
            'name' => 'Mac Book',
            'price' => 50000
        ]);
        dd($product);
    }

}
