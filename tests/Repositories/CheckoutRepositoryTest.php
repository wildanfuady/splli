<?php namespace Tests\Repositories;

use App\Models\Checkout;
use App\Repositories\CheckoutRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CheckoutRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CheckoutRepository
     */
    protected $checkoutRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->checkoutRepo = \App::make(CheckoutRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_checkout()
    {
        $checkout = factory(Checkout::class)->make()->toArray();

        $createdCheckout = $this->checkoutRepo->create($checkout);

        $createdCheckout = $createdCheckout->toArray();
        $this->assertArrayHasKey('id', $createdCheckout);
        $this->assertNotNull($createdCheckout['id'], 'Created Checkout must have id specified');
        $this->assertNotNull(Checkout::find($createdCheckout['id']), 'Checkout with given id must be in DB');
        $this->assertModelData($checkout, $createdCheckout);
    }

    /**
     * @test read
     */
    public function test_read_checkout()
    {
        $checkout = factory(Checkout::class)->create();

        $dbCheckout = $this->checkoutRepo->find($checkout->id);

        $dbCheckout = $dbCheckout->toArray();
        $this->assertModelData($checkout->toArray(), $dbCheckout);
    }

    /**
     * @test update
     */
    public function test_update_checkout()
    {
        $checkout = factory(Checkout::class)->create();
        $fakeCheckout = factory(Checkout::class)->make()->toArray();

        $updatedCheckout = $this->checkoutRepo->update($fakeCheckout, $checkout->id);

        $this->assertModelData($fakeCheckout, $updatedCheckout->toArray());
        $dbCheckout = $this->checkoutRepo->find($checkout->id);
        $this->assertModelData($fakeCheckout, $dbCheckout->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_checkout()
    {
        $checkout = factory(Checkout::class)->create();

        $resp = $this->checkoutRepo->delete($checkout->id);

        $this->assertTrue($resp);
        $this->assertNull(Checkout::find($checkout->id), 'Checkout should not exist in DB');
    }
}
