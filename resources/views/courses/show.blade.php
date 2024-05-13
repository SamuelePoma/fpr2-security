Name: {{ $course->name }}<br/>
Term: {{ $course->term }}<br/>
Credits: {{ $course->credits }}<br/>

@foreach($course->assessments as $assessment)
    <div>
        <strong><a href="{{ route("assessments.show",$assessment) }}">Assessment</a></strong><br/>
        Assessment Type: {{ $assessment->type }}<br/>
        Grade: {{ $assessment->grade }}<br/>
        <br/>
    </div>
@endforeach
<a href="{{ route("assessments.create",['course_id' =>$course]) }}">Add new assessment</a><br/>
Average Grade {{ $course->average() }}
