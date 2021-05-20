<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;
use App\Hotel;
use App\Resto;
use App\Paket;

class IndexController extends Controller
{
    //
    public function index(){
        $wisatas = Wisata::orderBy('created_at','DESC')->paginate(6);
        $hotels = Hotel::orderBy('created_at','DESC')->paginate(6);
        $restos = Resto::orderBy('created_at','DESC')->paginate(6);
        $pakets = Paket::OrderBy('created_at','DESC')->paginate(6);
        
        return view('index-public', compact('wisatas','hotels','restos','pakets'));
    }
}
