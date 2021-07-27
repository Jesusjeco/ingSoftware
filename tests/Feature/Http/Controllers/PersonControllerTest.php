<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Person;

class PersonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_person_and_redirects()
    {

        $person = factory(Person::class)->make();
        $data = $person->attributesToArray();
        $response = $this->post(route('people.store'), $data);
        $response->assertRedirect(route('people.index'));
        $response->assertSessionHas('status', 'Person created!');
    }

    /**
     * @test
     */
    public function it_updates_person_and_redirects()
    {
        $person = factory(Person::class)->create();
        $data = factory(Person::class)->make()->attributesToArray();
        $response = $this->put(route('people.update', ['person' => $person]), $data);
        $response->assertRedirect(route('people.index'));
        $response->assertSessionHas('status', 'Person updated!');
    }

    /**
     * @test
     */
    public function it_destroys_person_and_redirects()
    {
        $person = factory(Person::class)->create();
        $response = $this->delete(route('people.destroy', ['person' => $person]));
        $response->assertRedirect(route('people.index'));
        $response->assertSessionHas('status', 'Person destroyed!');
    }
}
