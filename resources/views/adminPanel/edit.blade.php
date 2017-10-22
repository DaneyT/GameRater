@extends('layouts.template')

@section('title', 'Edit Post #' . $post[0] -> id)

@section('content')
    <h1>Edit Post # {{ $post[0]-> id }}</h1>
    <div class="col-sm-8 col-sm-offset-2">
        <form action=" {{route('posts.update', ['id'=> $post[0]->id])}}" method="post">

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="title">Title:</label>
                <input name="title" type="text" class="form-control" value="{{ $post[0] -> title }} ">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"> {{ $post[0] -> body }}</textarea>
            </div>




            <input type="hidden" name="editForm" value="editForm">
            <input type="hidden" name="id" value="{{ $post[0]->id }}">

            <div class="form-group">
                <label for="labelGenre">Post label:</label>
                <select name="labelGenre">
                    <option value="news">News</option>
                    <option value="rpg">RPG</option>
                    <option value="strategy">Strategy</option>
                    <option value="firstpersonshooter">FPS</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go back</a>
        </form>
    </div>

@endsection