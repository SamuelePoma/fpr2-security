<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_a_course_is_created()
    {
        // Arrange
        $route = route('courses.store');
        $requestBody = [
            'name' => 'Computer Science Awesomes',
            'term' => 1,
            'credits' => 5
        ];

        // Act
        $response = $this->post($route,$requestBody);

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseCount('courses', 1);
        $this->assertDatabaseHas('courses', [
            'name' => 'Computer Science Awesomes'
        ]);
    }

    function test_that_error_occurs_with_incorrect_term() {
        // Arrange
        $route = route('courses.store');
        $requestBody = [
            'name' => 'Computer Science Awesomes',
            'term' => -1,
            'credits' => 5
        ];

        // Act
        $response = $this->post($route,$requestBody);

        // Then
        $response->assertSessionHasErrors(['term']);
        $this->assertDatabaseCount('courses', 0);
    }

}
