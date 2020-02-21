@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('tags.create')}}" class="btn btn-success float-right">Add Tag</a>
    </div>

    <div class="card card-default">
        <h4 class="card-header text-center font-weight-bold">Tags</h4>

        <div class="card-body">

            @if($tags->count()>0)

                <table class="table table-bordered text-center">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">Post Count</th>
                        <th colspan="2">ACTIONS</th>
                    </tr>
                    </thead>

                    <tbody class="text-center">

                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->name}}
                            </td>

                            <td>
                                0
                                {{--                                {{$tag->posts->count()}}--}}
                            </td>

                            <td>
                                <a href="{{route('tags.edit',$tag->id)}}"
                                   class="btn btn-secondary btn-sm">EDIT</a>
                            </td>

                            <td>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">DELETE
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            @else
                <h3 class="text-center">No Tags Yet!!</h3>
        @endif


        <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <form action="" method="POST" id="deleteTagForm">
                        @csrf
                        @method('DELETE')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center font-weight-bold">
                                    Are You Sure Delete Tag !!
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO GoBack</button>
                                <button type="submit" class="btn btn-danger">YES Delete</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function handleDelete(id) {
            let form = document.getElementById('deleteTagForm');
            form.action = '/tags/' + id;

            console.log('delete call', form);

            $('#deleteModal').modal('show')
        }
    </script>

@endsection
