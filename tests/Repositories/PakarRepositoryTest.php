<?php namespace Tests\Repositories;

use App\Models\Pakar;
use App\Repositories\PakarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PakarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PakarRepository
     */
    protected $pakarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pakarRepo = \App::make(PakarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pakar()
    {
        $pakar = factory(Pakar::class)->make()->toArray();

        $createdPakar = $this->pakarRepo->create($pakar);

        $createdPakar = $createdPakar->toArray();
        $this->assertArrayHasKey('id', $createdPakar);
        $this->assertNotNull($createdPakar['id'], 'Created Pakar must have id specified');
        $this->assertNotNull(Pakar::find($createdPakar['id']), 'Pakar with given id must be in DB');
        $this->assertModelData($pakar, $createdPakar);
    }

    /**
     * @test read
     */
    public function test_read_pakar()
    {
        $pakar = factory(Pakar::class)->create();

        $dbPakar = $this->pakarRepo->find($pakar->id);

        $dbPakar = $dbPakar->toArray();
        $this->assertModelData($pakar->toArray(), $dbPakar);
    }

    /**
     * @test update
     */
    public function test_update_pakar()
    {
        $pakar = factory(Pakar::class)->create();
        $fakePakar = factory(Pakar::class)->make()->toArray();

        $updatedPakar = $this->pakarRepo->update($fakePakar, $pakar->id);

        $this->assertModelData($fakePakar, $updatedPakar->toArray());
        $dbPakar = $this->pakarRepo->find($pakar->id);
        $this->assertModelData($fakePakar, $dbPakar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pakar()
    {
        $pakar = factory(Pakar::class)->create();

        $resp = $this->pakarRepo->delete($pakar->id);

        $this->assertTrue($resp);
        $this->assertNull(Pakar::find($pakar->id), 'Pakar should not exist in DB');
    }
}
