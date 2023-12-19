<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Cd;
use App\Models\User;
use App\Models\Genre;
use App\Models\Artist;
use Illuminate\Support\Facades\Hash;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_cart_creation_and_item_addition()
    {
        $cd_id = 1;

        $response = $this->get(route('cart.addToCart', ['cd_id' => $cd_id]));

        $response->assertRedirect();

        $response = $this->followRedirects($response);

        $response->assertSuccessful();
    }

    public function test_cart_removing_item()
    {
        $cd_id = 1;

        $response = $this->get(route('cart.delete', ['cd_id' => $cd_id]));

        $response->assertRedirect();

        $response = $this->followRedirects($response);

        $response->assertSuccessful();
    }
}
