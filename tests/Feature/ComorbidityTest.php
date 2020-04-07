<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Comorbidity;

class ComorbidityTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/comorbidities';

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
    public function comorbidityCanBeCreated()
    {
        $comorbidityFake = factory(Comorbidity::class)->make();

        $response = $this->post(self::BASE_URI, $comorbidityFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Comorbidity::all());

        $this->assertDatabaseHas('comorbidities', $comorbidityFake->getAttributes());
    }

    /**
     * @test
     */
    public function comorbidityCanBeUpdated()
    {
        $comorbidityFakes = factory(Comorbidity::class, 2)->make();
        $this->post(self::BASE_URI, $comorbidityFakes->first()->toArray());

        $comorbidity  = Comorbidity::first();

        $response = $this->put(self::BASE_URI . '/' . $comorbidity->id, $comorbidityFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('comorbidities', $comorbidityFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function comorbidityCanBeDeleted()
    {
        $comorbidityFake = factory(Comorbidity::class)->make();
        $this->post(self::BASE_URI, $comorbidityFake->toArray());

        $this->assertCount(1, Comorbidity::all());

        $comorbidity  = Comorbidity::first();

        $response = $this->delete(self::BASE_URI . '/' . $comorbidity->id);

        $response->assertStatus(302);
        $this->assertCount(0, Comorbidity::all());

        $this->assertDatabaseMissing('comorbidities', $comorbidityFake->getAttributes());
    }
}
