<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $table = "mahasiswas";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'nim',
		'nama',

    ];

    public static $rules = [
        // create rules
    ];

    // Mahasiswa 
}
