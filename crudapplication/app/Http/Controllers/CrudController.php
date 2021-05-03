<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

use App\Models\Crud;

class CrudController extends Controller
{
    // Display form 
 public function index(){
    return view('form');
    }

//  insert form data
    public function insert(Request $req){
   $imageName = time().'.'.$req->image->extension();  
   $req->image->move(public_path('images'), $imageName);
   $insert=new Crud;
   $insert->name=$req->name;
   $insert->email=$req->email;
   $insert->password= Hash::make($req->password); 
   $insert->image=$imageName;

    $data=$insert->save();


if($data){

   return back()->with('success','Data Insert Successfully');
}
else{
return view('form');

}
    }
    public function show(){


$data['data']=Crud::all();

return view('show',$data);

    }
    public function edit($id){

   $data['data']=Crud::find($id);


   return view('edit',$data);

    }
//  update form data
public function update(Request $req){
$update=Crud::find($req->id);
$update->name=$req->name;
$update->email=$req->email;
$update->password=Hash::make($req->password);

$update->save();

return redirect('show')->with('success','one row updated successfully');

}
// delete form data
public function delete($id){
$delete = Crud::find($id);
$delete->delete();
return redirect('show')->with('success','one row deleted successfullly');

}
//    login 
public function login(Request $req){
$email=$req->email;

$password=$req->password;

$user=DB::table('crudapplications')->where(['email'=>$email])->first();

if($user){

    $pwd=$user->password;
}

else{
echo 'wrong Email';
}

if($users=Hash::check($password,$pwd))
{

  $id=$user->id;  
    
$req->session()->put('id',$id);

return view('home');

}

else{

echo 'wrong  password';

}

}

// logout 
public function logout()
{
    if(session()->pull('id'))
    {
    return redirect('/login');
    }
}

  
}