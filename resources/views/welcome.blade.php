@extends('layouts/app')

@section('content')

    <div class="container mt-4">

        <h1 class="text-center"><i>Welcome</i></h1>
        <div class="row justify-content-md-center">
            <div class="jumbotron col-lg-4 text-center mt-5">
                <small>{{ $msg }}<br>
                {{-- <small><small>{{ $info }}</small></small> --}}
            </div>
        </div>
    </div><!--/container-->

@endsection
