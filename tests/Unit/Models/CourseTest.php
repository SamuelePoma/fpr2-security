<?php

namespace Models;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_that_zero_is_returned_for_empty_course() {
        // Create a new empty course
        $course = Course::factory()->create();

        // Test
        $this->assertEquals(0,$course->average());
    }

    public function test_that_average_for_a_course_calculates_correctly()
    {
        $course = Course::factory()->create();
        $course->assessments()->create(['type'=>'o',
            'grade'=>10]);

        $this->assertEquals(10,$course->average());

        $course->assessments()->create(['type'=>'o',
            'grade'=>5]);

        $this->assertEquals(7.5, $course->average());
    }

    public function test_that_course_passes_with_high_average() {
        $course = Course::factory()->create();
        $course->assessments()->create(['type'=>'o',
            'grade'=>10]);
        $course->assessments()->create(['type'=>'o',
            'grade'=>7]);

        $this->assertTrue($course->isPassed());
    }

//    public function test_that_course_fails() {
//        $course = Course::factory()->create();
//        $course->assessments()->create(['type'=>'o',
//            'grade'=>10]);
//        $course->assessments()->create(['type'=>'o',
//            'grade'=>5]);
//
//        //$this->assertFalse($course->isPassed());
//    }
}
