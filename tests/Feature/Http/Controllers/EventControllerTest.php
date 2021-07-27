<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Event;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_event_and_redirects()
    {

        $event = factory(Event::class)->make();
        $data = $event->attributesToArray();
        $response = $this->post(route('events.store'), $data);
        $response->assertRedirect(route('events.index'));
        $response->assertSessionHas('status', 'Event created!');
    }

    /**
     * @test
     */
    public function it_updates_event_and_redirects()
    {
        $event = factory(Event::class)->create();
        $data = factory(Event::class)->make()->attributesToArray();
        $response = $this->put(route('events.update', ['event' => $event]), $data);
        $response->assertRedirect(route('events.index'));
        $response->assertSessionHas('status', 'Event updated!');
    }

    /**
     * @test
     */
    public function it_destroys_event_and_redirects()
    {
        $event = factory(Event::class)->create();
        $response = $this->delete(route('events.destroy', ['event' => $event]));
        $response->assertRedirect(route('events.index'));
        $response->assertSessionHas('status', 'Event destroyed!');
    }
}
