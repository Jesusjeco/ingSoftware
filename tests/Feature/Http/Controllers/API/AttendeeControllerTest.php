<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Attendee;
use App\User;

class AttendeeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_attendee_api()
    {
        $attendee = factory(Attendee::class)->make();
        $data = $attendee->attributesToArray();
        $response = $this->json('POST','api/attendees',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_attendee_api()
    {
        $attendee = factory(Attendee::class)->create();
        $data = factory(Attendee::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/attendees/'.$attendee->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_attendee_api()
    {
        $attendee = factory(Attendee::class)->create();
        $response = $this->json('DELETE','api/attendees/'.$attendee->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $attendee->refresh();
        $this->assertDatabaseMissing('attendees',['id' => $attendee->id]);

    }
}
