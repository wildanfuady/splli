<?php namespace Tests\Repositories;

use App\Models\Seminar_favorite;
use App\Repositories\Seminar_favoriteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Seminar_favoriteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Seminar_favoriteRepository
     */
    protected $seminarFavoriteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->seminarFavoriteRepo = \App::make(Seminar_favoriteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->make()->toArray();

        $createdSeminar_favorite = $this->seminarFavoriteRepo->create($seminarFavorite);

        $createdSeminar_favorite = $createdSeminar_favorite->toArray();
        $this->assertArrayHasKey('id', $createdSeminar_favorite);
        $this->assertNotNull($createdSeminar_favorite['id'], 'Created Seminar_favorite must have id specified');
        $this->assertNotNull(Seminar_favorite::find($createdSeminar_favorite['id']), 'Seminar_favorite with given id must be in DB');
        $this->assertModelData($seminarFavorite, $createdSeminar_favorite);
    }

    /**
     * @test read
     */
    public function test_read_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->create();

        $dbSeminar_favorite = $this->seminarFavoriteRepo->find($seminarFavorite->id);

        $dbSeminar_favorite = $dbSeminar_favorite->toArray();
        $this->assertModelData($seminarFavorite->toArray(), $dbSeminar_favorite);
    }

    /**
     * @test update
     */
    public function test_update_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->create();
        $fakeSeminar_favorite = factory(Seminar_favorite::class)->make()->toArray();

        $updatedSeminar_favorite = $this->seminarFavoriteRepo->update($fakeSeminar_favorite, $seminarFavorite->id);

        $this->assertModelData($fakeSeminar_favorite, $updatedSeminar_favorite->toArray());
        $dbSeminar_favorite = $this->seminarFavoriteRepo->find($seminarFavorite->id);
        $this->assertModelData($fakeSeminar_favorite, $dbSeminar_favorite->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_seminar_favorite()
    {
        $seminarFavorite = factory(Seminar_favorite::class)->create();

        $resp = $this->seminarFavoriteRepo->delete($seminarFavorite->id);

        $this->assertTrue($resp);
        $this->assertNull(Seminar_favorite::find($seminarFavorite->id), 'Seminar_favorite should not exist in DB');
    }
}
