<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RuangAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Ruang = factory(App\Models\Ruang::class)->make([
            'id' => '1',
		'name' => '1',
		'status' => '1',

        ]);
        $this->RuangEdited = factory(App\Models\Ruang::class)->make([
            'id' => '1',
		'name' => '1',
		'status' => '1',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'ruangs');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('ruangs');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'ruangs/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'ruangs', $this->Ruang->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('ruangs/'.$this->Ruang->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'ruangs', $this->Ruang->toArray());

        $response = $this->actor->call('GET', '/ruangs/'.$this->Ruang->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('ruang');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'ruangs', $this->Ruang->toArray());
        $response = $this->actor->call('PATCH', 'ruangs/1', $this->RuangEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('ruangs', $this->RuangEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'ruangs', $this->Ruang->toArray());

        $response = $this->call('DELETE', 'ruangs/'.$this->Ruang->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('ruangs');
    }

}
