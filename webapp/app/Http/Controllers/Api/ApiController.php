<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Genbill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;

class ApiController extends Controller
{
    // 
    public function read()
    {
        $data = Genbill::All();
        $response['return'] = true;
        $response['message'] = 'Show all Data';
        $response['data'] = $data;
        $response['api_token'] = Str::random(50);
        return response()->json($response, 200);
    }

    public function loginAuthenticated(Request $request)
    {
        $admin = Admin::where(['name' => $request->username, 'password' => $request->password])->first();
        if ($admin) {
            $response['return'] = true;
            $response['message'] = 'You are logged in';
            $response['admin'] = $admin;
            $response['api_token'] = Str::random(50);
            return response()->json($response, 200);
        } else {
            $reponse['return'] = false;
            $response['message'] = 'Wrong Creditnals';
            return response()->json($response, 400);
        }
    }
    public function register(Request $request)
    {
        $create = new Admin;
        $create->name = $request->username;
        $create->password = Hash::make($request->password);
        $create->token = Str::random('50');
        if ($create->save()) {

            $response['return']=true;
            $response['meassge']='Data Inserted Successfully';
            return response()->json($response,200);
        }

        else{
            $response['return']=false;
            $response['meassge']='Data not inserted Successfully';
            return response()->json($response,200);
        }

    }

}
