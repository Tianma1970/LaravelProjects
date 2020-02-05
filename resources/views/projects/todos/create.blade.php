@extends('layouts/app')

@section('content')

<div class="container mt-3">

    <h1>Create a new Todo </h1>

    <form method="POST" action="/projects/{{ $project->id }}/todos">


        <!--vi måste sätte en token av säkerhetsskäl annars kan formuläret inte skickas-->
        @csrf <!--står för cross-site rquest forgery-->
        <div class="form-group">
            <label for="title">Todo Title</label>
            <input type="text" name="title" class="form-control" placeholder="Todo Title">
        </div>
        <div class="form-group">
            <label for="description">Todo Description</label>
            <input type="text" name="description" class="form-control" placeholder="Todo Description">
        </div>
        <div class="mt-3">
            <input  type="submit" value="Create New Todo" class="btn btn-primary">
        </form>
        </div>

    <a href="/projects/{{ $project->id }}">&laquo; Back to all todos</a>

</div>

@endsection
