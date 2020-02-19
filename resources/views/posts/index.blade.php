@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
    </div>

    <div class="card card-default">
        <h4 class="card-header text-center font-weight-bold">Posts</h4>

        <div class="card card-body">
            <table class="table table-bordered text-center">

                <thead class="thead-light">
                <tr>
                    <th>IMAGE</th>
                    <th>TITLE</th>
                </tr>
                </thead>

                <tbody class="text-center">
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="/storage/{{ $post->image }}" width="120px" height="60px" alt="Image">
                        </td>

                        <td>
                            {{$post->title}}
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
