admin
<a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<a class="dropdown-item" href="{{ route('register') }}" onclick="event.preventDefault(); document.getElementById('register-form').submit();">
    {{ __('Register') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>