<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Genbill;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;

class AbcController extends Controller
{
    // view homepage
    public function index()
    {
        return view('home');
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
        if ($request->units <= 50) {
            $amount = $request->units * 5;
        } elseif ($request->units <= 100) {
            $amount = ((50 * 5) + ($request->units - 50) * 8);
        } elseif ($request->units <= 250) {
            $amount = (50 * 5) + ((100 - 50) * 8) + ($request->units - 100) * 12;
        } else {
            $amount=(50 * 5) + ((100 - 50) * 8) + ((250-100) * 12) + ($request->units - 250) * 15;
        }

        $insert = new Genbill;
        $insert->name = $request->name;
        $insert->months = $request->month;
        $insert->units = $request->units;
        $insert->amounts = $amount;
        $insert->save();
        return redirect('billlist')->with('message', 'one custumer bill is genrated');

    }

    // edit custumer data
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
                })->rawColumns(['action'])
                ->make(true);
        }

        return view('billlist');

    }

}
