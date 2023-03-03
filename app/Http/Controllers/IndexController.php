<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $pertandingans = DB::table('pertandingan')
            ->join('club', 'pertandingan.pertandinganId', '=', 'club.id')
            ->select('pertandingan.*', 'club.namaClub')
            ->get();

        return view('index')
        ->with('dataPertandinganAll', $pertandingans);
    }
}
