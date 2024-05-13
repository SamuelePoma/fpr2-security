<form action="{{ route('assessments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
    Course: {{ $course->name }}<br/>
    Type: <input type="text" name="type" id="type"><br/>
    Grade: <input type="text" name="grade" id="grade"><br/>
    <button type="submit">Submit</button>
</form>
@if ($errors->any())
    <div>
        Errors:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
