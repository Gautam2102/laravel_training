<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Slab;
use Illuminate\Http\Request;

class ElectricityController extends Controller
{
    //display input form
    public function index()
    {
        $city = City::all();
        return view('welcome', ['city' => $city]);
    }

    // calculate unit according to city wise
    public function create(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'unit' => 'required',
        ]);
        $city_id = $request->city;
        $city = Slab::where('city_id', $city_id)->get();
        
        foreach ($city as $row) {
            // check id and fetch data array one by one 
            if($row->id==$city[0]->id)
            {
                $u_price=$row->unit_price;
                $start_range=$row->start_range;
                $end_range=$row->end_range;
            }

            if($row->id==$city[1]->id)
            {
                $u1_price=$row->unit_price;
                $start1_range=$row->start_range;
                $end1_range=$row->end_range; 
            }

            // check condition and fetch slab wise and calculate 
            if ($request->unit >= $row->start_range && $request->unit <= $row->end_range ) {

                $id=$row->id;
                if($id==$city[0]->id)
                {
                    $add = $request->unit * $u_price; 
                }
              
                elseif($id==$city[1]->id)
                {
                    $add =($end_range*$u_price)+($request->unit-$end_range)*$u1_price;
                }
             // return data on view balde file
                $unit=$request->unit;
                $city= City::where('id', $city_id)->first();
                return view('show')->with(['add' => $add,'unit' => $unit,'row' => $city]);
            } 
        
        }

    }
}