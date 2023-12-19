<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /**
     * Test the user creation functionality.
     *
     * @return void
     */
    public function test_user_creation()
    {
        $userData = [
            'email' => 'Unittest@Unittest.com',
            'name' => 'Unittest',
            'password' => '123456',
            'available' => 'Y',
        ];

        $response = $this->post(route('auth.register'), $userData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'email' => 'Unittest@Unittest.com',
            'name' => 'Unittest',
        ]);

        $this->assertTrue(Hash::check('123456', User::where('email', 'Unittest@Unittest.com')->value('password')));
    }

    public function test_user_edit()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'rol_id' => 2,
        ];

        $response = $this->put(route('users.edit', $user), $updatedData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $updatedData['name'],
            'email' => $updatedData['email'],
            'rol_id' => $updatedData['rol_id'],
        ]);

        $response->assertRedirect(route('auth.profile'));
    }
    
    
    public function test_user_delete()
    {
        $user = User::find(1);

        $response = $this->delete(route('users.delete', $user));

        $response->assertRedirect();

        $response = $this->followRedirects($response);

        $response->assertSuccessful();
    }
}
