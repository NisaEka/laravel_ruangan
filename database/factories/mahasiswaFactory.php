<?php
/*
|--------------------------------------------------------------------------
| Mahasiswa Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Mahasiswa::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'nim' => '1',
		'nama' => '1',
    ];
});
