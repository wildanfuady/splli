<?php namespace Tests\Repositories;

use App\Models\Seminar_feedback;
use App\Repositories\Seminar_feedbackRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Seminar_feedbackRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Seminar_feedbackRepository
     */
    protected $seminarFeedbackRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->seminarFeedbackRepo = \App::make(Seminar_feedbackRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->make()->toArray();

        $createdSeminar_feedback = $this->seminarFeedbackRepo->create($seminarFeedback);

        $createdSeminar_feedback = $createdSeminar_feedback->toArray();
        $this->assertArrayHasKey('id', $createdSeminar_feedback);
        $this->assertNotNull($createdSeminar_feedback['id'], 'Created Seminar_feedback must have id specified');
        $this->assertNotNull(Seminar_feedback::find($createdSeminar_feedback['id']), 'Seminar_feedback with given id must be in DB');
        $this->assertModelData($seminarFeedback, $createdSeminar_feedback);
    }

    /**
     * @test read
     */
    public function test_read_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->create();

        $dbSeminar_feedback = $this->seminarFeedbackRepo->find($seminarFeedback->id);

        $dbSeminar_feedback = $dbSeminar_feedback->toArray();
        $this->assertModelData($seminarFeedback->toArray(), $dbSeminar_feedback);
    }

    /**
     * @test update
     */
    public function test_update_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->create();
        $fakeSeminar_feedback = factory(Seminar_feedback::class)->make()->toArray();

        $updatedSeminar_feedback = $this->seminarFeedbackRepo->update($fakeSeminar_feedback, $seminarFeedback->id);

        $this->assertModelData($fakeSeminar_feedback, $updatedSeminar_feedback->toArray());
        $dbSeminar_feedback = $this->seminarFeedbackRepo->find($seminarFeedback->id);
        $this->assertModelData($fakeSeminar_feedback, $dbSeminar_feedback->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_seminar_feedback()
    {
        $seminarFeedback = factory(Seminar_feedback::class)->create();

        $resp = $this->seminarFeedbackRepo->delete($seminarFeedback->id);

        $this->assertTrue($resp);
        $this->assertNull(Seminar_feedback::find($seminarFeedback->id), 'Seminar_feedback should not exist in DB');
    }
}
