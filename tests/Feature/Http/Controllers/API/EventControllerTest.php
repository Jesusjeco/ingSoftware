<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Event;
use App\User;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_event_api()
    {
        $event = factory(Event::class)->make();
        $data = $event->attributesToArray();
        $response = $this->json('POST','api/events',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_event_api()
    {
        $event = factory(Event::class)->create();
        $data = factory(Event::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/events/'.$event->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_event_api()
    {
        $event = factory(Event::class)->create();
        $response = $this->json('DELETE','api/events/'.$event->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $event->refresh();
        $this->assertDatabaseMissing('events',['id' => $event->id]);

    }
}
