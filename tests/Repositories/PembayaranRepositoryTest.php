<?php namespace Tests\Repositories;

use App\Models\Pembayaran;
use App\Repositories\PembayaranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PembayaranRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PembayaranRepository
     */
    protected $pembayaranRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pembayaranRepo = \App::make(PembayaranRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->make()->toArray();

        $createdPembayaran = $this->pembayaranRepo->create($pembayaran);

        $createdPembayaran = $createdPembayaran->toArray();
        $this->assertArrayHasKey('id', $createdPembayaran);
        $this->assertNotNull($createdPembayaran['id'], 'Created Pembayaran must have id specified');
        $this->assertNotNull(Pembayaran::find($createdPembayaran['id']), 'Pembayaran with given id must be in DB');
        $this->assertModelData($pembayaran, $createdPembayaran);
    }

    /**
     * @test read
     */
    public function test_read_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->create();

        $dbPembayaran = $this->pembayaranRepo->find($pembayaran->id);

        $dbPembayaran = $dbPembayaran->toArray();
        $this->assertModelData($pembayaran->toArray(), $dbPembayaran);
    }

    /**
     * @test update
     */
    public function test_update_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->create();
        $fakePembayaran = factory(Pembayaran::class)->make()->toArray();

        $updatedPembayaran = $this->pembayaranRepo->update($fakePembayaran, $pembayaran->id);

        $this->assertModelData($fakePembayaran, $updatedPembayaran->toArray());
        $dbPembayaran = $this->pembayaranRepo->find($pembayaran->id);
        $this->assertModelData($fakePembayaran, $dbPembayaran->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->create();

        $resp = $this->pembayaranRepo->delete($pembayaran->id);

        $this->assertTrue($resp);
        $this->assertNull(Pembayaran::find($pembayaran->id), 'Pembayaran should not exist in DB');
    }
}
