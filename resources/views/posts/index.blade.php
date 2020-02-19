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
                    <th colspan="2">ACTIONS</th>
                </tr>
                </thead>

                <tbody class="text-center">
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="/storage/{{ $post->image }}" width="120px" height="60px" alt="Imag">
                        </td>

                        <td class="align-middle">
                            {{$post->title}}
                        </td>

                        <td class="align-middle">
                            <a href="#" class="btn btn-info btn-sm">EDIT</a>
                        </td>

                        <td class="align-middle">
                            <a href="#" class="btn btn-danger btn-sm">TRASH</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
