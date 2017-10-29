<ul class="uk-nav uk-nav-default">

    <li class="{{ str_contains(url()->current(), 'selling') ? 'uk-active' : '' }}">
        <a href="{{url('/selling')}}" class="uk-flex uk-flex-middle">
            <icon name="clock" :scale="100" class="uk-visible@m  uk-icon">
                <svg version="1.1" role="presentation" width="17.857142857142858" height="17.857142857142858"
                     viewBox="0 0 20 20" class="uk-visible@m  uk-icon svg-icon active"
                     style="font-size: 100em;">
                    <path d="M1 10a9 9 0 1 0 18 0a9 9 0 1 0 -18 0z" fill="none" stroke="#000"></path>
                    <path d="M9 4h1v7h-1z" fill="transparent" stroke="transparent"></path>
                    <path d="M13.018,14.197 L9.445,10.625" fill="none" stroke="#000"></path>
                </svg>
            </icon>
            <span class="uk-vertical-align-middle">Ventas</span>
        </a>
    </li>

    <li class="{{ str_contains(url()->current(), 'products') ? 'uk-active' : '' }}">
        <a href="{{route('products.all')}}" class="uk-flex uk-flex-middle">
            <icon name="clock" :scale="100" class="uk-visible@m uk-icon">
                <svg version="1.1" role="presentation" width="17.857142857142858" height="17.857142857142858"
                     viewBox="0 0 20 20" class="uk-visible@m  uk-icon svg-icon active"
                     style="font-size: 100em;">
                    <path d="M1 10a9 9 0 1 0 18 0a9 9 0 1 0 -18 0z" fill="none" stroke="#000"></path>
                    <path d="M9 4h1v7h-1z" fill="transparent" stroke="transparent"></path>
                    <path d="M13.018,14.197 L9.445,10.625" fill="none" stroke="#000"></path>
                </svg>
            </icon>
            <span class="uk-vertical-align-middle">Productos</span>
        </a>
    </li>

    <li class="{{ str_contains(url()->current(), 'users') ? 'uk-active' : '' }}">
        <a href="{{route('users.all')}}" class="uk-flex uk-flex-middle">
            <icon name="clock" :scale="100" class="uk-visible@m uk-icon">
                <svg version="1.1" role="presentation" width="17.857142857142858" height="17.857142857142858"
                     viewBox="0 0 20 20" class="uk-visible@m uk-icon svg-icon active"
                     style="font-size: 100em;">
                    <path d="M1 10a9 9 0 1 0 18 0a9 9 0 1 0 -18 0z" fill="none" stroke="#000"></path>
                    <path d="M9 4h1v7h-1z" fill="transparent" stroke="transparent"></path>
                    <path d="M13.018,14.197 L9.445,10.625" fill="none" stroke="#000"></path>
                </svg>
            </icon>
            <span class="uk-vertical-align-middle">Usuarios</span>
        </a>
    </li>

    <li>
        <div class="uk-margin-top">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </li>

</ul>
