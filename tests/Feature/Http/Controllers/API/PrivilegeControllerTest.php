<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Privilege;
use App\User;

class PrivilegeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_privilege_api()
    {
        $privilege = factory(Privilege::class)->make();
        $data = $privilege->attributesToArray();
        $response = $this->json('POST','api/privileges',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_privilege_api()
    {
        $privilege = factory(Privilege::class)->create();
        $data = factory(Privilege::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/privileges/'.$privilege->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_privilege_api()
    {
        $privilege = factory(Privilege::class)->create();
        $response = $this->json('DELETE','api/privileges/'.$privilege->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $privilege->refresh();
        $this->assertDatabaseMissing('privileges',['id' => $privilege->id]);

    }
}
