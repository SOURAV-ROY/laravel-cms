@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('categories.create')}}" class="btn btn-success float-right">Add Category</a>
    </div>

    <div class="card card-default">
        <h4 class="card-header text-center font-weight-bold">Categories</h4>

        <div class="card-body">

            @if($categories->count()>0)

                <table class="table table-bordered text-center">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">Post Count</th>
                        <th colspan="2">ACTIONS</th>
                    </tr>
                    </thead>

                    <tbody class="text-center">

                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>

                            <td>
                                {{$category->posts->count()}}
                            </td>

                            <td>
                                <a href="{{route('categories.edit',$category->id)}}"
                                   class="btn btn-secondary btn-sm">EDIT</a>
                            </td>

                            <td>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">DELETE
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            @else
                <h3 class="text-center">NO Categories Yet!!</h3>
        @endif


        <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <form action="" method="POST" id="deleteCategoryForm">
                        @csrf
                        @method('DELETE')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center font-weight-bold">
                                    Are You Sure Delete Category !!
                                </p>
                                {{--<h2>{{$category->name}}</h2>--}}

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
            let form = document.getElementById('deleteCategoryForm');
            form.action = '/categories/' + id;

            console.log('delete call', form);

            $('#deleteModal').modal('show')
        }
    </script>

@endsection
