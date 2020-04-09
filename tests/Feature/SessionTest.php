<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Session;

class SessionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/sessions';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('activity_id');
        $response->assertSessionHasErrors('minister_id');
        $response->assertSessionHasErrors('day');
        $response->assertSessionHasErrors('hour');
    }

    /**
     * @test
     */
    public function sessionCanBeCreated()
    {
        $sessionFake = factory(Session::class)->make();

        $response = $this->post(self::BASE_URI, $sessionFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Session::all());

        $this->assertDatabaseHas('sessions', $sessionFake->getAttributes());
    }

    /**
     * @test
     */
    public function sessionCanBeUpdated()
    {
        $sessionFakes = factory(Session::class, 2)->make();
        $this->post(self::BASE_URI, $sessionFakes->first()->toArray());

        $session  = Session::first();

        $response = $this->put(self::BASE_URI . '/' . $session->id, $sessionFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('sessions', $sessionFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function sessionCanBeDeleted()
    {
        $sessionFake = factory(Session::class)->make();
        $this->post(self::BASE_URI, $sessionFake->toArray());

        $this->assertCount(1, Session::all());

        $session  = Session::first();

        $response = $this->delete(self::BASE_URI . '/' . $session->id);

        $response->assertStatus(302);
        $this->assertCount(0, Session::all());

        $this->assertDatabaseMissing('sessions', $sessionFake->getAttributes());
    }
}
