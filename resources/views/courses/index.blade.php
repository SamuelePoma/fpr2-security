<h1>Your Courses</h1>
@foreach($courses as $course)
    <div>
        Course Name: {{ $course->name }}<br/>
        Average Grade: {{ $course->average() }}<br/>
        Passed: {{ $course->isPassed() ? "Yes" : "No"; }}<br/>
        <a href='{{ route('courses.show', $course) }}'>Go to course</a><br/>
        <br/>
    </div>
@endforeach
<a href="{{ route("courses.create") }}">Add new course</a>
