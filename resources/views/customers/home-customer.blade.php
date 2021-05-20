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
                        <a href="{{route('customer.logout')}}" style="background-color: gray;">Logout</a>
                    </li>
                @else
                    <li class="get-started">
                        <a href="{{ route('customer.loginForm') }}">Login</a>
                    </li>
                @endif
                {{-- <li class="get-started" ><a href="#about" >Login</a></li> --}}
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

<main class="main">
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Home Customer</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Customer</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Features Section ======= -->
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
                            <i class="ri-user-3-fill" style="color: #5578ff;" ></i>
                            <h3><a href="{{route('customer.profil', auth()->guard('customer')->user()->id)}}">Profil</a></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-suitcase-2-fill" style="color: #e80368;"></i>
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

            <div id="hero">
                <div class="row">
                    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Selamat Datang Di Halaman customer</h1>
                        <h2 data-aos="fade-up" data-aos-delay="400">Ayo Pesan Sekarang!</h2>
                        <div data-aos="fade-up" data-aos-delay="800">
                            <a href="{{url('paket')}}" class="btn-get-started scrollto bg-success text-light">Pesan Paket</a>
                        </div>
                    </div>
                        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                            <img src="{{ asset('icon/icon1.png') }}" class="img-fluid animated" alt="">
                        </div>
                </div>
            </div>
        </div>
    </section><!-- End Features Section -->

    <section id="more-services" class="more-services">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Table Order</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Nama Paket</th>
                            <th>Status</th>
                            <th>Tanggal Tour</th>
                            <th>Jumlah Peserta</th>
                            <th>Total Pembayaran</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
        
                    <tfoot class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Nama Paket</th>
                            <th>Status</th>
                            <th>Tanggal Tour</th>
                            <th>Jumlah Peserta</th>
                            <th>Total Pembayaran</th>
                            <th>Tools</th>
                        </tr>
                    </tfoot>
        
        
                    <tbody>
                    @php $no = 1; @endphp
                    @forelse ($orderc as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$row->invoice_order}}</td>
                            <td>{{$row->paket->nama}}</td>
                            <td>{!! $row->status_order !!}</td>
                            <td>{{ $row->tgl_datang }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>Rp {{number_format($row->total)}}</td>
        
                            
                            <td class="form-inline">
                                    @if($row->status == 'memesan')
        
                                    <form action="{{ route('order.batal', $row->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                    </form>
        
                                    @elseif($row->status == 'pesanan-diterima')
        
                                        <div class="btn-group">
                                            <form action="{{ route('order.payment.bayar', $row->id) }}" method="get">
                                            @csrf
                                                <button class="btn btn-success">Bayar</button>
                                            </form>
        
                                            <form action="{{ route('order.batal', $row->id)}}" method="post">
                                            @csrf
                                                <button class="btn btn-danger"onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                            </form>
                                        </div>
        
                                    @elseif($row->status == 'menunggu-pembayaran')
                                        <div class="mb-2">
                                            <form action="{{ route('order.payment.view', $row->id)}}" method="GET">
                                            @csrf
                                                <button class="btn btn-info">Link-pembayaran</button>
                                            </form>
                                            {{-- <a href="{{ route('order.payment.view', $row->id)}}" class="btn btn-info">Link-pembayaran</a> --}}
        
                                            <form action="{{ route('order.batal', $row->id)}}" method="post" class="text-center">
                                            @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                            </form>
                                        </div>
                                    
                                    @elseif($row->status == "dibatalkan")
                                        <p class="text-danger">Maaf Order Ini Dibatalkan!</p>
        
                                    @elseif($row->status == "terbayar")
                                        <p class="text-success">
                                            <strong>Silahakan Tour Pada Tanggal : {{$row->tgl_datang}}
                                            </strong>
                                        </p>
                                
                                    @else
                                        <p class="text-success">Order Ini Telah Selesai,Terimakasih!</p>
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

    <!-- ======= Hero Section ======= -->
    {{-- <section id="hero" class="d-flex align-items-center">
        <div class="container">
             <div class="section-title" data-aos="fade-up">
                <h2>Home</h2>
                <p></p>
            </div>
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Selamat Datang Di Halaman customer</h1>
            <h2 data-aos="fade-up" data-aos-delay="400">Ayo Pesan Sekarang!</h2>
            <div data-aos="fade-up" data-aos-delay="800">
                <a href="#about" class="btn-get-started scrollto bg-success text-light">Pesan Paket</a>
            </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
            <img src="{{ asset('icon/icon1.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
        </div>

    </section><!-- End Hero --> --}}

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
        });
    </script>

</body>

</html>