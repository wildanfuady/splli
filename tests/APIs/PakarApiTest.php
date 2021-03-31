<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pakar;

class PakarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pakar()
    {
        $pakar = factory(Pakar::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pakars', $pakar
        );

        $this->assertApiResponse($pakar);
    }

    /**
     * @test
     */
    public function test_read_pakar()
    {
        $pakar = factory(Pakar::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pakars/'.$pakar->id
        );

        $this->assertApiResponse($pakar->toArray());
    }

    /**
     * @test
     */
    public function test_update_pakar()
    {
        $pakar = factory(Pakar::class)->create();
        $editedPakar = factory(Pakar::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pakars/'.$pakar->id,
            $editedPakar
        );

        $this->assertApiResponse($editedPakar);
    }

    /**
     * @test
     */
    public function test_delete_pakar()
    {
        $pakar = factory(Pakar::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pakars/'.$pakar->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pakars/'.$pakar->id
        );

        $this->response->assertStatus(404);
    }
}
