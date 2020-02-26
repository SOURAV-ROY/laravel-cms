@extends('layouts.blog')

@section('title')
    TAG || {{$tag->name}}
@endsection

@section('header')
    <header class="header text-center text-primary"
            style="background-image: linear-gradient(-225deg, #b556ff 0%, #b5f0ff 48%, #11ac6c 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>{{$tag->name}}</h1>
                    <p class="lead-2 opacity-90 text-danger mt-6">Read and get updated on how we progress</p>

                </div>
            </div>

        </div>
    </header>
@endsection

@section('content')
    <main class="main-content">
        <div class="section bg-gray">
            <div class="container">
                <div class="row">


                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">

                            @forelse($posts as $post)

                                <div class="col-md-6">
                                    <div class="card border hover-shadow-6 mb-6 d-block">
                                        <a href="{{route('blog.show', $post->id)}}">
                                            <img class="card-img-top img-fluid" src="/storage/{{$post->image}}"
                                                 style="max-height: 250px"
                                                 alt="Card image cap"
                                            >
                                        </a>
                                        <div class="p-6 text-center">
                                            <p>
                                                <a class="small-5 text-lighter text-uppercase ls-2 fw-400"
                                                   href="#">
                                                    {{$post->category->name}}
                                                </a>
                                            </p>
                                            <h5 class="mb-0">
                                                <a class="text-dark" href="{{route('blog.show', $post->id)}}">
                                                    {{$post->title}}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                            @empty

                                <h2 class="text-center text-info">
                                    No Result Found For Query 😎 😛
                                    <h1 class="font-weight-bold text-danger">
                                        <strong>{{request()->query('search')}}</strong>
                                    </h1>
                                </h2>

                            @endforelse

                        </div>

                        {{$posts->appends(['search'=> request()->query('search')])->links()}}


                    </div>


                    @include('partials.sidebar')

                </div>
            </div>
        </div>
    </main>
@endsection
