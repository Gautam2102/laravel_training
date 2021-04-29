<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

use App\Models\Crud;

class CrudController extends Controller
{
    //

    public function index(){

            return view('form');
    }


    public function insert(Request $req){

$req->validate([
'name'=>'required',
'email'=>'required|unique:crudapplications',
'password'=>'required',
'image'=>'required|image|mimes:png,jpeg,jpg,svg,gif|max:2408',

],

[

'email.unique'=>'Email is already exists in database',

]

);

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

public function update(Request $req){


$update=Crud::find($req->id);


$update->name=$req->name;
$update->email=$req->email;
$update->password=Hash::make($req->password);

$update->save();

return redirect('show')->with('success','one row updated successfully');

}
public function delete($id){


$delete = Crud::find($id);



$delete->delete();


return redirect('show')->with('success','one row deleted successfullly');

}
   
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

public function logout(){


if(session()->pull('id')){

return redirect('/login');
}
}
    
public function getapi(Request $req){

$data=new Crud;


$data->name=$req->name;
$data->email=$req->email;
$data->password=Hash::make($req->password);
$data->save();



}

public function api(){


return Crud::all();

}

public function fb(){


    return Socialite::driver('facebook')->redirect();



}

public function fblogin(){


   echo '1';
    
    
    
    }



    public function sendsms(){

        $messages = array(
            // Put parameters here such as sender, force or test
            'sender' => "SampleName",
            'messages' => array(
                array(
                    'number' => 917667274618,
                    'text' => rawurlencode('This is your message')
                ),
                array(
                    'number' => 917667274618,
                    'text' => rawurlencode('This is another message')
                )
            )
        );
         
        // Prepare data for POST request
        $data = array(
            'apikey' => 'NzUwMzg1OTE5MjJhZGM2NzBhOWEzMDQ1YTFmZDdjZWQ',
            'data' => json_encode($messages)
        );
         
        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/bulk_json/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
         
        echo $response;



    }
    
}