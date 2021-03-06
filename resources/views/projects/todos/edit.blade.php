@extends('layouts/app')

@section('content')

<div class="container mt-3">

    <h1>Edit {{ $todo->title }}</h1>

    @include('partials/error')
    @include('partials/status')

    <form method="POST" action="/projects/{{ $project->id }}/todos/{{ $todo->id }}">


        <!--vi måste sätte en token av säkerhetsskäl annars kan formuläret inte skickas-->
        @csrf <!--står för cross-site rquest forgery-->
        @method('PUT')
        <div class="form-group">
            <label for="title">Todo Title</label>
            <input type="text" name="title" class="form-control" placeholder="Todo Title" required value="{{ old('title') ? old('title') : $todo->title }}">
        </div>
        <div class="form-group">
            <label for="description">Todo Description</label>
            <input type="text" name="description" class="form-control" placeholder="Todo Description" required value="{{ old('description') ? old('description') : $todo->description }}">
        </div>
        <div class="mt-3">
            <input  type="submit" value="Edit Todo" class="btn btn-primary">
        </form>
        </div>

    <a href="/projects/{{ $project->id }}">&laquo; Back to all todos</a>

</div>

@endsection
