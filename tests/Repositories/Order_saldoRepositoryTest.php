<?php namespace Tests\Repositories;

use App\Models\Order_saldo;
use App\Repositories\Order_saldoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Order_saldoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Order_saldoRepository
     */
    protected $orderSaldoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->orderSaldoRepo = \App::make(Order_saldoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->make()->toArray();

        $createdOrder_saldo = $this->orderSaldoRepo->create($orderSaldo);

        $createdOrder_saldo = $createdOrder_saldo->toArray();
        $this->assertArrayHasKey('id', $createdOrder_saldo);
        $this->assertNotNull($createdOrder_saldo['id'], 'Created Order_saldo must have id specified');
        $this->assertNotNull(Order_saldo::find($createdOrder_saldo['id']), 'Order_saldo with given id must be in DB');
        $this->assertModelData($orderSaldo, $createdOrder_saldo);
    }

    /**
     * @test read
     */
    public function test_read_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->create();

        $dbOrder_saldo = $this->orderSaldoRepo->find($orderSaldo->id);

        $dbOrder_saldo = $dbOrder_saldo->toArray();
        $this->assertModelData($orderSaldo->toArray(), $dbOrder_saldo);
    }

    /**
     * @test update
     */
    public function test_update_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->create();
        $fakeOrder_saldo = factory(Order_saldo::class)->make()->toArray();

        $updatedOrder_saldo = $this->orderSaldoRepo->update($fakeOrder_saldo, $orderSaldo->id);

        $this->assertModelData($fakeOrder_saldo, $updatedOrder_saldo->toArray());
        $dbOrder_saldo = $this->orderSaldoRepo->find($orderSaldo->id);
        $this->assertModelData($fakeOrder_saldo, $dbOrder_saldo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_order_saldo()
    {
        $orderSaldo = factory(Order_saldo::class)->create();

        $resp = $this->orderSaldoRepo->delete($orderSaldo->id);

        $this->assertTrue($resp);
        $this->assertNull(Order_saldo::find($orderSaldo->id), 'Order_saldo should not exist in DB');
    }
}
