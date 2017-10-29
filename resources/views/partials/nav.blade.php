<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar">
        <div class="uk-navbar-left">
            <!-- Branding Image -->
            <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">
                <img src="/images/logo.png" alt="Tecno Ink Lasser, Puebla"/>
            </a>

            <ul class="uk-navbar-nav admin">
                <!-- Pricing -->
                <li class="{{ str_contains(url()->current(), 'pricing') ? 'uk-active' : '' }}">
                    <a class="uk-flex uk-flex-middle" href="{{ url('/pricing') }}">
                        <span class="uk-vertical-align-middle">&period;</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a>

                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>