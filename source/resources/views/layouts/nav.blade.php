<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if(!Auth::guest())
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home/')}}" href="{{ url('/home') }}">
                        {{ __('content.nav.home') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('upload/')}}" href="{{ url('/upload') }}">
                        {{ __('content.nav.upload_file') }}
                    </a>
                </li>
            </ul>
        @endif

        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown" title="{{__('content.nav.language_switch')}}">
                    <a class="nav-link dropdown-toggle" id="navbarLocaleSelect" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ App::getLocale() }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarLocaleSelect">
                        @foreach(array_diff(Config::get('app.supported_locales'), [App::getLocale()]) as $l)
                            <a class="dropdown-item"
                               href="{{ route('locale.select', ['locale' => $l]) }}">{{ $l }}</a>
                        @endforeach
                    </div>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
