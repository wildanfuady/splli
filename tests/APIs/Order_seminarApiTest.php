<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Order_seminar;

class Order_seminarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/order_seminars', $orderSeminar
        );

        $this->assertApiResponse($orderSeminar);
    }

    /**
     * @test
     */
    public function test_read_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/order_seminars/'.$orderSeminar->id
        );

        $this->assertApiResponse($orderSeminar->toArray());
    }

    /**
     * @test
     */
    public function test_update_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->create();
        $editedOrder_seminar = factory(Order_seminar::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/order_seminars/'.$orderSeminar->id,
            $editedOrder_seminar
        );

        $this->assertApiResponse($editedOrder_seminar);
    }

    /**
     * @test
     */
    public function test_delete_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/order_seminars/'.$orderSeminar->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/order_seminars/'.$orderSeminar->id
        );

        $this->response->assertStatus(404);
    }
}
