@extends('layouts.blog')

@section('title')
    SOURAV BLOG
@endsection

@section('header')
    <header class="header text-center text-primary"
            style="background-image: linear-gradient(-225deg, #b556ff 0%, #b5f0ff 48%, #11ac6c 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>Latest Blog Posts</h1>
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

                            @foreach($posts as $post)

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
                            @endforeach

                        </div>

                        {{$posts->appends(['search'=> request()->query('search')])->links()}}


                    </div>


                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">

                            <h6 class="sidebar-title">Search</h6>

                            <form class="input-group" action="{{route('welcome')}}" method="GET">
                                <input type="text" class="form-control" name="search" placeholder="Search">
                                <div class="input-group-add on">
                                    <span class="input-group-text"><i class="ti-search"></i></span>
                                </div>
                            </form>

                            <hr>

                            <h6 class="sidebar-title">Categories</h6>
                            <div class="row link-color-default fs-14 lh-24">

                                @foreach($categories as $category)
                                    <div class="col-6">
                                        <a href="#">
                                            {{$category->name}}
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <hr>

                            {{--<h6 class="sidebar-title">Top posts</h6>
                            <a class="media text-default align-items-center mb-5" href="blog-single.html">
                                <img class="rounded w-65px mr-4" src="{{asset('img/thumb/4.jpg')}}">
                                <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                            </a>

                            <a class="media text-default align-items-center mb-5" href="blog-single.html">
                                <img class="rounded w-65px mr-4" src="{{asset('img/thumb/3.jpg')}}">
                                <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
                            </a>--}}


                            <h6 class="sidebar-title">Tags</h6>
                            <div class="gap-multiline-items-1">
                                @foreach($tags as $tag)
                                    <a class="badge badge-secondary" href="#">
                                        {{$tag->name}}
                                    </a>
                                @endforeach
                            </div>

                            <hr>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
