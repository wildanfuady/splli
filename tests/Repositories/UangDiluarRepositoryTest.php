<?php namespace Tests\Repositories;

use App\Models\UangDiluar;
use App\Repositories\UangDiluarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UangDiluarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UangDiluarRepository
     */
    protected $uangDiluarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->uangDiluarRepo = \App::make(UangDiluarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->make()->toArray();

        $createdUangDiluar = $this->uangDiluarRepo->create($uangDiluar);

        $createdUangDiluar = $createdUangDiluar->toArray();
        $this->assertArrayHasKey('id', $createdUangDiluar);
        $this->assertNotNull($createdUangDiluar['id'], 'Created UangDiluar must have id specified');
        $this->assertNotNull(UangDiluar::find($createdUangDiluar['id']), 'UangDiluar with given id must be in DB');
        $this->assertModelData($uangDiluar, $createdUangDiluar);
    }

    /**
     * @test read
     */
    public function test_read_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->create();

        $dbUangDiluar = $this->uangDiluarRepo->find($uangDiluar->id);

        $dbUangDiluar = $dbUangDiluar->toArray();
        $this->assertModelData($uangDiluar->toArray(), $dbUangDiluar);
    }

    /**
     * @test update
     */
    public function test_update_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->create();
        $fakeUangDiluar = factory(UangDiluar::class)->make()->toArray();

        $updatedUangDiluar = $this->uangDiluarRepo->update($fakeUangDiluar, $uangDiluar->id);

        $this->assertModelData($fakeUangDiluar, $updatedUangDiluar->toArray());
        $dbUangDiluar = $this->uangDiluarRepo->find($uangDiluar->id);
        $this->assertModelData($fakeUangDiluar, $dbUangDiluar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->create();

        $resp = $this->uangDiluarRepo->delete($uangDiluar->id);

        $this->assertTrue($resp);
        $this->assertNull(UangDiluar::find($uangDiluar->id), 'UangDiluar should not exist in DB');
    }
}
