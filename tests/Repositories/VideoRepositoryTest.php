<?php namespace Tests\Repositories;

use App\Models\Video;
use App\Repositories\VideoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VideoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VideoRepository
     */
    protected $videoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->videoRepo = \App::make(VideoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_video()
    {
        $video = factory(Video::class)->make()->toArray();

        $createdVideo = $this->videoRepo->create($video);

        $createdVideo = $createdVideo->toArray();
        $this->assertArrayHasKey('id', $createdVideo);
        $this->assertNotNull($createdVideo['id'], 'Created Video must have id specified');
        $this->assertNotNull(Video::find($createdVideo['id']), 'Video with given id must be in DB');
        $this->assertModelData($video, $createdVideo);
    }

    /**
     * @test read
     */
    public function test_read_video()
    {
        $video = factory(Video::class)->create();

        $dbVideo = $this->videoRepo->find($video->id);

        $dbVideo = $dbVideo->toArray();
        $this->assertModelData($video->toArray(), $dbVideo);
    }

    /**
     * @test update
     */
    public function test_update_video()
    {
        $video = factory(Video::class)->create();
        $fakeVideo = factory(Video::class)->make()->toArray();

        $updatedVideo = $this->videoRepo->update($fakeVideo, $video->id);

        $this->assertModelData($fakeVideo, $updatedVideo->toArray());
        $dbVideo = $this->videoRepo->find($video->id);
        $this->assertModelData($fakeVideo, $dbVideo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_video()
    {
        $video = factory(Video::class)->create();

        $resp = $this->videoRepo->delete($video->id);

        $this->assertTrue($resp);
        $this->assertNull(Video::find($video->id), 'Video should not exist in DB');
    }
}
