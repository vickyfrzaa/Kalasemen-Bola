<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pertandingan;

class PertandinganController extends Controller
{
    public function index(){
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
     
        return back()
        ->with('success', 'New subject has been added.');
    }
}
