<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Saldo;

class SaldoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_saldo()
    {
        $saldo = factory(Saldo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/saldos', $saldo
        );

        $this->assertApiResponse($saldo);
    }

    /**
     * @test
     */
    public function test_read_saldo()
    {
        $saldo = factory(Saldo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/saldos/'.$saldo->id
        );

        $this->assertApiResponse($saldo->toArray());
    }

    /**
     * @test
     */
    public function test_update_saldo()
    {
        $saldo = factory(Saldo::class)->create();
        $editedSaldo = factory(Saldo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/saldos/'.$saldo->id,
            $editedSaldo
        );

        $this->assertApiResponse($editedSaldo);
    }

    /**
     * @test
     */
    public function test_delete_saldo()
    {
        $saldo = factory(Saldo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/saldos/'.$saldo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/saldos/'.$saldo->id
        );

        $this->response->assertStatus(404);
    }
}
