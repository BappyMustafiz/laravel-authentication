<nav class="white100@bg hascenter">
    <div class="left">
       <div class="left bottom max-width-95percent dropdown">
          <div class="toggle">
             <div class="flex flex-center align-center fluid" onclick="location.href='{{ route('home') }}'">
                {{-- <div class="covericon empty size-32" title="Avatar of padaf's Organization" role="img" style="background-image: url(&quot;&quot;); width: 32px; height: 32px;">p</div> --}}
                <div class="max-width-95percent">
                   <div class="flex ml3 flex-center">
                     @if(isset($site_logo) && $site_logo != '')
                        <a class="header-logo" tabindex="0" href="/">
                           <img src="{{ $site_logo }}" height="27px" width="158px" alt="Training logo">
                        </a>
                     @endif
                      {{-- <h5 title="padaf's Organization" class="fit-width">Training</h5> --}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="right">
       <div class="list horizontal gutter-m">
          <div class="item">
             <div class="right bottom dropdown">
               <div class="user flex flex-center">
                  <div class="avatar" style="width: 24px; height: 24px;">
                     <div class="illustration default">
                        <svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
                           <g fill="none" fill-rule="evenodd">
                              <circle fill="#FFF" cx="22" cy="22" r="22"></circle>
                              <path d="M22 44C9.85 44 0 34.15 0 22S9.85 0 22 0s22 9.85 22 22-9.85 22-22 22zm0-2c11.046 0 20-8.954 20-20S33.046 2 22 2 2 10.954 2 22s8.954 20 20 20zM2 22C2 10.954 10.954 2 22 2s20 8.954 20 20a19.933 19.933 0 0 1-5.583 13.862c-1.976-1.973-5.53-1.975-9.084-5.529-.647-.647-1.06-1.295-1.235-1.943C28.621 25.802 30 21.282 30 18.956 30 11.666 26.05 9 22 9s-8 2.667-8 9.956c0 2.326 1.379 6.846 3.902 9.434-.176.648-.588 1.296-1.235 1.943-3.478 3.478-6.956 3.801-8.955 5.662A19.935 19.935 0 0 1 2 22z" fill="#cfd2d7"></path>
                           </g>
                        </svg>
                     </div>
                  </div>
                  <div class="hidden@xs hidden@sm">
                     <h5 class="fluid ml3 text-truncate">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                  </div>
                  <svg class="icon icon-select-arrow ml1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" height="12" width="12">
                     <path d="M3.053 4.404A.25.25 0 0 1 3.25 4h5.5a.25.25 0 0 1 .197.405L6.192 7.9a.25.25 0 0 1-.393 0L3.053 4.404z" fill="var(--color-icon-primary)" fill-rule="nonzero"></path>
                  </svg>
               </div>
                <div class="menu" style="width: 290px;">
                   <div class="item noevents cursor-default">
                      <div class="flex fluid">
                         <div class="avatar" style="width: 44px; height: 44px;">
                            <div class="illustration default">
                               <svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
                                  <g fill="none" fill-rule="evenodd">
                                     <circle fill="#FFF" cx="22" cy="22" r="22"></circle>
                                     <path d="M22 44C9.85 44 0 34.15 0 22S9.85 0 22 0s22 9.85 22 22-9.85 22-22 22zm0-2c11.046 0 20-8.954 20-20S33.046 2 22 2 2 10.954 2 22s8.954 20 20 20zM2 22C2 10.954 10.954 2 22 2s20 8.954 20 20a19.933 19.933 0 0 1-5.583 13.862c-1.976-1.973-5.53-1.975-9.084-5.529-.647-.647-1.06-1.295-1.235-1.943C28.621 25.802 30 21.282 30 18.956 30 11.666 26.05 9 22 9s-8 2.667-8 9.956c0 2.326 1.379 6.846 3.902 9.434-.176.648-.588 1.296-1.235 1.943-3.478 3.478-6.956 3.801-8.955 5.662A19.935 19.935 0 0 1 2 22z" fill="#cfd2d7"></path>
                                  </g>
                               </svg>
                            </div>
                         </div>
                         <div class="ml3 flex flex-column flex-grow text-truncate">
                            <h5 title="padaf 35403" class="fluid text-truncate">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                            <small title="padaf35403@robhung.com" class="fluid text-truncate">{{ Auth::user()->email }}</small>
                         </div>
                      </div>
                   </div>
                   <div class="item">Personal settings</div>
                   <div class="item separator"></div>
                   <div class="item">
                      <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <a href="{{ route('logout') }}" onclick="event.preventDefault();
                         this.closest('form').submit();">Sign out
                         </a>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </nav>