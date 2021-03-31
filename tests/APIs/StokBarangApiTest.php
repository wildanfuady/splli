<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\StokBarang;

class StokBarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stok_barangs', $stokBarang
        );

        $this->assertApiResponse($stokBarang);
    }

    /**
     * @test
     */
    public function test_read_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stok_barangs/'.$stokBarang->id
        );

        $this->assertApiResponse($stokBarang->toArray());
    }

    /**
     * @test
     */
    public function test_update_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->create();
        $editedStokBarang = factory(StokBarang::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stok_barangs/'.$stokBarang->id,
            $editedStokBarang
        );

        $this->assertApiResponse($editedStokBarang);
    }

    /**
     * @test
     */
    public function test_delete_stok_barang()
    {
        $stokBarang = factory(StokBarang::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stok_barangs/'.$stokBarang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stok_barangs/'.$stokBarang->id
        );

        $this->response->assertStatus(404);
    }
}
