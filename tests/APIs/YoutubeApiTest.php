<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Youtube;

class YoutubeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_youtube()
    {
        $youtube = factory(Youtube::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/youtubes', $youtube
        );

        $this->assertApiResponse($youtube);
    }

    /**
     * @test
     */
    public function test_read_youtube()
    {
        $youtube = factory(Youtube::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/youtubes/'.$youtube->id
        );

        $this->assertApiResponse($youtube->toArray());
    }

    /**
     * @test
     */
    public function test_update_youtube()
    {
        $youtube = factory(Youtube::class)->create();
        $editedYoutube = factory(Youtube::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/youtubes/'.$youtube->id,
            $editedYoutube
        );

        $this->assertApiResponse($editedYoutube);
    }

    /**
     * @test
     */
    public function test_delete_youtube()
    {
        $youtube = factory(Youtube::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/youtubes/'.$youtube->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/youtubes/'.$youtube->id
        );

        $this->response->assertStatus(404);
    }
}
