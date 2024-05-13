<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    Name: <input type="text" name="name" id="name"><br/>
    Term: <input type="text" name="term" id="term"><br/>
    Credits: <input type="text" name="credits" id="credits"><br/>
    <button type="submit">Submit</button>
</form>
