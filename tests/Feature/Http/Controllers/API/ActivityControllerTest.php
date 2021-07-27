<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Activity;
use App\User;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_activity_api()
    {
        $activity = factory(Activity::class)->make();
        $data = $activity->attributesToArray();
        $response = $this->json('POST','api/activities',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_activity_api()
    {
        $activity = factory(Activity::class)->create();
        $data = factory(Activity::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/activities/'.$activity->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_activity_api()
    {
        $activity = factory(Activity::class)->create();
        $response = $this->json('DELETE','api/activities/'.$activity->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $activity->refresh();
        $this->assertDatabaseMissing('activities',['id' => $activity->id]);

    }
}
