<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pertandingan;
use App\Models\Club;

class PertandinganController extends Controller
{
    public function index(){
        $clubs = Club::All();
        
        return view('add')
        ->with('dataClub', $clubs);

        return view('add');
    }

    public function store(Request $request){
        $request->validate([
            'inputs.*.namaClub' => 'required',
            'inputs.*.skor' => 'required',
            'inputs.*.namaClub2' => 'required',
            'inputs.*.skor2' => 'required',
        ]);
     
        foreach ($request->inputs as $key => $value) {
            Pertandingan::create($value);
        }
     
        return redirect('/')
        ->with('success', 'Hasil Pertandingan Baru Saja Ditambahkan.');
    }
}
