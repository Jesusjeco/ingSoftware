<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Privilege;

class PrivilegeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_privilege_and_redirects()
    {

        $privilege = factory(Privilege::class)->make();
        $data = $privilege->attributesToArray();
        $response = $this->post(route('privileges.store'), $data);
        $response->assertRedirect(route('privileges.index'));
        $response->assertSessionHas('status', 'Privilege created!');
    }

    /**
     * @test
     */
    public function it_updates_privilege_and_redirects()
    {
        $privilege = factory(Privilege::class)->create();
        $data = factory(Privilege::class)->make()->attributesToArray();
        $response = $this->put(route('privileges.update', ['privilege' => $privilege]), $data);
        $response->assertRedirect(route('privileges.index'));
        $response->assertSessionHas('status', 'Privilege updated!');
    }

    /**
     * @test
     */
    public function it_destroys_privilege_and_redirects()
    {
        $privilege = factory(Privilege::class)->create();
        $response = $this->delete(route('privileges.destroy', ['privilege' => $privilege]));
        $response->assertRedirect(route('privileges.index'));
        $response->assertSessionHas('status', 'Privilege destroyed!');
    }
}
