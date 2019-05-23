<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PinjamAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Pinjam = factory(App\Models\Pinjam::class)->make([
            'id' => '1',
		'tanggal' => '2019-05-23',
		'user_id' => '1',
		'ruang_id' => '1',
		'status' => '1',

        ]);
        $this->PinjamEdited = factory(App\Models\Pinjam::class)->make([
            'id' => '1',
		'tanggal' => '2019-05-23',
		'user_id' => '1',
		'ruang_id' => '1',
		'status' => '1',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/pinjams');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/pinjams', $this->Pinjam->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/pinjams', $this->Pinjam->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/pinjams/1', $this->PinjamEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('pinjams', $this->PinjamEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/pinjams', $this->Pinjam->toArray());
        $response = $this->call('DELETE', 'api/v1/pinjams/'.$this->Pinjam->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'pinjam was deleted']);
    }

}
