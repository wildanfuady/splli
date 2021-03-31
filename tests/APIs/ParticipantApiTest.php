<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Participant;

class ParticipantApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_participant()
    {
        $participant = factory(Participant::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/participants', $participant
        );

        $this->assertApiResponse($participant);
    }

    /**
     * @test
     */
    public function test_read_participant()
    {
        $participant = factory(Participant::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/participants/'.$participant->id
        );

        $this->assertApiResponse($participant->toArray());
    }

    /**
     * @test
     */
    public function test_update_participant()
    {
        $participant = factory(Participant::class)->create();
        $editedParticipant = factory(Participant::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/participants/'.$participant->id,
            $editedParticipant
        );

        $this->assertApiResponse($editedParticipant);
    }

    /**
     * @test
     */
    public function test_delete_participant()
    {
        $participant = factory(Participant::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/participants/'.$participant->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/participants/'.$participant->id
        );

        $this->response->assertStatus(404);
    }
}
