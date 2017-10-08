@extends('layouts.template')

@section('title', 'Edit Post #' . $post[1] -> id)

@section('content')
    <h1>Edit Post # {{ $post[1]-> id }}</h1>
    <div class="col-sm-8 col-sm-offset-2">
        <form action=" {{route('posts.update', ['id'=> $post[1]->id])}}" method="post">

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="title">Title:</label>
                <input name="title" type="text" class="form-control" value="{{ $post[1] -> title }} ">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"> {{ $post[1] -> body }}</textarea>
            </div>


            <input type="hidden" name="editForm" value="editForm">
            <input type="hidden" name="id" value="{{ $post[1]->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go back</a>
        </form>
    </div>

@endsection