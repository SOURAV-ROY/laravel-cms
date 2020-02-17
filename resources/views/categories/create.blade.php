@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">Creating Category</div>
        <div class="card-body">

            {{--****************************************ERROR MESSAGE****************************************--}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--************************************* END ERROR MESSAGE****************************************--}}

            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" id="name" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button class=" btn btn-success">Add Category</button>
                </div>

            </form>
        </div>
    </div>

@endsection
