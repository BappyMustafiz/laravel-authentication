@extends('frontend.layouts.master')
@section('main-content')
<section class="site-section intro-section">
    <div class="intro-section__container container">
      <div class="intro-section__holder">
        <div class="intro-section__content-part">
          <div class="intro-section__content-holder">
            <h1 class="intro-section__title" data-scroll="" data-scroll-call="fadeIn">Overflow for agile teams</h1>
            <div class="intro-section__content" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
              <div class="intro-section__content-item">Present your work effectively, engage your team in design critique, and navigate faster through the different steps of product design.</div>
            </div>
            <div class="intro-section__buttons btn-toolbar mx-n0_5 md-md-0">
              <div class="btn-group" data-delay="0.3" data-scroll="" data-scroll-call="fadeIn">
                <a class="btn btn-primary" href="#!" title="Start for free">
                  <span>Start for free</span>
                </a>
              </div>
            </div>
            <div class="intro-section__footer-content" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
              <div class="intro-section__footer-content-item">
                <span class="works-with">Works with <img src="assets/public-site-v2/images/figma.svg" alt="Figma logo" title="Figma">
                  <img src="{{ asset('assets/public-site-v2/images/sketch.svg') }}" alt="Sketch logo" title="Sketch">
                  <img src="{{ asset('assets/public-site-v2/images/xd.svg') }}" alt="Adobe XD logo" title="Adobe XD">
                  <img src="{{ asset('assets/public-site-v2/images/photoshop.svg') }}" alt="Adobe Photoshop logo" title="Adobe Photoshop">
                </span>
              </div>
            </div>
            <div class="brand-logos-section">
              <div class="container">
                <div class="brand-logos-section__holder brand-logos-section--use-cases">
                  <h4 class="brand-logos-section__title" data-scroll="" data-scroll-call="fadeIn" data-delay="0.02">Trusted by more than 500,000 designers and product managers across the globe</h4>
                  <div class="brand-logos-section__images">
                    <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0">
                      <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/amazon.svg" alt="Amazon logo" title="Amazon" loading="lazy">
                    </div>
                    <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.01">
                      <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/netflix.svg" alt="Netflix logo" title="Netflix" loading="lazy">
                    </div>
                    <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.02">
                      <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/spotify.svg" alt="Spotify logo" title="Spotify" loading="lazy">
                    </div>
                    <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.03">
                      <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/microsoft.svg" alt="Microsoft logo" title="Microsoft" loading="lazy">
                    </div>
                    <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.04">
                      <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/facebook.svg" alt="Facebook logo" title="Facebook" loading="lazy">
                    </div>
                    <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.05">
                      <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/yahoo.svg" alt="Yahoo logo" title="Yahoo" loading="lazy">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="intro-section__visual-part">
          <div class="intro-section__visual" data-scroll="" data-scroll-call="fadeIn">
            <div class="intro-section__parallax-holder intro-section__parallax-holder--half-circle-down">
              <img class="img-fluid" src="assets/public-site-v2/images/use-cases/product_teams_top2.png" srcset="/assets/public-site-v2/images/use-cases/product_teams_top2@2x.png 2x" alt="A team of young professionals in their working stations in an open space office environment." data-scroll="" data-scroll-speed="-0.75" data-scroll-offset="-50%, -50%">
            </div>
            <span class="block__decoration block__decoration--half-circle-orange" data-scroll="" data-scroll-speed="-0.5" data-scroll-offset="-100%, -100%">
              <img class="img-fluid decoration-half-circle decoration-half-circle--orange" src="assets/public-site-v2/images/decorations/half-circle-horizontal-orange.svg" alt="" loading="lazy">
            </span>
            <span class="block__decoration block__decoration--shapes-horizontal" data-scroll="" data-scroll-speed="0.5" data-scroll-offset="-100%, -100%">
              <img class="img-fluid decoration-shapes" src="assets/public-site-v2/images/decorations/shapes-horizontal-blue_2x.png" alt="" loading="lazy">
            </span>
            <span class="block__decoration block__decoration--half-circle-case-product" data-scroll="" data-scroll-speed="0.5" data-scroll-offset="-100%, -100%">
              <img class="img-fluid decoration-half-circle decoration-half-circle--case--product" src="assets/public-site-v2/images/use-cases/product_teams_top_1.png" srcset="/assets/public-site-v2/images/use-cases/product_teams_top_1@2x.png 2x" alt="A woman showing something to a man on her portable testing device." loading="lazy">
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="brand-logos-section">
    <div class="container">
      <div class="brand-logos-section__holder brand-logos-section--use-cases-mobile">
        <h4 class="brand-logos-section__title" data-scroll="" data-scroll-call="fadeIn" data-delay="0.02">Trusted by more than 500,000 designers and product managers across the globe</h4>
        <div class="brand-logos-section__images">
          <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0">
            <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/amazon.svg" alt="Amazon logo" title="Amazon" loading="lazy">
          </div>
          <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.01">
            <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/netflix.svg" alt="Netflix logo" title="Netflix" loading="lazy">
          </div>
          <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.02">
            <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/spotify.svg" alt="Spotify logo" title="Spotify" loading="lazy">
          </div>
          <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.03">
            <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/microsoft.svg" alt="Microsoft logo" title="Microsoft" loading="lazy">
          </div>
          <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.04">
            <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/facebook.svg" alt="Facebook logo" title="Facebook" loading="lazy">
          </div>
          <div class="brand-logos-section__logo" data-scroll="" data-scroll-call="fadeIn" data-delay="0.05">
            <img class="img-fluid brand-logos-section__image" src="assets/public-site-v2/images/customers/yahoo.svg" alt="Yahoo logo" title="Yahoo" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="site-section site-section--present present border-bottom">
    <div class="site-section__holder">
      <div class="site-section__container container">
        <div class="text-image-block mb-1_5 mb-md-2_5 mb-md-2 text-image-block--text-large text-image-block--subtitle-large text-image-block--align-start text-image-block--content-left">
          <div class="text-image-block__holder">
            <div class="text-image-block__content-part col-12 col-lg-5 col-xl-4">
              <h5 class="text-image-block__title" data-delay="0.05" data-scroll="" data-scroll-call="fadeIn">Use cases</h5>
              <div class="text-image-block__description">
                <div class="text-image-block__text-box">
                  <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                    <p>Build interactive user flow diagrams and engaging presentations that tell the story behind your designs.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="interactive-block" data-interactive-block="" data-media-fade-out-duration="200" data-media-pause-duration="250" data-media-fade-in-duration="250">
          <div class="interactive-block__holder">
            <div class="interactive-block__item row justify-content-between mb-6_5 mb-md-0 is-active" data-interactive-part="">
              <div class="interactive-block__media-part col-12 col-md-6 col-xl-8 mb-1_5 mb-md-0" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__media">
                  <div class="interactive-block__media-holder">
                    <div class="interactive-block__visual interactive-block__visual--static">
                      <video class="interactive-block__video" muted="" playsinline="" data-animation-type="video" data-interactive-animation="https://overflow.io/upload/o/public/examples/early-stage-ideation.mp4" data-duration="10"></video>
                    </div>
                  </div>
                </div>
              </div>
              <div class="interactive-block__content-part col-12 col-md-6 col-lg-5 col-xl-4 mr-md-auto" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__content" data-interactive-toggle="" tabindex="0">
                  <span class="progress-bar" data-animation-progress="">
                    <span class="progress-bar__indicator" data-progress-filler=""></span>
                  </span>
                  <h5 class="interactive-block__title">Early stage ideation</h5>
                  <div class="interactive-block__text">
                    <p>Validate your idea early with minimum time investment, using simple shapes and arrows.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="interactive-block__item row justify-content-between mb-6_5 mb-md-0" data-interactive-part="">
              <div class="interactive-block__media-part col-12 col-md-6 col-xl-8 mb-1_5 mb-md-0" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__media">
                  <div class="interactive-block__media-holder">
                    <div class="interactive-block__visual interactive-block__visual--static">
                      <video class="interactive-block__video" muted="" playsinline="" data-animation-type="video" data-interactive-animation="https://overflow.io/upload/o/public/examples/wireframe-user-flows.mp4" data-duration="11"></video>
                    </div>
                  </div>
                </div>
              </div>
              <div class="interactive-block__content-part col-12 col-md-6 col-lg-5 col-xl-4 mr-md-auto" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__content" data-interactive-toggle="" tabindex="0">
                  <span class="progress-bar" data-animation-progress="">
                    <span class="progress-bar__indicator" data-progress-filler=""></span>
                  </span>
                  <h5 class="interactive-block__title">Wireframe user flows</h5>
                  <div class="interactive-block__text">
                    <p>Present your flow with a minimum level of design detail, before proceeding to high-fidelity design.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="interactive-block__item row justify-content-between mb-6_5 mb-md-0" data-interactive-part="">
              <div class="interactive-block__media-part col-12 col-md-6 col-xl-8 mb-1_5 mb-md-0" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__media">
                  <div class="interactive-block__media-holder">
                    <div class="interactive-block__visual interactive-block__visual--static">
                      <video class="interactive-block__video" muted="" playsinline="" data-animation-type="video" data-interactive-animation="https://overflow.io/upload/o/public/examples/high-fidelity-user-flows.mp4" data-duration="21"></video>
                    </div>
                  </div>
                </div>
              </div>
              <div class="interactive-block__content-part col-12 col-md-6 col-lg-5 col-xl-4 mr-md-auto" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__content" data-interactive-toggle="" tabindex="0">
                  <span class="progress-bar" data-animation-progress="">
                    <span class="progress-bar__indicator" data-progress-filler=""></span>
                  </span>
                  <h5 class="interactive-block__title">High fidelity user flows</h5>
                  <div class="interactive-block__text">
                    <p>Use high fidelity designs to fully visualize your user journey. Group your screens into subflows using background rectangles.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="interactive-block__item row justify-content-between " data-interactive-part="">
              <div class="interactive-block__media-part col-12 col-md-6 col-xl-8 mb-1_5 mb-md-0" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__media">
                  <div class="interactive-block__media-holder">
                    <div class="interactive-block__visual interactive-block__visual--static">
                      <video class="interactive-block__video" muted="" playsinline="" data-animation-type="video" data-interactive-animation="https://overflow.io/upload/o/public/examples/capture-existing-flows.mp4" data-duration="13"></video>
                    </div>
                  </div>
                </div>
              </div>
              <div class="interactive-block__content-part col-12 col-md-6 col-lg-5 col-xl-4 mr-md-auto" data-scroll="" data-scroll-call="fadeIn">
                <div class="interactive-block__content" data-interactive-toggle="" tabindex="0">
                  <span class="progress-bar" data-animation-progress="">
                    <span class="progress-bar__indicator" data-progress-filler=""></span>
                  </span>
                  <h5 class="interactive-block__title">Capture existing flows</h5>
                  <div class="interactive-block__text">
                    <p>Document and improve the user experience of existing digital products using simple screenshots.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="see-all-examples row justify-content-between">
          <div class="see-all-examples-left col-12 col-md-6 col-lg-5 col-xl-4 mr-md-auto"></div>
          <div class="see-all-examples-right col-12 col-md-6 col-xl-8 mb-1_5 mb-md-0 col-md-push-6 col-xl-push-4">
            <a class="link--arrow-right" href="examples/index.html">See all examples</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="site-section site-section--use-case get-feedback">
    <div class="site-section__holder">
      <div class="site-section__container container">
        <div class="headline-block headline-get-feedback" data-scroll="" data-scroll-call="fadeIn">
          <div class="headline-block__container">
            <div class="headline-block__holder">
              <h4 class="headline-block__title">Get team <br>feedback </h4>
            </div>
          </div>
        </div>
        <div class="text-image-block text-image-block--image-offset-md text-image-block--image-bleeding text-image-block--align-center text-image-block--content-left">
          <div class="text-image-block__holder">
            <div class="text-image-block__content-part col-12 col-lg-5 col-xl-4 mb-1_5 mb-md-3 mb-lg-2">
              <div class="text-image-block__description">
                <div class="text-image-block__text-box">
                  <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">With Overflow comments</h5>
                  <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                    <p></p>
                    <ul class="features-box__list list--checkmark">
                      <li class="list__item">Upload your presentation to the Overflow Cloud to get a publication link that you can send to your peers. Installing the Overflow app is not essential to view the link's content.</li>
                      <li class="list__item">Your team can view your design presentation on any popular device, such as desktops, phones, and tablets.</li>
                      <li class="list__item">Everyone with the link can exchange feedback through Overflow comments, leading to faster design iteration and decision-making.</li>
                    </ul>
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-image-block__visual-part col-12 col-lg-6 col-xl-7" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
              <div class="text-image-block__image-holder">
                <img class="img-fluid text-image-block__visual" style="max-width: 842px;" src="assets/public-site-v2/images/use-cases/product_teams_feedback_visual.png" srcset="/assets/public-site-v2/images/use-cases/product_teams_feedback_visual@2x.png 2x" alt="A male user’s avatar leaving feedback on an Overflow presentation." loading="lazy">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="site-section site-section--use-case border-bottom closeup-top">
    <div class="site-section__holder">
      <div class="site-section__container container">
        <div class="text-image-block text-image-block--image-offset-md text-image-block--align-center text-image-block--content-right">
          <div class="text-image-block__holder">
            <div class="text-image-block__content-part col-12 col-lg-5 mb-2 mb-md-0">
              <div class="text-image-block__description">
                <div class="text-image-block__text-box">
                  <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">In popular collaboration tools</h5>
                  <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                    <p>Embed your Overflow presentation in Trello, JIRA, Confluence, or any other tool your team uses to collaborate, in order to align and receive feedback.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-image-block__visual-part col-12 col-lg-7 text-center" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
              <div class="text-image-block__image-holder">
                <img class="img-fluid text-image-block__visual" style="max-width: 550px;" src="assets/public-site-v2/images/use-cases/collaboration_tools_visual.svg" alt="A grid with the logos of popular collaboration and content management tools surrounding the Overflow logo." loading="lazy">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="site-section site-section--use-case">
    <div class="site-section__holder">
      <div class="site-section__container container">
        <div class="text-image-block text-image-block--image-offset-md text-image-block--align-center text-image-block--content-right">
          <div class="text-image-block__holder">
            <div class="text-image-block__content-part col-12 col-lg-5 mb-2 mb-md-0">
              <h5 class="text-image-block__title" data-delay="0.05" data-scroll="" data-scroll-call="fadeIn">Enhance teamwork</h5>
              <div class="text-image-block__description">
                <div class="text-image-block__text-box">
                  <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                    <p></p>
                    <ul class="features-box__list list--checkmark">
                      <li class="list__item">Overflow documents and publication links can be stored in private or shared folders, depending on your team's structure and needs.</li>
                      <li class="list__item">Teammates can be added as Editors to any document to contribute and help achieve a more collaborative final result.</li>
                    </ul>
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-image-block__visual-part col-12 col-lg-7" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
              <div class="text-image-block__image-holder">
                <img class="img-fluid text-image-block__visual" style="max-width: 566px;" src="assets/public-site-v2/images/use-cases/product_teams_enchance_teamwork_visual.png" srcset="/assets/public-site-v2/images/use-cases/product_teams_enchance_teamwork_visual@2x.png 2x" alt="A woman opening a presentation to her teammates. The list view of an organization’s folder structure." loading="lazy">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="site-section site-section--gray-light site-section how-do-i-get-started">
    <div class="site-section__holder">
      <div class="site-section__container container">
        <div class="headline-block" data-scroll="" data-scroll-call="fadeIn">
          <div class="headline-block__container">
            <div class="headline-block__holder">
              <h4 class="headline-block__title">How do I get started?</h4>
            </div>
          </div>
        </div>
        <div class="text-image-group text-image-group--align-items-left text-image-group--image-heading-summary">
          <div class="text-image-group__holder">
            <div class="text-image-group__item col-12 col-md-6 col-xl-4 flex-grow-1">
              <div class="text-image-block text-image-block--text-large text-image-block--align-start text-image-block--content-left text-image-block--image-heading-summary">
                <div class="text-image-block__holder">
                  <div class="text-image-block__content-part col-12">
                    <div class="text-image-block__description">
                      <div class="text-image-block__text-box">
                        <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">STEP 1</h5>
                        <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">
                          <p>Start your 14-day, full-featured Overflow trial</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-image-block__visual-part col-12 order-first" data-delay="0.2" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">
                    <div class="text-image-block__image-holder">
                      <img class="img-fluid text-image-block__visual" src="assets/public-site-v2/images/use-cases/get_started_step1.svg" alt="An illustration of Overflow’s logo coming out of a packing box.">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-image-group__item col-12 col-md-6 col-xl-4 flex-grow-1">
              <div class="text-image-block text-image-block--text-large text-image-block--align-start text-image-block--content-left text-image-block--image-heading-summary">
                <div class="text-image-block__holder">
                  <div class="text-image-block__content-part col-12">
                    <div class="text-image-block__description">
                      <div class="text-image-block__text-box">
                        <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">STEP 2</h5>
                        <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">
                          <p>Sync from your favorite tool or drag and drop images</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-image-block__visual-part col-12 order-first" data-delay="0.2" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">
                    <div class="text-image-block__image-holder">
                      <img class="img-fluid text-image-block__visual" src="assets/public-site-v2/images/use-cases/get_started_step2.svg" alt="A mouse dragging and dropping an image file inside an abstract project screen, surrounded by the logos of popular design tools." loading="lazy">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-image-group__item col-12 col-md-6 col-xl-4 flex-grow-1">
              <div class="text-image-block text-image-block--text-large text-image-block--align-start text-image-block--content-left text-image-block--image-heading-summary">
                <div class="text-image-block__holder">
                  <div class="text-image-block__content-part col-12">
                    <div class="text-image-block__description">
                      <div class="text-image-block__text-box">
                        <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">STEP 3</h5>
                        <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">
                          <p>Build interactive presentations to facilitate internal decision-making!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-image-block__visual-part col-12 order-first" data-delay="0.2" data-scroll="" data-scroll-call="moveUp" data-movement-value="15">
                    <div class="text-image-block__image-holder">
                      <img class="img-fluid text-image-block__visual" src="assets/public-site-v2/images/use-cases/get_started_step3.svg" alt="A three-screen Overflow diagram inside a browser window." loading="lazy">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-group flex-grow-1 flex-md-grow-0">
          <a class="cta-block__btn btn btn-primary" href="download/index.html">Start for free</a>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.close', function(){
                location.reload()
            });
            $(document).on('click', '.fade', function(){
                location.reload()
            });
        });
    </script>
@endsection