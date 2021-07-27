<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Person;
use App\User;

class PersonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_person_api()
    {
        $person = factory(Person::class)->make();
        $data = $person->attributesToArray();
        $response = $this->json('POST','api/people',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_person_api()
    {
        $person = factory(Person::class)->create();
        $data = factory(Person::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/people/'.$person->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_person_api()
    {
        $person = factory(Person::class)->create();
        $response = $this->json('DELETE','api/people/'.$person->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $person->refresh();
        $this->assertDatabaseMissing('people',['id' => $person->id]);

    }
}
