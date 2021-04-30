<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    
// one to one relationship


// insert record 
public function insertRecord(){
$phone =new Phone;
$phone->phone="1234";
$user=new User;
$user->name="Gautam kant";
$user->email="gautamka@gmail.com";
$user->password=Hash::make('aryan');
$user->save();
$user->phone()->save($phone);
return 'Record has been';

}
// fetch data
public function fetchPhoneByUser($id){

$phone = User::find($id)->phone;

return $phone;
}

}
