@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <h4 class="card-header text-center font-weight-bold">USERS</h4>

        <div class="card card-body">

            @if($users->count()>0)

                <table class="table table-bordered text-center">

                    <thead class="thead-light">
                    <tr>
                        <th>IMAGE</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>

                    <tbody class="text-center">

                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{--{{Gravatar::src($user->email)}}--}}
                                <img src="{{Gravatar::src($user->email)}}" height="50px" width="50px" style="border-radius: 30%">
                            </td>

                            <td class="align-middle">
                                {{$user->name}}
                            </td>

                            <td class="align-middle">
                                {{$user->email}}
                            </td>

                            <td class="align-middle">

                                @if(!$user->isAdmin())

                                    <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-success btn-sm">Make ADMIN</button>

                                    </form>

                                @endif
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            @else
                <h3 class="text-center">NO USER YET !!</h3>
            @endif
        </div>
    </div>
@endsection
