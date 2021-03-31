<?php namespace Tests\Repositories;

use App\Models\Slide;
use App\Repositories\SlideRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SlideRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SlideRepository
     */
    protected $slideRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->slideRepo = \App::make(SlideRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_slide()
    {
        $slide = factory(Slide::class)->make()->toArray();

        $createdSlide = $this->slideRepo->create($slide);

        $createdSlide = $createdSlide->toArray();
        $this->assertArrayHasKey('id', $createdSlide);
        $this->assertNotNull($createdSlide['id'], 'Created Slide must have id specified');
        $this->assertNotNull(Slide::find($createdSlide['id']), 'Slide with given id must be in DB');
        $this->assertModelData($slide, $createdSlide);
    }

    /**
     * @test read
     */
    public function test_read_slide()
    {
        $slide = factory(Slide::class)->create();

        $dbSlide = $this->slideRepo->find($slide->id);

        $dbSlide = $dbSlide->toArray();
        $this->assertModelData($slide->toArray(), $dbSlide);
    }

    /**
     * @test update
     */
    public function test_update_slide()
    {
        $slide = factory(Slide::class)->create();
        $fakeSlide = factory(Slide::class)->make()->toArray();

        $updatedSlide = $this->slideRepo->update($fakeSlide, $slide->id);

        $this->assertModelData($fakeSlide, $updatedSlide->toArray());
        $dbSlide = $this->slideRepo->find($slide->id);
        $this->assertModelData($fakeSlide, $dbSlide->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_slide()
    {
        $slide = factory(Slide::class)->create();

        $resp = $this->slideRepo->delete($slide->id);

        $this->assertTrue($resp);
        $this->assertNull(Slide::find($slide->id), 'Slide should not exist in DB');
    }
}
