<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tour And Travel</title>
  <link rel="icon" href="{{ asset('icon/icon1.png') }}">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{asset('eBusiness/assets/img/favicon.png')}}" rel="icon"> --}}
  <link href="{{asset('eBusiness/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('eBusiness/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('eBusiness/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{ asset('eBusiness/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('eBusiness/assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('eBusiness/assets/vendor/nivo-slider/css/nivo-slider.css')}}" rel="stylesheet">
  <link href="{{ asset('eBusiness/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('eBusiness/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('eBusiness/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness - v2.2.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        {{-- <h1 class="text-light"><a href="index.html"><span>e</span>Business</a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <a href="{{url('/')}}"><img src="{{ asset('icon/icon1.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          @if(auth()->guard('customer')->check())
            <li class="nav-item active">
              <a href="{{route('customer.home')}}" class="active">Home<span class="sr-only">(current)</span></a>
            </li>
          @else
            <li class="nav-item active">
              <a href="{{url('/')}}" class="active">Home <span class="sr-only">(current)</span></a>
            </li>
          @endif
          <li><a href="#wisata">Wisata</a></li>
          <li><a href="#Hotel">Hotel</a></li>
          <li><a href="#restourand">Restourand</a></li>
          <li><a href="#paket">Paket</a></li>
          <li><a href="#blog" class="btn btn-outline-primary">Login</a></li>
          <li><a href="#contact" class="btn btn-outline-secondary">Register</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Slider Section ======= -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="{{asset('icon/gb1.jpg')}}" alt="" title="#slider-direction-1" />
        <img src="{{asset('icon/gb2.jpg')}}" alt="" title="#slider-direction-2" />
        <img src="{{asset('icon/gb3.jpg')}}" alt="" title="#slider-direction-3" />
        {{-- <img src="{{asset('eBusiness/assets/img/slider/slider1.jpg')}}" alt="" title="#slider-direction-1" />
        <img src="{{asset('eBusiness/assets/img/slider/slider2.jpg')}}" alt="" title="#slider-direction-2" />
        <img src="{{asset('eBusiness/assets/img/slider/slider3.jpg')}}" alt="" title="#slider-direction-3" /> --}}
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInDown animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Pengalaman Wisata Terbaik</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h1 class="title2">Kami Akan Memandumu Dalam Berwisata</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">Order</a>
                  <a class="ready-btn page-scroll" href="#about">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Pengalaman Wisata Terbaik</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Indahnya Pemandangan Pulau Lombok</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Pengalaman Wisata Terbaik </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Kuliner Terbaik Yang Ada Di Pulau Lombok</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Slider -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Paket Wisata</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="{{asset('eBusiness/assets/img/about/1.jpg')}}" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">Deskripsi Paket Wisata</h4>
                </a>
                <p>
                  Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
                </p>
                <ul>
                  <li>
                    <i class="fa fa-check"></i> Berwisata Di Lokasi Yang Indah 
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Menginap Di Hotel Berbintang ***
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Transportasi
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Menikmati Makanan Khas Lombok
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Sofenir Khas Lombok
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->

    <!-- End Services Section -->

    <!-- ======= Skills Section ======= -->

    <!-- End Skills Section -->

    <!-- ======= Team Section ======= -->
    <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Paket Tour and Travel</h2>
            </div>
          </div>
        
        </div>
      </div>
    </div>
    <!-- End Team Section -->

    <!-- ======= Rviews Section ======= -->
    <!-- End Rviews Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Objek Wisata</h2>
            </div>
          </div>
        </div>
        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                <li>
                  <a href="#" class="active" data-filter="*">All</a>
                </li>
                <li>
                  <a href="#" data-filter=".wisata">Wisata</a>
                </li>
                <li>
                  <a href="#" data-filter=".hotel">Hotel</a>
                </li>
                <li>
                  <a href="#" data-filter=".resto">Restourand</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row awesome-project-content">

          <!-- single-awesome-project start -->
          @forelse($wisatas as $row)
          <div class="col-md-4 col-sm-4 col-xs-12 wisata">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="{{ asset('storage/wisatas/'. $row->gambar) }}" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="{{ asset('storage/wisatas/'. $row->gambar) }}">
                      <h4>{{$row->nama}}</h4>
                      {{-- <span>Web Development</span> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-md-4 col-sm-4 col-xs-12 wisata">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="{{asset('icon/tdk.png')}}" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="#">
                      <h4>Tidak Ada Data</h4>
                      {{-- <span>Tidak ada Wisata</span> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforelse
          <!-- single-awesome-project end -->

          <!-- single-awesome-project start -->
          @forelse($hotels as $row)
          <div class="col-md-4 col-sm-4 col-xs-12 hotel">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="{{ asset('storage/hotels/'. $row->gambar) }}" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="{{ asset('storage/hotels/'. $row->gambar) }}">
                      <h4>{{$row->nama}}</h4>
                      {{-- <span></span> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-md-4 col-sm-4 col-xs-12 hotel">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="{{asset('icon/tdk.png')}}" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="#">
                      <h4>Tidak Ada Data</h4>
                      {{-- <span>Tidak ada Hotel</span> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforelse
          <!-- single-awesome-project end -->
          
          <!-- single-awesome-project start  resto-->
          @forelse($restos as $row)
          <div class="col-md-4 col-sm-4 col-xs-12 resto">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="{{ asset('storage/restos/'. $row->gambar) }}" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="{{ asset('storage/restos/'. $row->gambar) }}">
                      <h4>{{$row->nama}}</h4>
                      {{-- <span></span> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-md-4 col-sm-4 col-xs-12 resto">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="{{asset('icon/tdk.png')}}" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="#">
                      <h4>Tidak Ada Data</h4>
                      {{-- <span>Tidak ada Hotel</span> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforelse
          <!-- single-awesome-project end -->

          <!-- single-awesome-project start -->
          <!-- single-awesome-project end -->

          <!-- single-awesome-project start -->
          <!-- single-awesome-project end -->

          <!-- single-awesome-project start -->
          <!-- single-awesome-project end -->

        </div>
      </div>
    </div><!-- End Portfolio Section -->

    <!-- ======= Pricing Section ======= -->
    <!-- End Pricing Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    <!-- ======= Blog Section ======= -->
    <!-- End Blog Section -->

    <!-- ======= Suscribe Section ======= -->
    <div class="suscribe-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
            <div class="suscribe-text text-center">
              <h3>Selamat Datang di Setilnya Lombok</h3>
              <a class="sus-btn" href="#">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Suscribe Section -->

    <!-- ======= Contact Section ======= -->
    
            <!-- Start contact icon column -->
            
            <!-- Start contact icon column -->
            
            <!-- Start contact icon column -->
            

            <!-- Start Google Map -->
              <!-- Start Map -->
              <!-- End Map -->
            <!-- End Google Map -->

            <!-- Start  contact -->
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>e</span>Business</h2>
                </div>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- end single footer -->
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                {{-- <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="assets/img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="assets/img/portfolio/6.jpg" alt=""></a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('eBusiness/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/appear/jquery.appear.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/knob/jquery.knob.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/parallax/parallax.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/wow/wow.min.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/nivo-slider/js/jquery.nivo.slider.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('eBusiness/assets/vendor/venobox/venobox.min.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('eBusiness/assets/js/main.js')}}"></script>

</body>

</html>