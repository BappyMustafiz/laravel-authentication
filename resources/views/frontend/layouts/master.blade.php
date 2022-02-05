<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      @include('frontend.layouts.partials.styles')
      @yield('styles')
   </head>
   <body>
      @include('frontend.layouts.partials.navbar')
      @yield('main-content')
      @include('frontend.layouts.partials.footer')
      @include('frontend.layouts.partials.scripts')
      @yield('scripts')
   </body>
</html>