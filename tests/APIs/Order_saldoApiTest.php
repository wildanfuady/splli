<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Order_saldo;

class Order_saldoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/order_saldos', $orderSaldo
        );

        $this->assertApiResponse($orderSaldo);
    }

    /**
     * @test
     */
    public function test_read_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/order_saldos/'.$orderSaldo->id
        );

        $this->assertApiResponse($orderSaldo->toArray());
    }

    /**
     * @test
     */
    public function test_update_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->create();
        $editedOrder_saldo = factory(Order_saldo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/order_saldos/'.$orderSaldo->id,
            $editedOrder_saldo
        );

        $this->assertApiResponse($editedOrder_saldo);
    }

    /**
     * @test
     */
    public function test_delete_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/order_saldos/'.$orderSaldo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/order_saldos/'.$orderSaldo->id
        );

        $this->response->assertStatus(404);
    }
}
