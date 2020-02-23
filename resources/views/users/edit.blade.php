@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>

                    <div class="card-body">

                        @include('partials.errors')

                        <form action="{{route('users.update-profile')}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">NAME</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="about">ABOUT ME</label>
                                <textarea name="about" id="about" rows="5" cols="5" class="form-control">
                                    {{$user->about}}
                                </textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
