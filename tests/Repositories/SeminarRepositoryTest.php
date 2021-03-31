<?php namespace Tests\Repositories;

use App\Models\Seminar;
use App\Repositories\SeminarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SeminarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SeminarRepository
     */
    protected $seminarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->seminarRepo = \App::make(SeminarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_seminar()
    {
        $seminar = factory(Seminar::class)->make()->toArray();

        $createdSeminar = $this->seminarRepo->create($seminar);

        $createdSeminar = $createdSeminar->toArray();
        $this->assertArrayHasKey('id', $createdSeminar);
        $this->assertNotNull($createdSeminar['id'], 'Created Seminar must have id specified');
        $this->assertNotNull(Seminar::find($createdSeminar['id']), 'Seminar with given id must be in DB');
        $this->assertModelData($seminar, $createdSeminar);
    }

    /**
     * @test read
     */
    public function test_read_seminar()
    {
        $seminar = factory(Seminar::class)->create();

        $dbSeminar = $this->seminarRepo->find($seminar->id);

        $dbSeminar = $dbSeminar->toArray();
        $this->assertModelData($seminar->toArray(), $dbSeminar);
    }

    /**
     * @test update
     */
    public function test_update_seminar()
    {
        $seminar = factory(Seminar::class)->create();
        $fakeSeminar = factory(Seminar::class)->make()->toArray();

        $updatedSeminar = $this->seminarRepo->update($fakeSeminar, $seminar->id);

        $this->assertModelData($fakeSeminar, $updatedSeminar->toArray());
        $dbSeminar = $this->seminarRepo->find($seminar->id);
        $this->assertModelData($fakeSeminar, $dbSeminar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_seminar()
    {
        $seminar = factory(Seminar::class)->create();

        $resp = $this->seminarRepo->delete($seminar->id);

        $this->assertTrue($resp);
        $this->assertNull(Seminar::find($seminar->id), 'Seminar should not exist in DB');
    }
}
