<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Seminar_feedback;

class Seminar_feedbackApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/seminar_feedbacks', $seminarFeedback
        );

        $this->assertApiResponse($seminarFeedback);
    }

    /**
     * @test
     */
    public function test_read_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/seminar_feedbacks/'.$seminarFeedback->id
        );

        $this->assertApiResponse($seminarFeedback->toArray());
    }

    /**
     * @test
     */
    public function test_update_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->create();
        $editedSeminar_feedback = factory(Seminar_feedback::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/seminar_feedbacks/'.$seminarFeedback->id,
            $editedSeminar_feedback
        );

        $this->assertApiResponse($editedSeminar_feedback);
    }

    /**
     * @test
     */
    public function test_delete_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/seminar_feedbacks/'.$seminarFeedback->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/seminar_feedbacks/'.$seminarFeedback->id
        );

        $this->response->assertStatus(404);
    }
}
