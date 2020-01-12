@extends('layouts/app')

@section('content')

<div class="container mt-3">

    <h1>Create a new Project</h1>

    <form method="POST" action="/projects">

        <!--vi måste sätte en token av säkerhetsskäl annars kan formuläret inte skickas-->
        @csrf <!--står för cross-site rquest forgery-->
        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" name="title" class="form-control" placeholder="Project Title">
        </div>
        <div class="form-group">
            <label for="description">Project Description</label>
            <input type="text" name="description" class="form-control" placeholder="Project Description">
        </div>
        <div class="mt-3">
            <input  type="submit" value="Create New Project" class="btn btn-primary">
        </form>
        </div>

    <a href="/projects">&laquo; Back to all projects</a>

</div>

@endsection
