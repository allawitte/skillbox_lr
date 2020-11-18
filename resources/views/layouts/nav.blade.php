<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid">
        @if(Auth::user())
            <a class="navbar-brand" href="index.html">{{Auth::user()->name}}</a>
        @endif
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{url()->current() == url('/') ? 'active' : ''}}" href="{{url('/')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{url()->current() == url('/posts') ? 'active' : ''}}"
                       href="{{route('posts.index')}}">Статьи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/contacts')}}">Контакты</a>
                </li>
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.create')}}">Добавить статью</a>
                    </li>
                    @if(auth()->id() ==1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('feedbacks')}}">Админ. Раздел</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
        <div class="navbar-collaps">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="post" class="mb-0">
                            @csrf
                            <button class="btn btn-link" style="color: #fff;"><i
                                        class="fa fa-btn fa-sign-out nav-item"></i>Logout
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>