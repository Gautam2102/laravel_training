<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Genbill;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    // show inside admin panel data
    public function read()
    {
        $data = Genbill::All();
        $response['return'] = true;
        $response['message'] = 'Show all Data';
        $response['data'] = $data;
        $response['api_token'] = Str::random(50);
        return response()->json($response, 200);
    }

    // Login Admin
    public function loginAuthenticated(Request $request)
    {
        $rules = [
            "username" => "required",
            "password" => "required",
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            $response['errors'] = $validator->getMessageBag()->toArray();

            return Response()->json($response, 400);
        }
        $admin = Admin::where('name', $request->username)->first();

        if (Hash::check($request->password, $admin->password)) {
            $response['return'] = true;
            $response['message'] = 'You are logged in';
            $response['admin'] = $admin;
            $response['api_token'] = $admin->createToken('token')->plainTextToken;

            return response()->json($response, 200);
        } else {
            $reponse['return'] = false;
            $response['message'] = 'Wrong Creditnals';
            return response()->json($response, 400);
        }
    }

    //  Admin Register
    public function adminRegister(Request $request)
    {
        $rules = [
            "username" => "required",
            "password" => "required|string|min:6|max:10|regex:/[0-9]/|regex:/[@$!%#?&]/",
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            $response['errors'] = $validator->getMessageBag()->toArray();

            return Response()->json($response, 400);
        }

        $admin = Admin::create([
            'name' => $request->username,
            'password' => Hash::make($request->password),

        ]);
        $token = $admin->createToken('token')->plainTextToken;
        if ($admin) {
            $response['true'] = true;
            $response['message'] = 'successfully inserted data';
            $response['admin'] = $admin;
            $response['token'] = $token;

        }

        return response()->json($response, 200);

    }

    // Admin Update
    public function adminUpdate(Request $request, $id)
    {
        $rules = [
            "username" => "required",
            "password" => "required",
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            $response['errors'] = $validator->getMessageBag()->toArray();

            return Response()->json($response, 400);
        }

        $admin = Admin::find($id);
        $admin->name = $request->username;
        $admin->password = Hash::make($request->password);
        $token = $admin->createToken('token')->plainTextToken;
        if ($admin) {
            $response['true'] = true;
            $response['message'] = 'Data Updated successfully';
            $response['admin'] = $admin;
            $response['token'] = $token;

        }

        return response()->json($response, 200);

    }

    // Delete Admin
    public function adminDelete($id)
    {
        $data = Admin::find($id)->delete();

        if ($data) {
            $response['true'] = true;
            $response['message'] = 'Data Deleted Successfully';
        }
        return response()->json($response, 200);

    }

}
