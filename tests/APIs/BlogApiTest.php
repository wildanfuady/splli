<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Blog;

class BlogApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_blog()
    {
        $blog = factory(Blog::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/blogs', $blog
        );

        $this->assertApiResponse($blog);
    }

    /**
     * @test
     */
    public function test_read_blog()
    {
        $blog = factory(Blog::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/blogs/'.$blog->id
        );

        $this->assertApiResponse($blog->toArray());
    }

    /**
     * @test
     */
    public function test_update_blog()
    {
        $blog = factory(Blog::class)->create();
        $editedBlog = factory(Blog::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/blogs/'.$blog->id,
            $editedBlog
        );

        $this->assertApiResponse($editedBlog);
    }

    /**
     * @test
     */
    public function test_delete_blog()
    {
        $blog = factory(Blog::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/blogs/'.$blog->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/blogs/'.$blog->id
        );

        $this->response->assertStatus(404);
    }
}
