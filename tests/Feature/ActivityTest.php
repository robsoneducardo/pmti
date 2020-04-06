<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Activity;

class ActivityTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/activities';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('description');
    }

    /**
     * @test
     */
    public function activityCanBeCreated()
    {
        $activityFake = factory(Activity::class)->make();

        $response = $this->post(self::BASE_URI, $activityFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Activity::all());

        $this->assertDatabaseHas('activities', $activityFake->getAttributes());
    }

    /**
     * @test
     */
    public function activityCanBeUpdated()
    {
        $activityFakes = factory(Activity::class, 2)->make();
        $this->post(self::BASE_URI, $activityFakes->first()->toArray());

        $activity  = Activity::first();

        $response = $this->put(self::BASE_URI . '/' . $activity->id, $activityFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('activities', $activityFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function activityCanBeDeleted()
    {
        $activityFake = factory(Activity::class)->make();
        $this->post(self::BASE_URI, $activityFake->toArray());

        $this->assertCount(1, Activity::all());

        $activity  = Activity::first();

        $response = $this->delete(self::BASE_URI . '/' . $activity->id);

        $response->assertStatus(302);
        $this->assertCount(0, Activity::all());

        $this->assertDatabaseMissing('activities', $activityFake->getAttributes());
    }
}
