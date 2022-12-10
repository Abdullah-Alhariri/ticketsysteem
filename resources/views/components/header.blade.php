<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
    </svg>
    <span class="fs-4">Simple header</span>
</a>

<ul class="nav nav-pills">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
           aria-current="page">
            Home
        </a>
    </li>
    <a href="{{ route('events') }}" class="nav-link {{ Route::currentRouteName() == 'events' ? 'active' : '' }}"
       aria-current="page">
        Events
    </a>
    @guest
        <li class="nav-item">
            <a href="{{ route('login') }}"
               class="nav-link {{ Route::currentRouteName() == 'login' ? 'active' : '' }}">
                Login
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('register') }}"
               class="nav-link {{ Route::currentRouteName() == 'register' ? 'active' : '' }}">
                Register
            </a>
        </li>
    @else
        <li class="nav-item">
            <a href="{{ route('tickets') }}"
               class="nav-link {{ Route::currentRouteName() == 'tickets' ? 'active' : '' }}">
                Mijn tickets
            </a>
        </li>

        @if(Auth::user()->hasRole('ROLE_ADMIN'))
            <li class="nav-item">
                <a href="{{ route('admin') }}"
                   class="nav-link {{ Route::currentRouteName() == 'admin' ? 'active' : '' }}">
                    Admin
                </a>
            </li>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li class="nav-item">
                <x-dropdown-link :href="route('logout')"
                                 class="text-secondary"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Uitloggen') }}
                </x-dropdown-link>
            </li>
        </form>
    @endguest
</ul>
