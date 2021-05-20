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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

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
                        <a href="{{url('/')}}" >Home <span class="sr-only">(current)</span></a>
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
                {{-- <li class="get-started" ><a href="#about" >Login</a></li> --}}
            </ul>

        </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Link Payment</h2>
                <ol>
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Link Payment</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Payment Link</h2>
                <p>Pembayaran Tour and Travel</p>
            </div>

            <div class="row"><!-- start row -->
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @foreach($viewpay as $rowpay)
                <div class="col-md-6">
                    <div class ="card">
                        <div class="card-body"><!-- card body start -->
                            <div class="form-group">
                                <label for="">Invoice Order</label>
                                <input type="text" class="form-control"  value="{{ $rowpay->invoice_order }}" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Transaction Id</label>
                                <input type="text" class="form-control"  value="{{ $rowpay->transaction_id }}" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Tipe Pembayaran</label>
                                <input type="text" class="form-control"  value="{{ $rowpay->payment_type }}" required readonly>
                            </div>
                        </div><!-- card body start -->
                    </div><!-- card-->
                </div>

                <div class="col-md-6">
                    <div class ="card">
                        <div class="card-body"><!-- card body start -->
                            <div class="form-group">
                                <label for="">Kode Pembayaran</label>
                                <input type="text" class="form-control"  value="{{ $rowpay->payment_code }}" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Total Pembayaran</label>
                                <input type="text" class="form-control"  value="{{ $rowpay->total }}" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Link PDF Pembayaran</label>
                                <a href="{{ $rowpay->pdf_url}}" class="btn btn-outline-info">{{ $rowpay->pdf_url}}</a>
                            </div>
                        </div><!-- card body -->
                    </div><!-- card -->
                </div>
                @endforeach
            </div><!-- end row -->

        </div><!-- container -->
    </section>
    
</main>

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

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
    $('.table').DataTable();
    } );
    </script>

</body>

</html>