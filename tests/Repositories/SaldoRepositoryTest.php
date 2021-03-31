<?php namespace Tests\Repositories;

use App\Models\Saldo;
use App\Repositories\SaldoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SaldoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SaldoRepository
     */
    protected $saldoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->saldoRepo = \App::make(SaldoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_saldo()
    {
        $saldo = factory(Saldo::class)->make()->toArray();

        $createdSaldo = $this->saldoRepo->create($saldo);

        $createdSaldo = $createdSaldo->toArray();
        $this->assertArrayHasKey('id', $createdSaldo);
        $this->assertNotNull($createdSaldo['id'], 'Created Saldo must have id specified');
        $this->assertNotNull(Saldo::find($createdSaldo['id']), 'Saldo with given id must be in DB');
        $this->assertModelData($saldo, $createdSaldo);
    }

    /**
     * @test read
     */
    public function test_read_saldo()
    {
        $saldo = factory(Saldo::class)->create();

        $dbSaldo = $this->saldoRepo->find($saldo->id);

        $dbSaldo = $dbSaldo->toArray();
        $this->assertModelData($saldo->toArray(), $dbSaldo);
    }

    /**
     * @test update
     */
    public function test_update_saldo()
    {
        $saldo = factory(Saldo::class)->create();
        $fakeSaldo = factory(Saldo::class)->make()->toArray();

        $updatedSaldo = $this->saldoRepo->update($fakeSaldo, $saldo->id);

        $this->assertModelData($fakeSaldo, $updatedSaldo->toArray());
        $dbSaldo = $this->saldoRepo->find($saldo->id);
        $this->assertModelData($fakeSaldo, $dbSaldo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_saldo()
    {
        $saldo = factory(Saldo::class)->create();

        $resp = $this->saldoRepo->delete($saldo->id);

        $this->assertTrue($resp);
        $this->assertNull(Saldo::find($saldo->id), 'Saldo should not exist in DB');
    }
}
