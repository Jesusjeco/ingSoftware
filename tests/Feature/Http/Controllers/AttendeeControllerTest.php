<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Attendee;

class AttendeeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_attendee_and_redirects()
    {

        $attendee = factory(Attendee::class)->make();
        $data = $attendee->attributesToArray();
        $response = $this->post(route('attendees.store'), $data);
        $response->assertRedirect(route('attendees.index'));
        $response->assertSessionHas('status', 'Attendee created!');
    }

    /**
     * @test
     */
    public function it_updates_attendee_and_redirects()
    {
        $attendee = factory(Attendee::class)->create();
        $data = factory(Attendee::class)->make()->attributesToArray();
        $response = $this->put(route('attendees.update', ['attendee' => $attendee]), $data);
        $response->assertRedirect(route('attendees.index'));
        $response->assertSessionHas('status', 'Attendee updated!');
    }

    /**
     * @test
     */
    public function it_destroys_attendee_and_redirects()
    {
        $attendee = factory(Attendee::class)->create();
        $response = $this->delete(route('attendees.destroy', ['attendee' => $attendee]));
        $response->assertRedirect(route('attendees.index'));
        $response->assertSessionHas('status', 'Attendee destroyed!');
    }
}
