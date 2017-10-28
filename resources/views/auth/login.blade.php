@extends("layouts.app")
@section('page-title')
    @parent
    - Login
@stop

@section('main-panel-content')
    <form class="uk-form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        @section('title')
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <h4 class="uk-card-title uk-margin-remove">Iniciar Sesión</h4>
            </div>
        @stop
        @section('main-panel-content')
            <div class="uk-margin{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="uk-form-label">E-Mail Address</label>

                <div class="uk-form-controls">
                    <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                    @endif
                </div>
            </div>

            <div class="uk-margin{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="uk-form-label">Password</label>

                <div class="uk-form-controls">
                    <input id="password" type="password" class="uk-input" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                    @endif
                </div>
            </div>

            <div class="fuk-margin">
                <div class="uk-uk-inputs col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>
        @stop
        @section('main-panel-footer')
            <button type="submit" class="uk-button uk-button-primary uk-button-small">
                Login
            </button>
            <a class="uk-button uk-button-link uk-button-small" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        @stop

        @section('main-panel-after')
    </form>
@endsection