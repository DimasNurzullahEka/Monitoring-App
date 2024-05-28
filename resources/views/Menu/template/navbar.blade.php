<ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
    <li class="nav-item dropdown">
        <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="caption ms-3 d-none d-md-block ">
                <h6 class="mb-0 caption-title">{{ $name }}</h6>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
            </li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('login') }}">Logout</a></li>
        </ul>
    </li>
</ul>
