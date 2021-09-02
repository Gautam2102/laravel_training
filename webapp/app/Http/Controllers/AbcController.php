<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Admin;
use App\Models\Citi;
use App\Models\Genbill;
use App\Models\Slab;
use App\Models\User;
use DataTables;
use Hash;
use PDF;
use Illuminate\Http\Request;

class AbcController extends Controller
{
    // view homepage
    public function index()
    {
        return view('login');

    }

    public function home()
    {
        $city = Citi::All();
        return view('home', ['city' => $city]);
    }
    // insert data
    public function create(StorePostRequest $request)
    {
        $insert = new User;
        $insert->name = $request->name;
        $insert->address = $request->address;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->city = $request->city;
        $insert->save();
        return redirect('home')->with('message', 'Thanks for register!');
    }

    // Read Data
    public function Read(Request $request)
    {
        if ($request->ajax()) {
            $data = User::All();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/genratefillform/' . $row->id . '" class="genbill btn btn-primary btn-sm">Genbill</a><a href="/editcustumer/' . $row->id . '" class="edit btn btn-secondary btn-sm">Edit</a><a href="/deletecustumer/' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }

        return view('show');

    }

    // calculate bill

    // 1 – 50 units : 5 rs/ unit
    // 51-100 units : 8 rs/ unit
    // 101-250 units : 12rs/unit
    // 250-unlimited : 15 rs/unit

    public function billGenrate(BillPostRequest $request)
    {

        $city = Slab::where('city_id', $request->id)->get();
        $city_name = Citi::where('id', $request->id)->first();

        // check id and fetch data array one by one
        if ($city[0]->id) {
            $u_price = $city[0]->unit_price;
            $start_range = $city[0]->start_range;
            $end_range = $city[0]->end_range;
        }

        if ($city[1]->id) {
            $u1_price = $city[1]->unit_price;
            $start1_range = $city[1]->start_range;
            $end1_range = $city[1]->end_range;
        }

        if ($city[2]->id) {
            $u2_price = $city[2]->unit_price;
            $start2_range = $city[2]->start_range;
            $end2_range = $city[2]->end_range;
        }
        // check condition and fetch slab wise range and calculate

        foreach ($city as $row) {
            if ($request->unit >= $row->start_range && $request->unit <= $row->end_range) {

                $id = $row->id;
                if ($id == $city[0]->id) {
                    $add = $request->unit * $u_price;

                } elseif ($id == $city[1]->id) {
                    $add = ($end_range * $u_price) + ($request->unit - $end_range) * $u1_price;

                } elseif ($id == $city[2]->id) {
                    $add = ($end_range * $u_price) + (($end1_range - $end_range) * $u1_price) + ($request->unit - $end1_range) * $u2_price;

                }

            } else {
                $add = ($end_range * $u_price) + (($end1_range - $end_range) * $u1_price) + (($end2_range - $end1_range) * $u2_price) + ($request->unit - $end2_range) * 15;

            }

        }

        $insert = new Genbill;
        $insert->name = $request->name;
        $insert->months = $request->month;
        $insert->units = $request->unit;
        $insert->city = $city_name->city;
        $insert->amounts = $add;
        $insert->save();
        return redirect('billlist')->with('message', 'one custumer bill is genrated');

    }

    // genrate bill
    public function genratefillform($id)
    {
        $data = User::where('id', $id)->first();
        return view('genbill', ['data' => $data]);
    }

    // edit custumer form data
    public function editcustumer($id)
    {
        $data = User::where('id', $id)->first();
        return view('editcustumer', ['data' => $data]);
    }

    // update custumer data
    public function updatecustumer(StorePostRequest $request)
    {
        $insert = User::find($request->id);
        $insert->name = $request->name;
        $insert->address = $request->address;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->city = $request->city;
        $insert->save();
        return redirect('show')->with('message', 'The data is updatedsuccessfully');

    }

    // Delete Custumer
    public function deletecustumer($id)
    {
        User::where('id', $id)->delete();
        return redirect('show')->with('message', 'one Data Delete Successfully!');
    }

    // fetch bill list
    public function billlist(Request $request)
    {
        if ($request->ajax()) {
            $data = Genbill::All();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/generate-pdf/' . $row->id . '" class="genbill btn btn-primary btn-sm">Genbill</a>';
                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }

        return view('billlist');

    }

    // login Admin
    public function postadmin(Request $request)
    {
        $data = Admin::where('name', $request->username)->first();

        if (Hash::check($request->password, $data->password)) {
            $request->session()->put('id', $data->id);
            return redirect('show');

        } else {
            return redirect('login')->with('message', 'wrong credentials');
        }
    }
    
    // Genrate Electricity Bill
    public function generatePDF($id)
    { 
        $genPDF= Genbill::where('id',$id)->first();
        
        $pdf = PDF::loadView('billPDF');
    
        return $pdf->download('electricitybill.pdf');
    }

}
