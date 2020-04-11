<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Mature;

class MatureTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/matures';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('birth_at');
        $response->assertSessionHasErrors('cpf');
        $response->assertSessionHasErrors('registered_at');
        $response->assertSessionHasErrors('address');
        $response->assertSessionHasErrors('district_id');
        $response->assertSessionHasErrors('NIS');
    }

    /**
     * @test
     */
    public function matureCanBeCreated()
    {
        $matureFake = factory(Mature::class)->make();

        $response = $this->post(self::BASE_URI, $matureFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Mature::all());

        $this->assertDatabaseHas('matures', $matureFake->getAttributes());
    }

    /**
     * @test
     */
    public function matureCanBeUpdated()
    {
        $matureFakes = factory(Mature::class, 2)->make();
        $this->post(self::BASE_URI, $matureFakes->first()->toArray());

        $mature  = Mature::first();

        $response = $this->put(self::BASE_URI . '/' . $mature->id, $matureFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('matures', $matureFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function matureCanBeDeleted()
    {
        $matureFake = factory(Mature::class)->make();
        $this->post(self::BASE_URI, $matureFake->toArray());

        $this->assertCount(1, Mature::all());

        $mature  = Mature::first();

        $response = $this->delete(self::BASE_URI . '/' . $mature->id);

        $response->assertStatus(302);
        $this->assertCount(0, Mature::all());

        $this->assertDatabaseMissing('matures', $matureFake->getAttributes());
    }
}
