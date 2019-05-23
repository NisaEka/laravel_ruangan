<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RuangAcceptanceApiTest extends TestCase
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
        $response = $this->actor->call('GET', 'api/v1/ruangs');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/ruangs', $this->Ruang->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/ruangs', $this->Ruang->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/ruangs/1', $this->RuangEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('ruangs', $this->RuangEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/ruangs', $this->Ruang->toArray());
        $response = $this->call('DELETE', 'api/v1/ruangs/'.$this->Ruang->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'ruang was deleted']);
    }

}
