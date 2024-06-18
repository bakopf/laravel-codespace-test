<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontpage') }}">
            <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top">
            My Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('frontpage') }}">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <label for="navbarDropdown" class="nav-link">
                            {{ Auth::user()->name }}
                        </label>
                        <input type="checkbox" id="navbarDropdown" class="dropdown-checkbox">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item-text">
                                <p class="mb-1">{{ Auth::user()->email }}</p>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li><a href="{{ route('profile') }}" class="btn btn-link">My Profile</a></li>
                            <li><a class="btn btn-link {{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts</a></li>
                            <li><a class="btn btn-link" href="{{ route('contact-entries.index') }}">Contact Entries</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>