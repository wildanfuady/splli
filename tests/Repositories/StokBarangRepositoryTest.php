<?php namespace Tests\Repositories;

use App\Models\StokBarang;
use App\Repositories\StokBarangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StokBarangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StokBarangRepository
     */
    protected $stokBarangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stokBarangRepo = \App::make(StokBarangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->make()->toArray();

        $createdStokBarang = $this->stokBarangRepo->create($stokBarang);

        $createdStokBarang = $createdStokBarang->toArray();
        $this->assertArrayHasKey('id', $createdStokBarang);
        $this->assertNotNull($createdStokBarang['id'], 'Created StokBarang must have id specified');
        $this->assertNotNull(StokBarang::find($createdStokBarang['id']), 'StokBarang with given id must be in DB');
        $this->assertModelData($stokBarang, $createdStokBarang);
    }

    /**
     * @test read
     */
    public function test_read_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->create();

        $dbStokBarang = $this->stokBarangRepo->find($stokBarang->id);

        $dbStokBarang = $dbStokBarang->toArray();
        $this->assertModelData($stokBarang->toArray(), $dbStokBarang);
    }

    /**
     * @test update
     */
    public function test_update_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->create();
        $fakeStokBarang = factory(StokBarang::class)->make()->toArray();

        $updatedStokBarang = $this->stokBarangRepo->update($fakeStokBarang, $stokBarang->id);

        $this->assertModelData($fakeStokBarang, $updatedStokBarang->toArray());
        $dbStokBarang = $this->stokBarangRepo->find($stokBarang->id);
        $this->assertModelData($fakeStokBarang, $dbStokBarang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->create();

        $resp = $this->stokBarangRepo->delete($stokBarang->id);

        $this->assertTrue($resp);
        $this->assertNull(StokBarang::find($stokBarang->id), 'StokBarang should not exist in DB');
    }
}
