<!DOCTYPE html>
<!-- Change the value of lang="en" attribute if your website's language is not English.
You can find the code of your language here - https://www.w3schools.com/tags/ref_language_codes.asp -->
<html lang="en">
    
<!-- Mirrored from rhythm.bestlooker.pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 07:29:04 GMT -->
<head>
        <title>Wallapop App</title>
        <meta name="description" content="">    
        <meta charset="utf-8">
        <meta name="author" content="https://themeforest.net/user/bestlooker/portfolio">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ url('/assets/frontend/images/wallapop.png')}}">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ url('/assets/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ url('/assets/frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{ url('/assets/frontend/css/style-responsive.css')}}">
        <link rel="stylesheet" href="{{ url('/assets/frontend/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ url('/assets/frontend/css/vertical-rhythm.min.css')}}">
        <link rel="stylesheet" href="{{ url('/assets/frontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ url('/assets/frontend/css/magnific-popup.css')}}">
    </head>
    <body class="appear-animate">
        
        <!-- Page Wrap -->
        <div class="page" id="top">
            
            <!-- Navigation panel -->
            <nav class="main-nav dark transparent stick-fixed">
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="mobile-nav" role="button" tabindex="0">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Menu</span>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                            @if (Route::has('login'))
                            <ul class="clearlist scroll-nav local-scroll">
                                @auth
                                <li><a href="{{ url('/settings') }}">Setting</a></li>
                                <li>
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                            
                            </ul>
                    </div>
                </div>
                        @endif
                </div>
            </nav>
            <!-- End Navigation panel -->
            
            <main id="main">    
            
                <!-- Home Section -->
                <section class="home-section bg-dark-alfa-30 parallax-2" data-background="{{ url('/assets/frontend/images/wallapop1.jpg')}}" id="home">
                    <div class="js-height-full container">
                        
                        <!-- Hero Content -->
                        <div class="home-content">
                            <div class="home-text">
                                
                                <h1 class="hs-line-1 font-alt mb-80 mb-xs-30 mt-70 mt-sm-0">
                                    Wallapop
                                </h1>
                                
                                <p class="hs-line-6">
                                    Welcome to our wallapopApp
                                </p>
                                
                            </div>
                        </div>
                        <!-- End Hero Content -->
                        
                        <!-- Scroll Down -->
                        <div class="local-scroll">
                            <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i><span class="sr-only">Scroll to the next section</span></a>
                        </div>
                        <!-- End Scroll Down -->
                        
                    </div>
                </section>
                <!-- End Home Section -->
                
                <section class="page-section">
                    <div class="container relative">
                        
                    <div class="row">
                        
                        <!-- Content -->
                        <div class="col-sm-12">
                            
                            <div class="row multi-columns-row">
                                @foreach ($products as $product)
                                <!-- Shop Item -->
                                <div class="col-md-4 col-lg-4 mb-60 mb-xs-40">
                                    
                                    <div class="post-prev-img">
                                        
                                        <a href="#"><img src="data:image/png;base64,{{ $product->photo }}"></a>
                                        
                                        <div class="intro-label">
                                            <span class="label label-danger bg-red">{{ $product->state }}</span>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="post-prev-title font-alt align-center">
                                        <a href="#">Published by {{ $product->user->name }}</a>
                                    </div>
                                    
                                    <div class="post-prev-title font-alt align-center">
                                        <a href="#">{{ $product->name }}</a>
                                    </div>

                                    <div class="post-prev-text align-center">
                                        <strong>$ {{ $product->price }}</strong>
                                    </div>
                                    
                                    @if (Route::has('login'))

                                         @auth
                                             <div class="post-prev-more align-center">
                                                <a href="{{ url('home/product/' . $product->id) }}" class="btn btn-mod btn-gray btn-round"><i class="fa fa-eye"></i>Show produt</a>
                                            </div>
                                         @else
                                     <div class="post-prev-more align-center"></div>
                                   @endif
                                     @endauth
                                    
                                </div>
                                <!-- End Shop Item -->
                                @endforeach
                                
                            </div>
                            
                            <!-- Pagination -->
                            <!--<div class="pagination">-->
                            <!--    <a href="#"><i class="fa fa-angle-left"></i></a>-->
                            <!--    <a href="#" class="active">1</a>-->
                            <!--    <a href="#">2</a>-->
                            <!--    <a href="#">3</a>-->
                            <!--    <a class="no-active">...</a>-->
                            <!--    <a href="#">9</a>-->
                            <!--    <a href="#"><i class="fa fa-angle-right"></i></a>-->
                            <!--</div>-->
                            <!-- End Pagination -->
                            
                        </div>
                        <!-- End Content -->
                        
                     </div>
                        
                    </div>
                </section>
                <!-- End Section -->
                
                
                <!-- Divider -->
                <hr class="mt-0 mb-0 "/>
                <!-- End Divider -->
            
            </main>
            
            <!-- Foter -->
            <footer class="page-section bg-gray-lighter footer pb-60">
                <div class="container">
                    
                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.5s">
                        <a href="#top"><img src="{{ url('/assets/frontend/images/logo-footer.png')}}" width="78" height="36" alt="Company logo" /><span class="sr-only">Scroll to the top of the page</span></a>
                    </div>
                    <!-- End Footer Logo -->
                    
                    <!-- Social Links -->
                    <div class="footer-social-links mb-110 mb-xs-60">
                        <div class="sr-only">Our profiles in social media:</div>
                        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i> <span class="sr-only">Facebook profile</span></a>
                        <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i> <span class="sr-only">Twitter profile</span></a>
                        <a href="#" title="Behance" target="_blank"><i class="fa fa-behance"></i> <span class="sr-only">Behance profile</span></a>
                        <a href="#" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i> <span class="sr-only">LinkedIn+ profile</span></a>
                        <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i> <span class="sr-only">Pinterest profile</span></a>
                    </div>
                    <!-- End Social Links -->
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <div class="footer-made">
                            Made with love for great people.
                        </div>
                        
                    </div>
                    <!-- End Footer Text --> 
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 
            </footer>
            <!-- End Foter -->
        
        
        </div>
        <!-- End Page Wrap -->
        
        
        <!-- JS -->
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery-3.5.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.easing.1.3.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery-migrate-1.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/bootstrap.min.js')}}"></script>        
        <script type="text/javascript" src="{{ url('/assets/frontend/js/SmoothScroll.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.scrollTo.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.localScroll.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.viewport.mini.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.countTo.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.appear.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.sticky.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.parallax-1.1.3.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.fitvids.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/isotope.pkgd.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/wow.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/masonry.pkgd.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.simple-text-rotator.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.lazyload.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/all.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/contact-form.js')}}"></script>
        <script type="text/javascript" src="{{ url('/assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>           
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        
    </body>

<!-- Mirrored from rhythm.bestlooker.pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 07:29:08 GMT -->
</html>
