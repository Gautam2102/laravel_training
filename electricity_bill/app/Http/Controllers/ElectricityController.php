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
            if ($request->unit >= $row->start_range && $request->unit <= $row->end_range) {
                $add = $request->unit * $row->unit_price;
                $unit=$request->unit;
                $unit_price=$row->unit_price;
                $city= City::where('id', $city_id)->first();
                return view('show')->with(['add' => $add,'unit' => $unit,'row' => $city,'unit_prices'=> $unit_price]);
            }
            

        }

    }
}
