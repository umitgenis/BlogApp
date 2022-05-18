<!-- NAVBAR START -->
<nav class="top-nav" id="home">
    <div class="container">
        <div class="row justify-content-between">
            @if (Route::has('login'))
                <div class="col-auto">
                    @auth
                        <a class="btn">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-brand" style="font-size: large;" type="submit">Logout</button>
                            </form>
                        </a>
                        <a href="{{url('profile',['id'=>Auth::user()->id])}}" class="btn btn-control me-2 ">
                            <i class='bx bx-user-check' style="font-size: x-large;"></i><span
                                style="font-size: medium;">{{ '@'. Auth::user()->name}}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-control me-2 ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-control ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="col-auto d-none d-xl-block">
                <div class="social-links mt-2">
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a href="{{url('/')}}" class="navbar-brand" ><span>[ </span>BLOG<span> ]</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Blog Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Lastest Post</a>
                </li>
                @auth()
                <li class="nav-item">
                    <a class="nav-link" href="{{url('profile',['id'=>Auth::user()->id])}}">My Post</a>
                </li>
                @endauth
            </ul>
            @auth()
                <a href="{{route('create')}}" class="btn btn-brand ms-lg-3" id="#x">
                    Create Post
                </a>
            @endauth
        </div>

    </div>

</nav>
<!-- NAVBAR END -->
