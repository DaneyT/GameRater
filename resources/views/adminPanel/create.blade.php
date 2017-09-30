@extends('layouts.template')

@section('title', 'Add new Post')

@section('content')
    <h1>Add new post</h1>
    <div class="col-sm-8 col-sm-offset-2">
        <form action=" {{route('posts.store')}}" method="post">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input name="title" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go back</a>
        </form>
    </div>

@endsection