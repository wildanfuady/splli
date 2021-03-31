<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\HasilUsaha;

class HasilUsahaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/hasil_usahas', $hasilUsaha
        );

        $this->assertApiResponse($hasilUsaha);
    }

    /**
     * @test
     */
    public function test_read_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/hasil_usahas/'.$hasilUsaha->id
        );

        $this->assertApiResponse($hasilUsaha->toArray());
    }

    /**
     * @test
     */
    public function test_update_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->create();
        $editedHasilUsaha = factory(HasilUsaha::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/hasil_usahas/'.$hasilUsaha->id,
            $editedHasilUsaha
        );

        $this->assertApiResponse($editedHasilUsaha);
    }

    /**
     * @test
     */
    public function test_delete_hasil_usaha()
    {
        $hasilUsaha = factory(HasilUsaha::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/hasil_usahas/'.$hasilUsaha->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/hasil_usahas/'.$hasilUsaha->id
        );

        $this->response->assertStatus(404);
    }
}
