<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;
    protected $table = 'pertandingan';
    protected $primary = 'pertandinganId';

    protected $fillable = [
        'namaClub', 'skor', 'namaClub2', 'skor2'
    ];
}
