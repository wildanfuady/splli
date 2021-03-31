<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Slide;

class SlideApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_slide()
    {
        $slide = factory(Slide::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/slides', $slide
        );

        $this->assertApiResponse($slide);
    }

    /**
     * @test
     */
    public function test_read_slide()
    {
        $slide = factory(Slide::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/slides/'.$slide->id
        );

        $this->assertApiResponse($slide->toArray());
    }

    /**
     * @test
     */
    public function test_update_slide()
    {
        $slide = factory(Slide::class)->create();
        $editedSlide = factory(Slide::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/slides/'.$slide->id,
            $editedSlide
        );

        $this->assertApiResponse($editedSlide);
    }

    /**
     * @test
     */
    public function test_delete_slide()
    {
        $slide = factory(Slide::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/slides/'.$slide->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/slides/'.$slide->id
        );

        $this->response->assertStatus(404);
    }
}
