<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UangKeluar;

class UangKeluarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/uang_keluars', $uangKeluar
        );

        $this->assertApiResponse($uangKeluar);
    }

    /**
     * @test
     */
    public function test_read_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/uang_keluars/'.$uangKeluar->id
        );

        $this->assertApiResponse($uangKeluar->toArray());
    }

    /**
     * @test
     */
    public function test_update_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->create();
        $editedUangKeluar = factory(UangKeluar::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/uang_keluars/'.$uangKeluar->id,
            $editedUangKeluar
        );

        $this->assertApiResponse($editedUangKeluar);
    }

    /**
     * @test
     */
    public function test_delete_uang_keluar()
    {
        $uangKeluar = factory(UangKeluar::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/uang_keluars/'.$uangKeluar->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/uang_keluars/'.$uangKeluar->id
        );

        $this->response->assertStatus(404);
    }
}
