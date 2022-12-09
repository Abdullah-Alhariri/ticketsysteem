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
    {{-- public --}}
    <li class="nav-item"><a href="#" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Register</a></li>
    {{-- loggedIn --}}
{{--    <li class="nav-item"><a href="#" class="nav-link">Mijn tickets</a></li>--}}
{{--    <li class="nav-item"><a href="#" class="nav-link">Uitloggen</a></li>--}}
</ul>
