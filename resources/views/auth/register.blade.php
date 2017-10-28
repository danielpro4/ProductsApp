@extends("layouts.app")
@section('page-title')
    @parent
    - Register
@stop

@section('main-panel-before')
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
@endsection
        @section('title')
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <h4 class="uk-card-title uk-margin-remove">Registrar Usuario</h4>
            </div>
        @stop

        @section('main-panel-content')
            <div class="uk-margin{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="uk-form-label">Name</label>

                <div class="uk-form-controls">
                    <input id="name" type="text" class="uk-input" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                    @endif
                </div>
            </div>

            <div class="uk-margin{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="uk-form-label">E-Mail Address</label>

                <div class="uk-form-controls">
                    <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required>

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

            <div class="uk-margin">
                <label for="password-confirm" class="uk-form-label">Confirm Password</label>

                <div class="uk-form-controls">
                    <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required>
                </div>
            </div>
        @endsection

        @section('main-panel-footer')
            <button type="submit" class="uk-button uk-button-primary uk-button-small">
                Registrar
            </button>
        @endsection

    @section('main-panel-after')
    </form>
@endsection

