@extends('layouts.app')

@section('content')
<h1>My Courses</h1>
<ul>
    @foreach ($courses as $course)
    <p>{{ $courses->course_title }}</p>
    @endforeach
</ul>
@endsection