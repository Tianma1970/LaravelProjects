@extends('layouts/app')

@section('content')

<div class="container mt-3">
    <h1>{{ $project->title }}</h1>
    <p> {{ $project->description }}</p>

    <ol>
        @foreach( $todos as $todo )
            <li>{{ $todo->title }}</li>
        @endforeach
    </ol>

    <a href="/projects">&laquo; Tillbaka till alla projekt</a>

</div>

@endsection
