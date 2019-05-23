<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    public $table = "pinjams";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'tanggal_pinjam',
        'tanggal_kembali',
		'user_id',
		'ruang_id',
		'status',

    ];

    public static $rules = [
        // create rules
    ];

    // Pinjam 
}
