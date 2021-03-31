<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Seminar;

class SeminarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_seminar()
    {
        $seminar = factory(Seminar::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/seminars', $seminar
        );

        $this->assertApiResponse($seminar);
    }

    /**
     * @test
     */
    public function test_read_seminar()
    {
        $seminar = factory(Seminar::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/seminars/'.$seminar->id
        );

        $this->assertApiResponse($seminar->toArray());
    }

    /**
     * @test
     */
    public function test_update_seminar()
    {
        $seminar = factory(Seminar::class)->create();
        $editedSeminar = factory(Seminar::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/seminars/'.$seminar->id,
            $editedSeminar
        );

        $this->assertApiResponse($editedSeminar);
    }

    /**
     * @test
     */
    public function test_delete_seminar()
    {
        $seminar = factory(Seminar::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/seminars/'.$seminar->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/seminars/'.$seminar->id
        );

        $this->response->assertStatus(404);
    }
}
