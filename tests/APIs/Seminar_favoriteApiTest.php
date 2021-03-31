<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Seminar_favorite;

class Seminar_favoriteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/seminar_favorites', $seminarFavorite
        );

        $this->assertApiResponse($seminarFavorite);
    }

    /**
     * @test
     */
    public function test_read_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/seminar_favorites/'.$seminarFavorite->id
        );

        $this->assertApiResponse($seminarFavorite->toArray());
    }

    /**
     * @test
     */
    public function test_update_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->create();
        $editedSeminar_favorite = factory(Seminar_favorite::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/seminar_favorites/'.$seminarFavorite->id,
            $editedSeminar_favorite
        );

        $this->assertApiResponse($editedSeminar_favorite);
    }

    /**
     * @test
     */
    public function test_delete_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/seminar_favorites/'.$seminarFavorite->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/seminar_favorites/'.$seminarFavorite->id
        );

        $this->response->assertStatus(404);
    }
}
