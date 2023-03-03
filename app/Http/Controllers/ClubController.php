<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Club;

class ClubController extends Controller
{
    public function index(){
        $clubs = Club::All();
        
        return view('addClub')
        ->with('dataClub', $clubs);
    }

    public function store(Request $request){
        $data = new club();
        $data->namaClub = $request->input('namaClub');
        $data->kota = $request->input('kota');
        
        $data->save();
     
        return back()
        ->with('success', 'Nama Club Baru Saja Ditambahkan.');
    }
}
