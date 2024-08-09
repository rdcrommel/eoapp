<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
        @stack('stylesheets')
        @livewireStyles
        <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>
        <title>{{ $title ?? 'Page Title' }}</title>
        <style>
            @import url('https://rsms.me/inter/inter.css');
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }
            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
          </style>
    </head>
    <body>
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page">
        @include('components.layouts.aside')
        @include('components.layouts.header')
           @yield('content')
        @include('components.layouts.footer')
    </div>
    <script src="{{asset('dist/libs/apexcharts/dist/apexcharts.min.js')}}" defer></script>
    <script src="{{asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js')}}" defer></script>
    <script src="{{asset('dist/libs/jsvectormap/dist/maps/world.js')}}" defer></script>
    <script src="{{asset('dist/libs/jsvectormap/dist/maps/world-merc.js')}}" defer></script>
    <!-- Tabler Core -->
    <script src="{{asset('dist/js/tabler.min.js')}}" defer></script>
    @stack('scripts')
    @livewireScripts
    <script src="{{asset('dist/js/demo.min.js')}}" defer></script>
    </body>
</html>
