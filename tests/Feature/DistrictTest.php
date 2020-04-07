<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\District;

class DistrictTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/districts';

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
    public function districtCanBeCreated()
    {
        $districtFake = factory(District::class)->make();

        $response = $this->post(self::BASE_URI, $districtFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, District::all());

        $this->assertDatabaseHas('districts', $districtFake->getAttributes());
    }

    /**
     * @test
     */
    public function districtCanBeUpdated()
    {
        $districtFakes = factory(District::class, 2)->make();
        $this->post(self::BASE_URI, $districtFakes->first()->toArray());

        $district  = District::first();

        $response = $this->put(self::BASE_URI . '/' . $district->id, $districtFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('districts', $districtFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function districtCanBeDeleted()
    {
        $districtFake = factory(District::class)->make();
        $this->post(self::BASE_URI, $districtFake->toArray());

        $this->assertCount(1, District::all());

        $district  = District::first();

        $response = $this->delete(self::BASE_URI . '/' . $district->id);

        $response->assertStatus(302);
        $this->assertCount(0, District::all());

        $this->assertDatabaseMissing('districts', $districtFake->getAttributes());
    }
}
