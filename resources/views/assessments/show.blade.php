Course ID: {{ $assessment->course_id }}<br/>
Course Name: {{ $assessment->course->name }}<br/>
Assessment Type: {{ $assessment->type }}<br/>
Grade: {{ $assessment->grade }}<br/>
<a href="{{ route("courses.show",$assessment->course_id) }}">Back to Course</a>
