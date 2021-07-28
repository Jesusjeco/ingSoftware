<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Activity;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_activity_and_redirects()
    {

        $activity = factory(Activity::class)->make();
        $data = $activity->attributesToArray();
        $response = $this->post(route('activities.store'), $data);
        $response->assertRedirect(route('activities.index'));
        $response->assertSessionHas('status', 'Activity created!');
    }

    /**
     * @test
     */
    public function it_updates_activity_and_redirects()
    {
        $activity = factory(Activity::class)->create();
        $data = factory(Activity::class)->make()->attributesToArray();
        $response = $this->put(route('activities.update', ['activity' => $activity]), $data);
        $response->assertRedirect(route('activities.index'));
        $response->assertSessionHas('status', 'Activity updated!');
    }

    /**
     * @test
     */
    public function it_destroys_activity_and_redirects()
    {
        $activity = factory(Activity::class)->create();
        $response = $this->delete(route('activities.destroy', ['activity' => $activity]));
        $response->assertRedirect(route('activities.index'));
        $response->assertSessionHas('status', 'Activity destroyed!');
    }
}
