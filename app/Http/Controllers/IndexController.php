<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $pertandingans = DB::table('club')
            ->select('club.namaClub', 
                    DB::raw('count(*) as ma'), 
                    DB::raw('sum(case when club.namaClub = pertandingan.namaClub THEN
                        case when skor > skor2 then 1 else 0 end
                    else
                        case when skor2 > skor then 1 else 0 end
                        end) as me'), 
                    DB::raw('sum(case when skor = skor2 then 1 else 0 end) as s'), 
                    DB::raw('sum(case when club.namaClub = pertandingan.namaClub THEN
                        case when skor < skor2 then 1 else 0 end
                    else
                        case when skor2 < skor then 1 else 0 end
                    end) as k'), 
                    DB::raw('sum(case when club.namaClub = pertandingan.namaClub THEN skor
                    else skor2
                    end) as gm'), 
                    DB::raw('sum(case when club.namaClub = pertandingan.namaClub THEN skor2
                    else skor
                    end) as gk'), 
                    DB::raw('sum(case when club.namaClub = pertandingan.namaClub THEN
                    case when skor > skor2 then 3 
                    when skor = skor2 then 1
                    else 0 end
                    else
                    case when skor2 > skor then 3 
                    when skor2 = skor then 1
                    else 0 end
                    end) as point'))
            ->leftjoin('pertandingan', 'pertandingan.namaClub', '=', 'club.namaClub')
            ->orderby('point', 'DESC')
            ->groupby('club.namaClub')
            ->get();
        

        return view('index')
        ->with('dataPertandinganAll', $pertandingans);
    }
}
