<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Destinasi Wisata</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('vesperr/assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('vesperr/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vesperr/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vesperr/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vesperr/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('vesperr/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vesperr/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vesperr/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{ asset('vesperr/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('sb-admin-2/vendor/font-aws-4.7/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('vesperr/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Vesperr - v2.3.1
    * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        {{-- <h1 class="text-light"><a href="index.html"><span>Vesperr</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <a href="{{url('/')}}"><img src="{{ asset('icon/icon1.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            @if(auth()->guard('customer')->check())
                <li>
                    <a href="{{route('customer.home')}}">Home</a>
                </li>
                @else
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
            @endif

            <li><a href="{{url('wisata')}}">Wisata</a></li>
            <li><a href="{{url('hotel')}}">Hotel</a></li>
            <li><a  href="{{url('resto')}}">Restourand</a></li>
            <li class="active"><a href="{{url('paket')}}">Paket</a></li>
            <li class="get-started" ><a href="#about" >Login</a></li>
        </ul>
      
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Detail Paket Tour and Travel</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Detail-Paket</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->


<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">
    <div class="row">
     
      <div class="col-lg-6">
        {{-- <h2 class="portfolio-title">Information Paket Tour And Travel</h2> --}}
        <div class="owl-carousel portfolio-details-carousel">
            <img src="{{asset('storage/pakets/'. $paketd->gambar) }}" class="img-fluid" alt="">
        </div>
      </div>
    
      <div class="col-lg-6">
        <h2 class="text-bold">Paket Information 
          <a class="btn btn-outline-primary" href="{{route('order.index', $paketd->id) }}">
          <span class="icon text-dark-50">
            <i class="fa fa-suitcase"></i>
          </span>Pesan Sekarang
        </a>
        </h3>
        <ul>
          <li class="my-2"><strong>Nama -> </strong>
            <span class="text-secondary">{{ $paketd->nama }}</span>

          </li>
          <li class="my-2"><strong>Minimal Touris -> </strong>
            <span class="text-secondary"> {{ $paketd->min }}orang</span>
          </li>
          <li class="my-2"><strong>Maximal Touris -> </strong>{{ $paketd->max }}orang
          </li>
          <li class="my-2"><strong>Harga/orang -> </strong>
            <span class="text-secondary">Rp {{number_format($paketd->harga)}}</span>
          </li>
          <li class="my-2"><strong>Description </strong> 
            <p class="text-secondary">{{ $paketd->deskripsi }}</p>
          </li>
            
        </ul>
      </div>{{-- end col-6 --}}
    </div>{{-- end row --}}
    <br>
    <div class="row">
      <div class="col-md-4">
        <li><strong>Destinasi Wisata : </strong>
          @foreach ($paketd->wisataItem as $row)
          <p><span>{{ $row->wisata->nama }}</span></p>
            
          <hr>
        @endforeach
        </li>
      </div>
      <div class="col-md-4">
        <li><strong>Destinasi Hotel : </strong>
          @foreach ($paketd->hotelItem as $row)
          <p><span>{{ $row->hotel->nama }}</span></p>
          
          <hr>
          @endforeach
        </li>
      </div>
      <div class="col-md-4">
        <li><strong>Destinasi Kuliner : </strong>
          @foreach ($paketd->restoItem as $row)
          <p><span>{{ $row->resto->nama }}</span></p>
            
          <hr>
        @endforeach
        </li>
      </div>
    </div>


  </div>
</section><!-- End Portfolio Details Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Vesperr</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vesperr/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{ asset('vesperr/assets/vendor/aos/aos.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('vesperr/assets/js/main.js')}}"></script>

</body>

</html>