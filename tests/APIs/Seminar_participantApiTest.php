<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Seminar_participant;

class Seminar_participantApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/seminar_participants', $seminarParticipant
        );

        $this->assertApiResponse($seminarParticipant);
    }

    /**
     * @test
     */
    public function test_read_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/seminar_participants/'.$seminarParticipant->id
        );

        $this->assertApiResponse($seminarParticipant->toArray());
    }

    /**
     * @test
     */
    public function test_update_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->create();
        $editedSeminar_participant = factory(Seminar_participant::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/seminar_participants/'.$seminarParticipant->id,
            $editedSeminar_participant
        );

        $this->assertApiResponse($editedSeminar_participant);
    }

    /**
     * @test
     */
    public function test_delete_seminar_participant()
    {
        $seminarParticipant = factory(Seminar_participant::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/seminar_participants/'.$seminarParticipant->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/seminar_participants/'.$seminarParticipant->id
        );

        $this->response->assertStatus(404);
    }
}
