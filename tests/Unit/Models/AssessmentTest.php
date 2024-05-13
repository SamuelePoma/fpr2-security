<?php

namespace Models;

use App\Models\Assessment;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssessmentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_that_assessment_passes_with_high_grade()
    {
        $course = Course::factory()->create();
        $passing_assessment = Assessment::factory()->for($course)->create(['grade' => 10]);

        $this->assertTrue($passing_assessment->isPassed());

        $passing_assessment = Assessment::factory()->for($course)->create(['grade' => 5.5]);
        $this->assertTrue($passing_assessment->isPassed());

    }

    public function test_that_assessment_fails_with_low_grade()
    {
        $course = Course::factory()->create();
        $failing_assessment = Assessment::factory()->for($course)->create(['grade' => 1]);

        $this->assertFalse($failing_assessment->isPassed());

        $failing_assessment = Assessment::factory()->for($course)->create(['grade' => 5.4]);
        $this->assertFalse($failing_assessment->isPassed());
    }
}
