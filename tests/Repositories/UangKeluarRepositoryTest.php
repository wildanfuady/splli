<?php namespace Tests\Repositories;

use App\Models\UangKeluar;
use App\Repositories\UangKeluarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UangKeluarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UangKeluarRepository
     */
    protected $uangKeluarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->uangKeluarRepo = \App::make(UangKeluarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->make()->toArray();

        $createdUangKeluar = $this->uangKeluarRepo->create($uangKeluar);

        $createdUangKeluar = $createdUangKeluar->toArray();
        $this->assertArrayHasKey('id', $createdUangKeluar);
        $this->assertNotNull($createdUangKeluar['id'], 'Created UangKeluar must have id specified');
        $this->assertNotNull(UangKeluar::find($createdUangKeluar['id']), 'UangKeluar with given id must be in DB');
        $this->assertModelData($uangKeluar, $createdUangKeluar);
    }

    /**
     * @test read
     */
    public function test_read_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->create();

        $dbUangKeluar = $this->uangKeluarRepo->find($uangKeluar->id);

        $dbUangKeluar = $dbUangKeluar->toArray();
        $this->assertModelData($uangKeluar->toArray(), $dbUangKeluar);
    }

    /**
     * @test update
     */
    public function test_update_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->create();
        $fakeUangKeluar = factory(UangKeluar::class)->make()->toArray();

        $updatedUangKeluar = $this->uangKeluarRepo->update($fakeUangKeluar, $uangKeluar->id);

        $this->assertModelData($fakeUangKeluar, $updatedUangKeluar->toArray());
        $dbUangKeluar = $this->uangKeluarRepo->find($uangKeluar->id);
        $this->assertModelData($fakeUangKeluar, $dbUangKeluar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->create();

        $resp = $this->uangKeluarRepo->delete($uangKeluar->id);

        $this->assertTrue($resp);
        $this->assertNull(UangKeluar::find($uangKeluar->id), 'UangKeluar should not exist in DB');
    }
}
