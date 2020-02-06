@extends('layouts/app')

@section('content')

<div class="container mt-3">

    @include('partials/status')

    <div class="row">
        <div class="jumbotron col-5">
            <h1>{{ $project->title }}</h1>
            <p> {{ $project->description }}</p><br>
            <small><i>created at {{ $project->created_at }}</i></small>
            <ol>
                @foreach( $todos as $todo )
                    <li>{{ $todo->title }}<br>
                        {{ $todo->description }}
                        @if($todo->completed)
                            <br> Great job!👍
                        @else
                            <br>Complete me🧐
                        @endif
                        <form method="POST" action="/projects/{{ $project->id }}/todos/{{ $todo->id }}">
                            @csrf
                            @method('PUT')

                            <input type="checkbox" name="completed" value="1" onclick="this.form.submit();"
                                @if($todo->completed)
                                    checked
                                @endif
                            >&nbsp; checked
                        </form>
                        <form class="mt-3" method="POST" action="/projects/{{ $project->id }}/todos/{{ $todo->id }}">
                        @csrf
                         <input type="submit" value="Edit Todo" class="btn btn-info">
                        @method("DELETE")
                        <input type="submit" value="Delete Todo" class="btn btn-danger"><br><hr>
        </form>

                    </li>
                @endforeach
            </ol>

            <div class="d-flex">
                <a href="/projects/{{ $project->id }}/todos/create" class="btn btn-success">Add a new Todo</a>

            </div>
        </div>
    </div>
    <div>
        <a href="/projects">&laquo; Back to all Projects</a>
    </div>
    <div>
        <a href="/projects/{{ $project->id }}/edit" class="btn btn-warning mt-3">Edit Project</a>
        <form method="POST" action="/projects/{{ $project->id }}">
            @csrf
            @method("DELETE")
            <input type="submit" value="Delete Project" class="btn btn-danger mt-3">
        </form>
    </div>
    <div>
    </div>

</div>

@endsection
