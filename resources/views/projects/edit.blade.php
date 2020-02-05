@extends('layouts/app')

@section('content')
<div class="container mt-3">
        @include('partials/error')

    <h1>Edit: {{ $project->title }}</h1>

    <form method="POST" action="/projects/{{ $project->id }}">

        <!--vi måste sätte en token av säkerhetsskäl annars kan formuläret inte skickas-->
        @csrf <!--står för cross-site rquest forgery-->
        @method('PUT')
        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" name="title" class="form-control" placeholder="Project Title" required value="{{ old('title') ? old('title') : $project->title }}">
        </div>
        <div class="form-group">
            <label for="description">Project Description</label>
            <input type="text" name="description" class="form-control" placeholder="Project Description" required value="{{ old('description') ? old('description') : $project->description }}">
        </div>
        <div class="mt-3">
            <input  type="submit" value="Save" class="btn btn-secondary">
        </div>
    </form>

    <a href="/projects">&laquo; Back to all projects</a>

</div>

@endsection
