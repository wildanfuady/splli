<?php namespace Tests\Repositories;

use App\Models\HasilUsaha;
use App\Repositories\HasilUsahaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HasilUsahaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HasilUsahaRepository
     */
    protected $hasilUsahaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->hasilUsahaRepo = \App::make(HasilUsahaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->make()->toArray();

        $createdHasilUsaha = $this->hasilUsahaRepo->create($hasilUsaha);

        $createdHasilUsaha = $createdHasilUsaha->toArray();
        $this->assertArrayHasKey('id', $createdHasilUsaha);
        $this->assertNotNull($createdHasilUsaha['id'], 'Created HasilUsaha must have id specified');
        $this->assertNotNull(HasilUsaha::find($createdHasilUsaha['id']), 'HasilUsaha with given id must be in DB');
        $this->assertModelData($hasilUsaha, $createdHasilUsaha);
    }

    /**
     * @test read
     */
    public function test_read_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->create();

        $dbHasilUsaha = $this->hasilUsahaRepo->find($hasilUsaha->id);

        $dbHasilUsaha = $dbHasilUsaha->toArray();
        $this->assertModelData($hasilUsaha->toArray(), $dbHasilUsaha);
    }

    /**
     * @test update
     */
    public function test_update_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->create();
        $fakeHasilUsaha = factory(HasilUsaha::class)->make()->toArray();

        $updatedHasilUsaha = $this->hasilUsahaRepo->update($fakeHasilUsaha, $hasilUsaha->id);

        $this->assertModelData($fakeHasilUsaha, $updatedHasilUsaha->toArray());
        $dbHasilUsaha = $this->hasilUsahaRepo->find($hasilUsaha->id);
        $this->assertModelData($fakeHasilUsaha, $dbHasilUsaha->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->create();

        $resp = $this->hasilUsahaRepo->delete($hasilUsaha->id);

        $this->assertTrue($resp);
        $this->assertNull(HasilUsaha::find($hasilUsaha->id), 'HasilUsaha should not exist in DB');
    }
}
