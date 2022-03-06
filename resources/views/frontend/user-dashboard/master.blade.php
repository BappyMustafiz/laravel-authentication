<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link href="{{asset('assets/dist/n/static/css/main.32f3c5fc.chunk.css')}}" rel="stylesheet">
      @yield('styles')
   </head>
   <body data-new-gr-c-s-check-loaded="14.1050.0" data-gr-ext-installed="">
      <div id="root">
         <div class="wrapper">
            @include('frontend.user-dashboard.partials.navbar')
            <main class="layout withsidebar">
               @include('frontend.user-dashboard.partials.sidebar')
               <div class="fluid overlay-y pb12">
                  @yield('dashboard-content')
               </div>
            </main>
         </div>
      </div>
      <script src="{{ asset('assets/libs/jquery/3.5.1/jquery.min.js') }}"></script>
      <script>
         $(document).ready(function(){
            $(document).on('click','.dropdown',function(){
               $(this).toggleClass("open");
            })
            $(document).on('click','.mobile',function(){
               $(this).toggleClass("open");
            })
         })
      </script>
      @yield('scripts')
   </body>
</html>