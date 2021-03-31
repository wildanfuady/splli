<?php namespace Tests\Repositories;

use App\Models\Youtube;
use App\Repositories\YoutubeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class YoutubeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var YoutubeRepository
     */
    protected $youtubeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->youtubeRepo = \App::make(YoutubeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_youtube()
    {
        $youtube = factory(Youtube::class)->make()->toArray();

        $createdYoutube = $this->youtubeRepo->create($youtube);

        $createdYoutube = $createdYoutube->toArray();
        $this->assertArrayHasKey('id', $createdYoutube);
        $this->assertNotNull($createdYoutube['id'], 'Created Youtube must have id specified');
        $this->assertNotNull(Youtube::find($createdYoutube['id']), 'Youtube with given id must be in DB');
        $this->assertModelData($youtube, $createdYoutube);
    }

    /**
     * @test read
     */
    public function test_read_youtube()
    {
        $youtube = factory(Youtube::class)->create();

        $dbYoutube = $this->youtubeRepo->find($youtube->id);

        $dbYoutube = $dbYoutube->toArray();
        $this->assertModelData($youtube->toArray(), $dbYoutube);
    }

    /**
     * @test update
     */
    public function test_update_youtube()
    {
        $youtube = factory(Youtube::class)->create();
        $fakeYoutube = factory(Youtube::class)->make()->toArray();

        $updatedYoutube = $this->youtubeRepo->update($fakeYoutube, $youtube->id);

        $this->assertModelData($fakeYoutube, $updatedYoutube->toArray());
        $dbYoutube = $this->youtubeRepo->find($youtube->id);
        $this->assertModelData($fakeYoutube, $dbYoutube->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_youtube()
    {
        $youtube = factory(Youtube::class)->create();

        $resp = $this->youtubeRepo->delete($youtube->id);

        $this->assertTrue($resp);
        $this->assertNull(Youtube::find($youtube->id), 'Youtube should not exist in DB');
    }
}
