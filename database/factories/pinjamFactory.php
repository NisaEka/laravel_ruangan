<?php
/*
|--------------------------------------------------------------------------
| Pinjam Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Pinjam::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'tanggal' => '2019-05-23',
		'user_id' => '1',
		'ruang_id' => '1',
		'status' => '1',
    ];
});
