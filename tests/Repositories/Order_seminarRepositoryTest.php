<?php namespace Tests\Repositories;

use App\Models\Order_seminar;
use App\Repositories\Order_seminarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Order_seminarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Order_seminarRepository
     */
    protected $orderSeminarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->orderSeminarRepo = \App::make(Order_seminarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->make()->toArray();

        $createdOrder_seminar = $this->orderSeminarRepo->create($orderSeminar);

        $createdOrder_seminar = $createdOrder_seminar->toArray();
        $this->assertArrayHasKey('id', $createdOrder_seminar);
        $this->assertNotNull($createdOrder_seminar['id'], 'Created Order_seminar must have id specified');
        $this->assertNotNull(Order_seminar::find($createdOrder_seminar['id']), 'Order_seminar with given id must be in DB');
        $this->assertModelData($orderSeminar, $createdOrder_seminar);
    }

    /**
     * @test read
     */
    public function test_read_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->create();

        $dbOrder_seminar = $this->orderSeminarRepo->find($orderSeminar->id);

        $dbOrder_seminar = $dbOrder_seminar->toArray();
        $this->assertModelData($orderSeminar->toArray(), $dbOrder_seminar);
    }

    /**
     * @test update
     */
    public function test_update_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->create();
        $fakeOrder_seminar = factory(Order_seminar::class)->make()->toArray();

        $updatedOrder_seminar = $this->orderSeminarRepo->update($fakeOrder_seminar, $orderSeminar->id);

        $this->assertModelData($fakeOrder_seminar, $updatedOrder_seminar->toArray());
        $dbOrder_seminar = $this->orderSeminarRepo->find($orderSeminar->id);
        $this->assertModelData($fakeOrder_seminar, $dbOrder_seminar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_order_seminar()
    {
        $orderSeminar = factory(Order_seminar::class)->create();

        $resp = $this->orderSeminarRepo->delete($orderSeminar->id);

        $this->assertTrue($resp);
        $this->assertNull(Order_seminar::find($orderSeminar->id), 'Order_seminar should not exist in DB');
    }
}
