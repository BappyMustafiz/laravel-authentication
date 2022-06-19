<footer class="footer pt-2 pt-lg-3_5">
    <div class="container">
       <div class="footer__main-bar row">
          <div class="footer__nav-part col-12 col-lg-8">
             <div class="row">
                <div class="footer__menu-col col-6 col-md-3 mb-2_5 mb-lg-0">
                   <h6 class="footer__title">PRODUCT</h6>
                   <ul class="footer-nav list-unstyled">
                      <li class="footer-nav__item"><a class="footer-nav__link" href="{{ route('how_it_works') }}">How it works</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="{{ route('features') }}">Features</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="{{ route('pricing') }}">Pricing</a></li>
                   </ul>
                </div>
                <div class="footer__menu-col col-6 col-md-3 mb-2_5 mb-lg-0">
                   <h6 class="footer__title">USE CASES</h6>
                   <ul class="footer-nav list-unstyled">
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" title="Overflow for product teams">Product Teams</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" title="Overflow for Design Teams">Design Teams</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" title="Overflow for Agile Teams">Agile Teams</a></li>
                   </ul>
                </div>
                <div class="footer__menu-col col-6 col-md-3 mb-2_5 mb-lg-0">
                   <h6 class="footer__title">RESOURCES</h6>
                   <ul class="footer-nav list-unstyled">
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" title="How can we help?" target="_blank" rel="noopener">Help Center</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" title="Support" target="_blank" rel="noopener">Support</a></li>
                   </ul>
                </div>
                <div class="footer__menu-col col-6 col-md-3 mb-2_5 mb-lg-0">
                   <h6 class="footer__title">ABOUT</h6>
                   <ul class="footer-nav list-unstyled">
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" target="_blank" title="Our Story" rel="noopener">Our Story</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" title="" target="_blank" rel="noopener">Blog</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#!" title="Email us" rel="noopener">Email us</a></li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="footer__content-part col-12 col-lg-4">
             <div class="footer__content mb-1">
                  @if(isset($site_logo) && $site_logo != '')
                     <div class="mb-2">
                        <a class="footer-logo" href="/">
                           <img class="img-fluid footer-logo__image img-fluid" height="27px" width="158px" src="{{ $site_logo }}" alt="training">
                        </a>
                     </div>
                  @endif
                <div class="footer__text">
                   <p>Get the latest news about new features and product updates.</p>
                </div>
             </div>
             <div class="footer__form d-md-block">
                <form class="form-inline" id="newsletter-form">
                   <div class="input-group input-group-sm w-100">
                      <input class="form-control" type="email" name="email" placeholder="Your email">
                      <div class="input-group-append"><button class="btn btn btn-primary" type="submit"><span>subscribe</span></button></div>
                   </div>
                   <div class="invalid-feedback"></div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </footer>