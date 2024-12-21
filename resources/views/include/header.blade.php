<div class="header bg-white">
    <div class="container">
        <nav style="background-color: white !important; " class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}"><img style=" width: 130px;" src="{{asset('/assets/images/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav m-auto me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('home')) active  @endif" aria-current="page" href="{{route('home')}}">Anasayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#about">Hakkımızda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#contact">İletişim</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('contract')) active  @endif" href="{{route('contract')}}">Sözleşme Oluştur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('project')) active  @endif" href="{{route('project')}}">Proje Oluştur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('private')) active  @endif" href="{{route('private')}}">Danışmana Sor</a>
                        </li>
                        @endauth
                    </ul>
                    <ul class="navbar nav text-secondary">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-secondary @if(request()->routeIs('login')) text-black  @endif" href="{{ route('login') }}">Giriş Yap</a>
                        </li>
                        /
                        <li class="nav-item">
                            <a class="nav-link text-secondary @if(request()->routeIs('register')) text-black  @endif" href="{{ route('register') }}">Kayıt Ol</a>
                        </li>
                        @endguest
                        
                        @auth
                        <!-- Giriş yapmış kullanıcılar için -->
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>