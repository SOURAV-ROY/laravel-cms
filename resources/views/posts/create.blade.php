@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <h4 class="card-header font-weight-bold text-center">

            {{isset($post)? 'Edit Post': 'Create Post'}}

        </h4>
        <div class="card-body">
            {{--************************* Any Errors Catch Here *************************** --}}
            @include('partials.errors')

            <form
                action="{{isset($post)? route('posts.update',$post->id):  route('posts.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif


                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{isset($post)? $post->title: ""}}">

                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="4" rows="4">
                        {{isset($post)? $post->description : ""}}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="subtitle">Content</label>
                    {{--<textarea name="subtitle" id="subtitle" class="form-control" cols="2" rows="2"></textarea>--}}

                    <input id="subtitle" type="hidden" name="subtitle" value="{{isset($post)? $post->subtitle : ""}}">
                    <trix-editor input="subtitle"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" name="published_at" id="published_at" class="form-control"
                           value="{{isset($post)? $post->published_at : ""}}"
                    >
                </div>
                @if(isset($post))
                    <div class="form-group ">
                        <img src="/storage/{{($post->image)}}" width="100%">
                    </div>
                @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>

                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)

                            <option
                                value="{{$category->id}}"

                                @if(isset($post))
                                @if($category->id === $post->category_id)
                                selected
                                @endif
                                @endif
                            >

                                {{$category->name}}

                            </option>

                        @endforeach
                    </select>
                </div>

                @if($tags->count() > 0)
                    <div class="form-group">
                        <label for="tags">Tags</label>

                        <select name="tags[]" id="tags" class="form-control tag-selector" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"

                                        @if(isset($post))
                                        @if($post->hasTag($tag->id))
                                        selected
                                    @endif
                                    @endif
                                >
                                    {{$tag->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">
                        {{isset($post)? 'Update Post' : 'Create Post'}}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        flatpickr('#published_at',
            {
                enableTime: true
            })

        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.tag-selector').select2();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
