<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UangDiluar;

class UangDiluarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/uang_diluars', $uangDiluar
        );

        $this->assertApiResponse($uangDiluar);
    }

    /**
     * @test
     */
    public function test_read_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/uang_diluars/'.$uangDiluar->id
        );

        $this->assertApiResponse($uangDiluar->toArray());
    }

    /**
     * @test
     */
    public function test_update_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->create();
        $editedUangDiluar = factory(UangDiluar::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/uang_diluars/'.$uangDiluar->id,
            $editedUangDiluar
        );

        $this->assertApiResponse($editedUangDiluar);
    }

    /**
     * @test
     */
    public function test_delete_uang_diluar()
    {
        $uangDiluar = factory(UangDiluar::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/uang_diluars/'.$uangDiluar->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/uang_diluars/'.$uangDiluar->id
        );

        $this->response->assertStatus(404);
    }
}
