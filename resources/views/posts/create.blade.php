@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <h4 class="card-header font-weight-bold text-center">
            {{--            {{isset($category)? 'Edit Category': 'Create Category'}}--}}
            Create Post
        </h4>
        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">

                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="5" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" cols="3" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="date" name="published_at" id="published_at" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">

                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Create Post</button>
                </div>

            </form>
        </div>
    </div>
@endsection
