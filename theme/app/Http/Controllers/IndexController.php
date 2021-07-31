<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Service;
use App\Models\Ourvalue;
use App\Models\Feature;
use App\Models\Price;
use App\Models\Team;
use App\Models\Client;
use App\Models\Blog;
use App\Models\portfolio;
class IndexController extends Controller
{
    public function __construct()
    {
        
    }

    public function main()
    {
        $data=About::orderBy('id', 'desc')->take(1)->get();
        $ourvalue=Ourvalue::orderBy('id', 'desc')->take(3)->get();;
        $service=Service::orderBy('id', 'desc')->take(6)->get();; 
        $feature=Feature::orderBy('id', 'desc')->take(6)->get();
        $price=Price::orderBy('id', 'desc')->take(4)->get();
        $team=Team::orderBy('id', 'desc')->take(4)->get();
        $client=Client::orderBy('id', 'desc')->take(9)->get();
        $blog=Blog::orderBy('id', 'desc')->take(3)->get();
        $portfolio=Portfolio::orderBy('id', 'desc')->take(9)->get();
        return view('index',compact('data','ourvalue','feature','service','price','team','client','blog','portfolio'));
        

      
    }

    //
    

    
}
