<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Customer</title>

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
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                {{-- <h1 class="text-light"><a href="index.html"><span>Vesperr</span></a></h1> --}}
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
                    <li><a href="{{url('resto')}}">Restourand</a></li>
                    <li class="active"><a href="{{url('paket')}}">Paket</a></li>
                    @if(auth()->guard('customer')->check())
                        <li class="get-started">
                        <a href="{{route('customer.logout')}}" style="background-color: gray;">Log Out</a>
                        </li>
                    @else
                        <li class="get-started">
                            <a href="{{ route('customer.loginForm') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    {{-- <section id="hero" class="d-flex align-items-center">
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
    --}}

<main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Profil Customer</h2>
                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Profil</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->

    <section>
        <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
            {{-- <div class="section-title" data-aos="fade-up">
                <h2>Options</h2>
                <p></p>
            </div> --}}
            <div class="features">
                <div class="row" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box">
                            <i class="ri-home-3-fill" style="color: #ffbb2c;"></i>
                            <h3><a href="{{route('customer.home')}}">Home</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-user-2-fill" style="color: #5578ff;"></i>
                            <h3><a href="{{route('customer.profil', auth()->guard('customer')->user()->id)}}">Profil</a></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-shopping-bag-2-fill" style="color: #e80368;"></i>
                            <h3><a href="{{route('customer.table.order')}}">Order</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <i class="ri-money-dollar-box-fill" style="color: rgb(15, 201, 15);"></i>
                            <h3><a href="{{route('customer.table.payment')}}">Payment</a></h3>
                        </div>
                    </div>
                </div>{{-- end row --}}
            </div>
    </section><!-- End Features Section -->

    
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
    
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" class="form-control" value="{{ auth()->guard('customer')->user()->id }}"required>
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" value="{{ auth()->guard('customer')->user()->nama }}" required readonly>
                                        <p class="text-danger">{{ $errors->first('customer_nama') }}</p>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="">email</label>
                                        <input type="email"  class="form-control" value="{{ auth()->guard('customer')->user()->email }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                        <p class="text-danger">{{ $errors->first('customer_email') }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">No Tlp</label>
                                        <input type="text" class="form-control" value="{{ auth()->guard('customer')->user()->no_tlp }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                        <p class="text-danger">{{ $errors->first('customer_notlp') }}</p>
                                    </div>
                                </div>{{-- end card body--}}
                            </div>{{-- end card --}}
                            
                        </div>
        
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea id="" class="form-control" cols="5" rows="5" {{ auth()->guard('customer')->check() ? 'readonly' : ''}} required>{{ auth()->guard('customer')->user()->alamat }}</textarea>
                                            <p class="text-danger">{{ $errors->first('customer_alamat') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col-md-6 -->

                    </div>{{-- row --}}
                </form>
    
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

    <a href="#main" class="back-to-top"><i class="icofont-simple-up"></i></a>

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

    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/js/smoothness/jquery-ui.css')}}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery/jquery-1-12-4.js')}}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery-ui.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"
            integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA=="
            crossorigin="anonymous">
    </script>
    {{-- <script>
       $('#tgl_datang').datepicker({
            "dateFormat": 'dd-mm-yy',
            "todayHighlight": true,
            "setDate": new Date(),
            "minDate": 'tomorrow',
            "autoclose": true

        })

        $(function () {
            $('.jml_orang').change(function () {
                let jml = this.value;
                let perorang = $('.harga').val();
                if (jml !== '') {
                    total = $.number(jml * perorang, 2);
                    $('.total').html("Rp. " + total);
                } else {
                    $('.total').html("Tentukan jumlah pengunjung");
                }
            })
        });
    </script> --}}

    
</body>
</html>