<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <main class="py-4">
                <div class="row">
                @if(Auth::check())
                <div class="col-lg-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home')}}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories')}}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags')}}">Tags</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('users')}}">Users</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('user.create')}}">New User</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('user.profile')}}">My Profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create')}}">Create a Tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts')}}">All posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.trashed')}}">All Trashed posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href='{{ route('category.create')}}'>Create new Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href='{{ route('post.create')}}'>Create new Post</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('settings')}}">Settings</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
                    <div class="col-md-9">
                        @yield('content')
                    </div>         
                </div>
            </main>
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script> 
    <script>
        @if (Session::has('success'))

            toastr.success("{{ Session::get('success')}}")
        @endif
        @if (Session::has('info'))

            toastr.info("{{ Session::get('info')}}")
        @endif
    </script>   
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>      --}}
    @yield('scripts')
</body>
</html>
