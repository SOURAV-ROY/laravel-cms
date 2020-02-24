<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS — Blog with sidebar</title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="/">
                <img class="logo-dark" src="{{asset('img/logo-dark.png')}}" alt="logo">
                <img class="logo-light" src="{{asset('img/logo-light.png')}}" alt="logo">
            </a>
        </div>

        <a class="btn btn-xs btn-round btn-info"
           href="{{route('login')}}">Log In</a>

    </div>
</nav><!-- /.navbar -->


<!-- Header -->
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
</header><!-- /.header -->


<!-- Main Content -->
<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">


                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">

                        @foreach($posts as $post)

                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="#">
                                        <img class="card-img-top" src="/storage/{{$post->image}}" alt="Card image cap">
                                    </a>
                                    <div class="p-6 text-center">
                                        <p>
                                            <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                                                {{$post->category->name}}
                                            </a>
                                        </p>
                                        <h5 class="mb-0"><a class="text-dark" href="#">{{$post->title}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>


                    <nav class="flexbox mt-30">
                        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                        <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
                    </nav>
                </div>


                <div class="col-md-4 col-xl-3">
                    <div class="sidebar px-4 py-md-0">

                        <h6 class="sidebar-title">Search</h6>
                        <form class="input-group" target="#" method="GET">
                            <input type="text" class="form-control" name="s" placeholder="Search">
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

                        <hr>

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


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="/"><img src="{{asset('img/logo-dark.png')}}" alt="logo"></a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i
                            class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                    <a class="nav-link" href="../uikit/index.html">Elements</a>
                    <a class="nav-link" href="../block/index.html">Blocks</a>
                    <a class="nav-link" href="../page/about-1.html">About</a>
                    <a class="nav-link" href="../blog/grid.html">Blog</a>
                    <a class="nav-link" href="../page/contact-1.html">Contact</a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
