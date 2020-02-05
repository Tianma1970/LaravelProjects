@extends('layouts/app')

@section('content')

<div class="container mt-3">
    @include('partials/status');
    <h1>All Projects</h1>

    <ol>
    @foreach($projects as $project)
        <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a>

        </li>
    @endforeach
    </ol>
    <a href="/projects/create">Create a New Project</a>
</div>

@endsection
