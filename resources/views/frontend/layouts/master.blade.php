<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <title>{{ config('app.name', 'Laravel') }}</title>
      @include('frontend.layouts.partials.metas')
      @include('frontend.layouts.partials.styles')
      @yield('styles')
   </head>
   <body class="home-page" tabindex="0">
      @include('frontend.layouts.partials.navbar')
      <div class="wrapper" id="wrapper" data-scroller>
         <div class="page-holder">
            <main class="main" id="content" role="main">
               @yield('main-content')
            </main>
         </div>
         @include('frontend.layouts.partials.footer')
      </div>
      @include('frontend.layouts.partials.scripts')
      @yield('scripts')
   </body>
</html>