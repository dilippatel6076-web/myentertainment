<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
class AddProductController extends Controller
{
    //function index(){
    function index(){
         $artists = Artist::all();
        return view('add_product',compact('artists'));
    }
}
