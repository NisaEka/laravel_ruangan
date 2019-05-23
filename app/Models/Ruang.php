<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    public $table = "ruangs";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'name',
		'status',

    ];

    public static $rules = [
        // create rules
    ];

    // Ruang 
}
