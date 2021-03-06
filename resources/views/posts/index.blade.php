@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
    </div>

    <div class="card card-default">
        <h4 class="card-header text-center font-weight-bold">Posts</h4>

        <div class="card card-body">

            @if($posts->count()>0)

                <table class="table table-bordered text-center">

                    <thead class="thead-light">
                    <tr>
                        <th>IMAGE</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th colspan="2">ACTIONS</th>
                    </tr>
                    </thead>

                    <tbody class="text-center">

                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img src="/storage/{{ $post->image }}" width="120px" height="80px" alt="Imag">
                            </td>

                            <td class="align-middle">
                                {{$post->title}}
                            </td>

                            <td class="align-middle">

                                <a href="{{route('categories.edit', $post->category->id)}}">
                                    {{$post->category->name}}
                                </a>

                            </td>

                            @if($post->trashed())

                                <td class="align-middle">

                                    <form action="{{route('restore-posts', $post->id)}}" method="POST">

                                        @csrf
                                        @method('PUT')

                                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                    </form>
                                </td>

                            @else

                                <td class="align-middle">
                                    <a href="{{route('posts.edit', $post->id)}}"
                                       class="btn btn-secondary btn-sm">EDIT</a>
                                </td>

                            @endif

                            <td class="align-middle">

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{$post->trashed() ? "Delete": "Trash"}}
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>

            @else
                <h3 class="text-center">NO POST YET !!</h3>
            @endif
        </div>
    </div>
@endsection
