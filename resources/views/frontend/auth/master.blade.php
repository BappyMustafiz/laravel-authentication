<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link href="{{asset('assets/dist/n/static/css/main.32f3c5fc.chunk.css')}}" rel="stylesheet">
      @yield('styles')
   </head>
   <body data-new-gr-c-s-check-loaded="14.1050.0" data-gr-ext-installed="">
      <div id="root">
         <div class="auth flex bind fluid-height">
            <div class="hidden@xs hidden@sm hidden@md">
               <div class="m6 absolute front">
                  <a class="textbutton" href="/">
                     <img class="img-fluid" src="{{asset('assets/public-site-v2/images/logo.svg')}}" alt="Overflow logo">
                  </a>
                  <div class="tagline">
                     <h2 class="">Communicate your designs like never before.</h2>
                  </div>
               </div>
               <div class="authpanel">
                  <img src="{{asset('assets/dist/n/static/media/illustration-auth.5abc21f6.svg')}}" alt=""></div>
            </div>
            <div class="bind flex flex-column ph4 fluid-height overlay-y">
               <div class="self-center max-width-408 pv12 mtauto mbauto fluid">
                   @yield('auth-content')
               </div>
            </div>
         </div>
      </div>
   </body>
</html>