<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Sickness;

class SicknessTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/sicknesses';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('mature_id');
        $response->assertSessionHasErrors('comorbidity_id');
        $response->assertSessionHasErrors('observation');
    }

    /**
     * @test
     */
    public function sicknessCanBeCreated()
    {
        $sicknessFake = factory(Sickness::class)->make();

        $response = $this->post(self::BASE_URI, $sicknessFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Sickness::all());

        $this->assertDatabaseHas('sicknesses', $sicknessFake->getAttributes());
    }

    /**
     * @test
     */
    public function sicknessCanBeUpdated()
    {
        $sicknessFakes = factory(Sickness::class, 2)->make();
        $this->post(self::BASE_URI, $sicknessFakes->first()->toArray());

        $sickness  = Sickness::first();

        $response = $this->put(self::BASE_URI . '/' . $sickness->id, $sicknessFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('sicknesses', $sicknessFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function sicknessCanBeDeleted()
    {
        $sicknessFake = factory(Sickness::class)->make();
        $this->post(self::BASE_URI, $sicknessFake->toArray());

        $this->assertCount(1, Sickness::all());

        $sickness  = Sickness::first();

        $response = $this->delete(self::BASE_URI . '/' . $sickness->id);

        $response->assertStatus(302);
        $this->assertCount(0, Sickness::all());

        $this->assertDatabaseMissing('sicknesses', $sicknessFake->getAttributes());
    }
}
