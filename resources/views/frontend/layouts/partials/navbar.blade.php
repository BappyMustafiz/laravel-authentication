<header class="header_area fixed-top">
    <div class="header_top">
       <div class="header_top_dropdown">
         <ul>
            @auth
               <li>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Hi , <b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b> 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('customer-dashboard') }}">My Dashboard</a>
                        <a class="dropdown-item" href="{{ route('customer-dashboard') }}">Profile Settings</a>
                        <a class="dropdown-item" href="{{ route('queries.index') }}">Query</a>
                     </div>
                  </div>
               </li>
               <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      this.closest('form').submit();">Logout
                      </a>
                  </form>
              </li>
             @else
               <li>
                  <a href="{{ route('login') }}">Login</a>
               </li>
               @if (Route::has('register'))
                  <li>
                     <a href="{{ route('register') }}">Register</a>
                  </li>
               @endif
            @endauth
         </ul>
      </div>
    </div>
</header>