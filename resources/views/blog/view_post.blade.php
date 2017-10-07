@extends('layouts.viewPostTemplate')

@section('title', 'View Post #'. $post)

@section('content')
    <div class="row">
        <a href="http://localhost:8000/">Go back to Home</a>
         </div>

<h1>{{ $post }}</h1>
    {{--<p>{{ $post-> body }}</p>--}}
@endsection