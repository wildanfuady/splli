<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pembayaran;

class PembayaranApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pembayarans', $pembayaran
        );

        $this->assertApiResponse($pembayaran);
    }

    /**
     * @test
     */
    public function test_read_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pembayarans/'.$pembayaran->id
        );

        $this->assertApiResponse($pembayaran->toArray());
    }

    /**
     * @test
     */
    public function test_update_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->create();
        $editedPembayaran = factory(Pembayaran::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pembayarans/'.$pembayaran->id,
            $editedPembayaran
        );

        $this->assertApiResponse($editedPembayaran);
    }

    /**
     * @test
     */
    public function test_delete_pembayaran()
    {
        $pembayaran = factory(Pembayaran::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pembayarans/'.$pembayaran->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pembayarans/'.$pembayaran->id
        );

        $this->response->assertStatus(404);
    }
}
