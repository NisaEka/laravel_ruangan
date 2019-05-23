<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PinjamAcceptanceTest extends TestCase
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
        $response = $this->actor->call('GET', 'pinjams');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pinjams');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'pinjams/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'pinjams', $this->Pinjam->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pinjams/'.$this->Pinjam->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'pinjams', $this->Pinjam->toArray());

        $response = $this->actor->call('GET', '/pinjams/'.$this->Pinjam->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pinjam');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'pinjams', $this->Pinjam->toArray());
        $response = $this->actor->call('PATCH', 'pinjams/1', $this->PinjamEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('pinjams', $this->PinjamEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'pinjams', $this->Pinjam->toArray());

        $response = $this->call('DELETE', 'pinjams/'.$this->Pinjam->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pinjams');
    }

}
