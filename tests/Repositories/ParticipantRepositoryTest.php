<?php namespace Tests\Repositories;

use App\Models\Participant;
use App\Repositories\ParticipantRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ParticipantRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParticipantRepository
     */
    protected $participantRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->participantRepo = \App::make(ParticipantRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_participant()
    {
        $participant = factory(Participant::class)->make()->toArray();

        $createdParticipant = $this->participantRepo->create($participant);

        $createdParticipant = $createdParticipant->toArray();
        $this->assertArrayHasKey('id', $createdParticipant);
        $this->assertNotNull($createdParticipant['id'], 'Created Participant must have id specified');
        $this->assertNotNull(Participant::find($createdParticipant['id']), 'Participant with given id must be in DB');
        $this->assertModelData($participant, $createdParticipant);
    }

    /**
     * @test read
     */
    public function test_read_participant()
    {
        $participant = factory(Participant::class)->create();

        $dbParticipant = $this->participantRepo->find($participant->id);

        $dbParticipant = $dbParticipant->toArray();
        $this->assertModelData($participant->toArray(), $dbParticipant);
    }

    /**
     * @test update
     */
    public function test_update_participant()
    {
        $participant = factory(Participant::class)->create();
        $fakeParticipant = factory(Participant::class)->make()->toArray();

        $updatedParticipant = $this->participantRepo->update($fakeParticipant, $participant->id);

        $this->assertModelData($fakeParticipant, $updatedParticipant->toArray());
        $dbParticipant = $this->participantRepo->find($participant->id);
        $this->assertModelData($fakeParticipant, $dbParticipant->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_participant()
    {
        $participant = factory(Participant::class)->create();

        $resp = $this->participantRepo->delete($participant->id);

        $this->assertTrue($resp);
        $this->assertNull(Participant::find($participant->id), 'Participant should not exist in DB');
    }
}
