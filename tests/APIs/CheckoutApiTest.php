<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Checkout;

class CheckoutApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_checkout()
    {
        $checkout = factory(Checkout::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/checkouts', $checkout
        );

        $this->assertApiResponse($checkout);
    }

    /**
     * @test
     */
    public function test_read_checkout()
    {
        $checkout = factory(Checkout::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/checkouts/'.$checkout->id
        );

        $this->assertApiResponse($checkout->toArray());
    }

    /**
     * @test
     */
    public function test_update_checkout()
    {
        $checkout = factory(Checkout::class)->create();
        $editedCheckout = factory(Checkout::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/checkouts/'.$checkout->id,
            $editedCheckout
        );

        $this->assertApiResponse($editedCheckout);
    }

    /**
     * @test
     */
    public function test_delete_checkout()
    {
        $checkout = factory(Checkout::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/checkouts/'.$checkout->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/checkouts/'.$checkout->id
        );

        $this->response->assertStatus(404);
    }
}
