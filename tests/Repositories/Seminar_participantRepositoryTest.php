<?php namespace Tests\Repositories;

use App\Models\Seminar_participant;
use App\Repositories\Seminar_participantRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Seminar_participantRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Seminar_participantRepository
     */
    protected $seminarParticipantRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->seminarParticipantRepo = \App::make(Seminar_participantRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->make()->toArray();

        $createdSeminar_participant = $this->seminarParticipantRepo->create($seminarParticipant);

        $createdSeminar_participant = $createdSeminar_participant->toArray();
        $this->assertArrayHasKey('id', $createdSeminar_participant);
        $this->assertNotNull($createdSeminar_participant['id'], 'Created Seminar_participant must have id specified');
        $this->assertNotNull(Seminar_participant::find($createdSeminar_participant['id']), 'Seminar_participant with given id must be in DB');
        $this->assertModelData($seminarParticipant, $createdSeminar_participant);
    }

    /**
     * @test read
     */
    public function test_read_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->create();

        $dbSeminar_participant = $this->seminarParticipantRepo->find($seminarParticipant->id);

        $dbSeminar_participant = $dbSeminar_participant->toArray();
        $this->assertModelData($seminarParticipant->toArray(), $dbSeminar_participant);
    }

    /**
     * @test update
     */
    public function test_update_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->create();
        $fakeSeminar_participant = factory(Seminar_participant::class)->make()->toArray();

        $updatedSeminar_participant = $this->seminarParticipantRepo->update($fakeSeminar_participant, $seminarParticipant->id);

        $this->assertModelData($fakeSeminar_participant, $updatedSeminar_participant->toArray());
        $dbSeminar_participant = $this->seminarParticipantRepo->find($seminarParticipant->id);
        $this->assertModelData($fakeSeminar_participant, $dbSeminar_participant->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->create();

        $resp = $this->seminarParticipantRepo->delete($seminarParticipant->id);

        $this->assertTrue($resp);
        $this->assertNull(Seminar_participant::find($seminarParticipant->id), 'Seminar_participant should not exist in DB');
    }
}
