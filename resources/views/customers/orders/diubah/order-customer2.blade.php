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
            <li><a href="{{url('resto')}}">Restourand</a></li>
            <li class="active"><a href="{{url('paket')}}">Paket</a></li>
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
      
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
          <h2>Order</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Order</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <form action="{{route('order.input')}}" method="post">
                @csrf
            <div class="row">
                
                <div class="col-md-6">
                    <!-- start -->
                    <div class="card">
                        <div class="card-body">
                        
                            <input type="hidden" class="form-control" value="{{ auth()->guard('customer')->user()->id }}" name="customer_id" required>
    
                            <div class="form-group">
                                <label for="">Nama Pemesan</label>
                                <input type="text" name="customer_nama" class="form-control" value="{{ auth()->guard('customer')->user()->nama }}" required readonly>
                                <p class="text-danger">{{ $errors->first('customer_nama') }}</p>
                            </div>
    
                            <div class="form-group">
                                <label for="">email</label>
                                <input type="email" name="customer_email" class="form-control" value="{{ auth()->guard('customer')->user()->email }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                <p class="text-danger">{{ $errors->first('customer_email') }}</p>
                            </div>
    
                            <div class="form-group">
                                <label for="">No Tlp</label>
                                <input type="text" name="customer_notlp" class="form-control" value="{{ auth()->guard('customer')->user()->no_tlp }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                <p class="text-danger">{{ $errors->first('customer_notlp') }}</p>
                            </div>
    
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="customer_alamat" class="form-control" value="{{ auth()->guard('customer')->user()->alamat }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                <p class="text-danger">{{ $errors->first('customer_alamat') }}</p>
                            </div>
    
                        </div>
                    </div>
    
                    <!-- end -->
                </div>

                    <div class="col-md-6">
                        <!-- start -->
                        <div class="card">
                            <div class="card-body">
        
                                <input type="hidden" class="form-control" value="{{ $paketw->id }}" name="paket_id" required>
        
                                <div class="form-group">
                                    <label for="">Nama Paket Wisata</label>
                                    <input type="text" class="form-control" name="paket_nama" value="{{ $paketw->nama }}" required readonly>
                                </div>
        
                                <div class="form-group">
                                    <label for="">Jumlah Pengunjung</label>
                                    <select name="jumlah" class="form-control jml_orang">
                                        <option value="">Pilih</option>
                                        @for ($i = $paketw->min; $i <= $paketw->max; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                                </div>
        
                                <div class="form-group" data-provide="datepicker">
                                    <label for="">Tanggal Tour</label>
                                    <input type="text" class="form-control" name="tgl_datang" id="tgl_datang" required>
                                    <p class="text-danger">{{ $errors->first('tgl_datang') }}</p>
                                </div>
        
                                <div class="form-group">
                                    <label for=""> Harga Total :</label>
                                    <input type="hidden" name="harga" class="form-control harga"
                                          value="{{$paketw->harga}}"
                                          required>
                                    <br>
                                    <h5>
                                        <span class="total badge badge-secondary"></span>
                                    </h5>

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Pesan Sekarang!</button>
                                </div>
        
                            </div>
                        </div>
        
                        <!-- end -->
                    </div>
            </div>
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

    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/js/smoothness/jquery-ui.css')}}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery/jquery-1-12-4.js')}}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery-ui.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"
            integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA=="
            crossorigin="anonymous"></script>

    
    <script>
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
    </script>
    
    

</body>

</html>