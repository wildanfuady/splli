<?php namespace Tests\Repositories;

use App\Models\Log;
use App\Repositories\LogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LogRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogRepository
     */
    protected $logRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->logRepo = \App::make(LogRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_log()
    {
        $log = factory(Log::class)->make()->toArray();

        $createdLog = $this->logRepo->create($log);

        $createdLog = $createdLog->toArray();
        $this->assertArrayHasKey('id', $createdLog);
        $this->assertNotNull($createdLog['id'], 'Created Log must have id specified');
        $this->assertNotNull(Log::find($createdLog['id']), 'Log with given id must be in DB');
        $this->assertModelData($log, $createdLog);
    }

    /**
     * @test read
     */
    public function test_read_log()
    {
        $log = factory(Log::class)->create();

        $dbLog = $this->logRepo->find($log->id);

        $dbLog = $dbLog->toArray();
        $this->assertModelData($log->toArray(), $dbLog);
    }

    /**
     * @test update
     */
    public function test_update_log()
    {
        $log = factory(Log::class)->create();
        $fakeLog = factory(Log::class)->make()->toArray();

        $updatedLog = $this->logRepo->update($fakeLog, $log->id);

        $this->assertModelData($fakeLog, $updatedLog->toArray());
        $dbLog = $this->logRepo->find($log->id);
        $this->assertModelData($fakeLog, $dbLog->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_log()
    {
        $log = factory(Log::class)->create();

        $resp = $this->logRepo->delete($log->id);

        $this->assertTrue($resp);
        $this->assertNull(Log::find($log->id), 'Log should not exist in DB');
    }
}
