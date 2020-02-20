@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <h4 class="card-header font-weight-bold text-center">
            {{--            {{isset($category)? 'Edit Category': 'Create Category'}}--}}
            Create Post
        </h4>
        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="subtitle">SubTitle</label>
{{--                    <textarea name="subtitle" id="subtitle" class="form-control" cols="2" rows="2"></textarea>--}}

                    <input id="subtitle" type="hidden" name="subtitle">
                    <trix-editor input="subtitle"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" name="published_at" id="published_at" class="form-control">
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
