<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_user()
    {
        $item = User::factory()->create();
        $response = $this->get('/api/user');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $item->name,
            'email' => $item->email,
            'password' => $item->password,
        ]);
    }
    public function test_store_user()
    {
        $data = [
            'name' => 'sample',
            'email' => 'sample@example.com',
            'password' => 'sample'
        ];
        $response = $this->post('api/user', $data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('users', $data);
    }
    public function test_show_user()
    {
        $item = User::factory()->create();
        $response = $this->get('/api/user/' . $item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $item->name,
            'email' => $item->email,
            'password' => $item->password,
        ]);
    }
}
