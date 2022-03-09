<header class="header fixed-top" data-header="sticky">
    <div class="navbar">
       <div class="container">
          <div class="header__holder d-flex align-items-center justify-content-between w-100">
               @if(isset($site_logo) && $site_logo != '')
               <a class="header-logo" tabindex="0" href="/">
                  <img src="{{ $site_logo }}" height="27px" width="158px" alt="Training logo">
               </a>
               @endif
             <div class="navbar-block navbar-expand-lg navbar-light">
                <div class="navbar-collapse__overlay" data-menu-overlay></div>
                <div class="navbar-collapse" id="headerNav">
                   <div class="navbar-collapse__holder" data-scroll-lock-ignore>
                      <div class="navbar-collapse__scroller">
                         <div class="navbar-collapse__menu" role="navigation">
                            <ul class="navbar-nav">
                               <li class="nav-item nav-item--static" data-touch-hover="">
                                  <a class="nav-link" data-toggle="collapse" href="#product-collapse">Product</a>
                                  <div class="navbar-nav__megamenu collapse d-lg-block" id="product-collapse">
                                     <div class="container">
                                        <div class="megamenu__row row flex-grow-1">
                                           <div class="megamenu__col col-lg-3">
                                              <h3 class="megamenu__title">Training</h3>
                                              <ul class="megamenu_list list-unstyled">
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--full d-flex text-wrap" href="how-it-works.html">
                                                       <div class="icon"><img src="{{ asset('assets/public-site-v2/images/megamenu-media/icon-how-it-work.svg') }}" alt="How it Works" loading="lazy"></div>
                                                       <div class="description">
                                                          <h5 class="title font-weight-bold">How it Works</h5>
                                                          <p class="text"> Get started with an overview of a typical workflow in Overflow.</p>
                                                       </div>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--full d-flex text-wrap" href="features.html">
                                                       <div class="icon"><img src="{{ asset('assets/public-site-v2/images/megamenu-media/icon-features.svg') }}" alt="Features" loading="lazy"></div>
                                                       <div class="description">
                                                          <h5 class="title font-weight-bold">Features</h5>
                                                          <p class="text"> Explore all features in Overflow, split by workflow steps.</p>
                                                       </div>
                                                    </a>
                                                 </li>
                                              </ul>
                                           </div>
                                           <div class="megamenu__col col-lg-3">
                                              <h3 class="megamenu__title">Overflow for</h3>
                                              <ul class="megamenu_list list-unstyled">
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--icon d-flex" href="teams/product.html">
                                                       <div class="icon"><img src="{{ asset('assets/public-site-v2/images/megamenu-media/icon-product-team.svg') }}" alt="Overflow for Product Teams" loading="lazy"></div>
                                                       <h5 class="title font-weight-normal">Product Teams</h5>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--icon d-flex" href="teams/design.html">
                                                       <div class="icon"><img src="{{ asset('assets/public-site-v2/images/megamenu-media/icon-users.svg') }}" alt="Overflow for Design Teams" loading="lazy"></div>
                                                       <h5 class="title font-weight-normal">Design Teams</h5>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--icon d-flex" href="teams/agile.html">
                                                       <div class="icon"><img src="{{ asset('assets/public-site-v2/images/megamenu-media/icon-agile.svg') }}" alt="Overflow for Agile Teams" loading="lazy"></div>
                                                       <h5 class="title font-weight-normal">Agile Teams</h5>
                                                    </a>
                                                 </li>
                                              </ul>
                                           </div>
                                           <div class="megamenu__col col-lg-3">
                                              <h3 class="megamenu__title">Plans</h3>
                                              <ul class="megamenu_list list-unstyled">
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--description d-block text-wrap" href="{{ route('pricing') }}">
                                                       <h5 class="title font-weight-bold">Pro</h5>
                                                       <p class="text"> The standard Overflow subscription, giving you access to all major features.</p>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--description d-block text-wrap" href="{{ route('pricing') }}">
                                                       <h5 class="title font-weight-bold">Enterprise</h5>
                                                       <p class="text"> Tailored to your organization’s unique scalability and security needs.</p>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <div class="link-arrow-holder"><a class="link--arrow-right" href="{{ route('pricing') }}">Compare Plans</a></div>
                                                 </li>
                                              </ul>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </li>
                               <li class="nav-item nav-item--static" data-touch-hover="">
                                  <a class="nav-link" data-toggle="collapse" href="#resources-collapse">Resources</a>
                                  <div class="navbar-nav__megamenu collapse d-lg-block" id="resources-collapse">
                                     <div class="container">
                                        <div class="megamenu__row row flex-grow-1">
                                           <div class="megamenu__col col-lg-3">
                                              <h3 class="megamenu__title">Help Center</h3>
                                              <div class="row">
                                                 <div class="col-lg-12">
                                                    <ul class="megamenu_list list-unstyled">
                                                      <li>
                                                         <a class="megamenu__link megamenu__link--full d-flex text-wrap" href="support_subdomain/hc/en-us/sections/115000350854-FAQs.html" target="_blank" rel="noopener">
                                                            <div class="icon"><img src="{{ asset('assets/public-site-v2/images/megamenu-media/icon-FAQs.svg') }}" alt="Answers to the most commonly asked questions." loading="lazy"></div>
                                                            <div class="description">
                                                               <h5 class="title font-weight-bold">FAQs</h5>
                                                               <p class="text"> Answers to the most commonly asked questions.</p>
                                                            </div>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a class="megamenu__link megamenu__link--full d-flex text-wrap" href="support_subdomain/hc/en-us/sections/115000350854-FAQs.html" target="_blank" rel="noopener">
                                                            <div class="icon"><img src="{{ asset('assets/public-site-v2/images/megamenu-media/icon-FAQs.svg') }}" alt="Answers to the most commonly asked questions." loading="lazy"></div>
                                                            <div class="description">
                                                               <h5 class="title font-weight-bold">Support</h5>
                                                               <p class="text"> Answers to the most commonly asked questions.</p>
                                                            </div>
                                                         </a>
                                                      </li>
                                                    </ul>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="megamenu__col col-lg-3">
                                              <h3 class="megamenu__title">Latest Reads</h3>
                                              <ul class="megamenu_list list-unstyled">
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--post d-flex text-wrap" href="blog_subdomain/files/dc4921f8123---4_html_yg7brcs2jvgayjscyucfv4.html" target="_blank" rel="noopener">
                                                       <div class="image"><img src="{{asset('assets/max/220/1_KazHiLtOAy3KY00BF0YJ-A.png') }}" alt="7 reasons why you should present your design work in Overflow and not in your design tool"></div>
                                                       <div class="description">
                                                          <h5 class="title font-weight-bold">7 reasons why you should present your design work in Overflow and not in your design tool</h5>
                                                       </div>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--post d-flex text-wrap" href="blog_subdomain/making-asynchronous-communication-work-c4a6ab1430de_source_rss----edc4921f8123---4.html" target="_blank" rel="noopener">
                                                       <div class="image"><img src="{{asset('assets/max/220/1_N13UxelxiJhaG3ylOl5AUA.png') }}" alt="Making asynchronous communication work"></div>
                                                       <div class="description">
                                                          <h5 class="title font-weight-bold">Making asynchronous communication work</h5>
                                                       </div>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <a class="megamenu__link megamenu__link--post d-flex text-wrap" href="blog_subdomain/user-flow-diagramming-trends-in-2021-1ab4d3d262ba_source_rss----edc4921f8123---4.html" target="_blank" rel="noopener">
                                                       <div class="image"><img src="{{asset('assets/max/220/1_aObAtHYklLZ9RyoPJWHXQg.png') }}" alt="User flow diagramming trends in 2021"></div>
                                                       <div class="description">
                                                          <h5 class="title font-weight-bold">User flow diagramming trends in 2021</h5>
                                                       </div>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <div class="link-arrow-holder"><a class="link--arrow-right" href="blog_subdomain/index.html" target="_blank" rel="noopener">Read the Blog</a></div>
                                                 </li>
                                              </ul>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </li>
                               <li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}" title="Try Overflow for free for 14 days">Pricing</a></li>
                            </ul>
                         </div>
                      </div>
                      @auth()
                        <div class="navbar-collapse__buttons navbar-collapse__button-group">
                           <div class="btn-toolbar">
                              <div class="btn-group" data-menu-sequence="">
                                 <a class="btn btn-outline-primary flex-grow-1 navbar__btn-simple" href="{{ route('user-dashboard') }}">
                                       <span>Dashboard</span>
                                 </a>
                              </div>
                           </div>
                        </div>
                      @else
                        <div class="navbar-collapse__buttons navbar-collapse__button-group">
                           <div class="btn-toolbar">
                              <div class="btn-group" data-menu-sequence="">
                                 <a class="btn btn-outline-primary flex-grow-1 navbar__btn-simple" href="{{ route('login') }}">
                                       <span>Sign in</span>
                                 </a>
                              </div>
                           </div>
                        </div>
                      @endauth
                   </div>
                </div>
                <button class="navbar-toggler" type="button" aria-controls="headerNav" aria-expanded="false" aria-label="Toggle navigation" data-menu-opener><span class="navbar-toggler__icon icon-burger"></span><span class="navbar-toggler__label" data-opened-state="Close" data-closed-state="Menu"></span></button>
             </div>
          </div>
       </div>
    </div>
 </header>