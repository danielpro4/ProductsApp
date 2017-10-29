<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@include('partials.nav')

<main id="root" class="uk-container uk-container-expand">
    <div class="uk-grid">
        <aside class="uk-width-1-6@l uk-margin-top uk-margin-bottom">
            @include('partials.sidebar')
        </aside>
        <section class="uk-width-expand@m uk-margin-top">
            @include('partials.alerts')

            @yield('main-panel-before')

            <div class="uk-card uk-card-default">
                <div class="uk-card-header"> @yield('panel-header')</div>
                <div class="uk-card-body"> @yield('panel-content')</div>
                <div class="uk-card-footer"> @yield('panel-footer')</div>
            </div>

            @yield('main-panel-after')

            <div class="uk-margin-top">
                @include('partials.footer')
            </div>
        </section>
    </div>
</main>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
