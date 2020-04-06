<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Minister;

class MinisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/ministers';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('name');
    }

    /**
     * @test
     */
    public function ministerCanBeCreated()
    {
        $ministerFake = factory(Minister::class)->make();

        $response = $this->post(self::BASE_URI, $ministerFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Minister::all());

        $this->assertDatabaseHas('ministers', $ministerFake->getAttributes());
    }

    /**
     * @test
     */
    public function ministerCanBeUpdated()
    {
        $ministerFakes = factory(Minister::class, 2)->make();
        $this->post(self::BASE_URI, $ministerFakes->first()->toArray());

        $minister  = Minister::first();

        $response = $this->put(self::BASE_URI . '/' . $minister->id, $ministerFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('ministers', $ministerFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function ministerCanBeDeleted()
    {
        $ministerFake = factory(Minister::class)->make();
        $this->post(self::BASE_URI, $ministerFake->toArray());

        $this->assertCount(1, Minister::all());

        $minister  = Minister::first();

        $response = $this->delete(self::BASE_URI . '/' . $minister->id);

        $response->assertStatus(302);
        $this->assertCount(0, Minister::all());

        $this->assertDatabaseMissing('ministers', $ministerFake->getAttributes());
    }
}
