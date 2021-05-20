<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Vesperr Bootstrap Template - Index</title>
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
                    <li class="active">
                        <a href="{{route('customer.home')}}">Home<span class="sr-only">(current)</span></a>
                    </li>
                    @else
                    <li class="active">
                        <a href="{{url('/')}}" >Home<span class="sr-only">(current)</span></a>
                    </li>
                @endif
                <li><a href="{{url('wisata')}}">Wisata</a></li>
                <li><a href="{{url('hotel')}}">Hotel</a></li>
                <li><a href="{{url('resto')}}">Restourand</a></li>
                <li><a href="{{url('paket')}}">Paket</a></li>
                @if(auth()->guard('customer')->check())
                    <li class="get-started">
                        <a href="{{route('customer.logout')}}" style="background-color: gray;">Log out</a>
                    </li>
                @else
                    <li class="get-started">
                        <a href="{{ route('customer.loginForm') }}">Login</a>
                    </li>
                @endif
            </ul>
            {{-- <ul>
            <li class="active"><a href="#index.html">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li class="get-started"><a href="#about">Get Started</a></li>
            </ul> --}}
        </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        
        <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Nikmati Wisatamu Dipulau Lombok</h1>
            <h2 data-aos="fade-up" data-aos-delay="400"></h2>
            <div data-aos="fade-up" data-aos-delay="800">
                <a href="{{route('customer.registerForm')}}" class="btn-get-started scrollto">Daftar Sekarang</a>
            </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
            <img src="{{ asset('icon/icon1.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Tentang</h2>
            </div>
  
            <div class="row content">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <p>
                        Fasilitas Yang Di sediakan!
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Wisata Ditempat Terbaik dan Terpopuler Dipulau Lombok.</li>
                        <li><i class="ri-check-double-line"></i> Menginap di Hotel ***.</li>
                        <li><i class="ri-check-double-line"></i> Menikmatik Kuliner Terpupuler dan Terenak.</li>
                    </ul>
                </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <p>
                    Setilnya lombok  Tour and Travel adalah Jasa wisata yang telah terpercaya, menemani dan membantu anda dalam memilih dan menentukan perjalanan terbaik dalam berwisata dipulau lombok.
                </p>
                {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
            </div>
            </div>
  
        </div>
      </section><!-- End About Us Section -->

      <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Portofolio</h2>
                <p>Macam-Macam Fasilitas dan Objek Wisata Yang Disediakan.</p>
            </div>
    
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">wisata</li>
                    <li data-filter=".filter-card">Hotel</li>
                    <li data-filter=".filter-web">Restourand</li>
                </ul>
                </div>
            </div>
    
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                {{-- awal --}}
                @forelse($wisatas as $row)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{ asset('storage/wisatas/'. $row->gambar) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>{{$row->nama}}</h4>
                    <p>{{$row->lokasi}}</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('storage/wisatas/'. $row->gambar) }}" data-gall="portfolioGallery" class="venobox" title="{{$row->nama}}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('wisata.detail', $row->id) }}" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                    </div>
                </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('icon/tdk.png')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="{{asset('icon/tdk.png')}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="#" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforelse

                @forelse($hotels as $row)
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="{{ asset('storage/hotels/'. $row->gambar) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>{{$row->nama}}</h4>
                    <p>{{$row->lokasi}}</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('storage/hotels/'. $row->gambar) }}" data-gall="portfolioGallery" class="venobox" title="{{$row->nama}}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('hotel.detail', $row->id) }}" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                    </div>
                </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{asset('icon/tdk.png')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="{{asset('icon/tdk.png')}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="#" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforelse

                @forelse($restos as $row)
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="{{ asset('storage/restos/'. $row->gambar) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>{{$row->nama}}</h4>
                    <p>{{$row->lokasi}}</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('storage/restos/'. $row->gambar) }}" data-gall="portfolioGallery" class="venobox" title="{{$row->nama}}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('resto.detail', $row->id) }}" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                    </div>
                </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset('icon/tdk.png')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="{{asset('icon/tdk.png')}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="#" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforelse
    
                {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                    </div>
                </div>
                </div> --}}
                
            {{-- akhir --}}
            </div>
    
        </div>
    </section><!-- End Portfolio Section -->

    <section id="more-services" class="more-services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Paket Tour</h2>
                <p>Pilih dan Pesan Pakat Tour yang Anda Inginkan.</p>
            </div>

        <div class="row">
            @forelse($pakets as $row)
                <div class="col-md-6 d-flex align-items-stretch mt-4">
                    <div class="card" style='background-image: url("{{ asset('storage/pakets/'. $row->gambar) }}");' data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('order.index', $row->id) }}">{{$row->nama}}</a></h5>
                        <p class="card-text">{{$row->deskripsi}}</p>
                        <div class="read-more"><a href="{{route('order.index', $row->id) }}"><i class="icofont-arrow-right">
                          </i>Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-md-6 d-flex align-items-stretch mt-4">
                    <div class="card" style='background-image: url("{{asset('icon/tdk.png')}}");' data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Data Tidak DiTemukan</a></h5>
                            <p class="card-text">Data Tidak DiTemukan</p>
                            <div class="read-more"><a href="" class="btn btn-success text-light"><i class="icofont-arrow-right"></i>Pesan Sekarang!</a></div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        </div>
    </section><!-- End Services Section -->

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