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
            <li class="active"><a href="{{url('hotel')}}">Hotel</a></li>
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
      
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Payment</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>payment</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    {{-- <section class="inner-page">
      <div class="container">
        <p>
          Example inner page template
        </p>
      </div>
    </section> --}}

    <!-- ======= Services Section ======= -->
    <section class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Payment</h2>
                <p>Pembayaran Tour and Travel</p>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class ="card">
                  @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif

                <div class="card-body">
                  <!-- start -->
                  <div class="form-group">
                    <label for="">Nama Customer</label>
                    <input type="text" class="form-control" name="customer_nama" value="{{ $payment->customer_nama }}" required readonly>
                  </div>

                  <div class="form-group">
                    <label for="">Email Customer</label>
                    <input type="email" class="form-control" name="customer_email" value="{{ $payment->customer_email }}" required readonly>
                  </div>

                  <div class="form-group">
                    <label for="">Tanggal Kedatang</label>
                    <input type="text" class="form-control" name="tgl_datang" value="{{ $payment->tgl_datang }}" required readonly>
                  </div>

                <!-- End -->
                </div>
                </div>
            </div>

            <div class="col-md-6">
              <div class="card">
              <div class="card-body">{{-- start card body--}}
                <div class="form-group">
                  <label for="">Invoice order</label>
                  <input type="text" class="form-control" name="invoice_order" value="{{ $payment->invoice_order }}" required readonly>
                </div>
                <div class="form-group">
                  <label for="">Nama Paket</label>
                  <input type="text" class="form-control" name="nama_paket" value="{{ $payment->paket->nama}}" required readonly>
                </div>

                <div class="form-group">
                  <label for="">Jumlah Peserta</label>
                  <input type="text" class="form-control" name="jumlah" value="{{ $payment->jumlah }}" required readonly>
                </div>


                <div class="form-group">
                  <label for="">Total Bayar</label>
                  <input type="text" class="form-control" name="total" value="{{ $payment->total }}" required readonly>
                </div>

                <button id="pay-button" class="btn btn-success">Bayar</button>
              </div> {{-- end card body--}}
              </div>
            </div>

        </div>
        </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->

  <section>
    <<div class="container">
        <form action= "{{ route('payment.simpan') }}" id="form-submit" onfocus="paySubmit()" method="post" >
            @csrf
            <input type="hidden" class="form-control" value="{{ auth()->guard('customer')->user()->id }}" name="customer_id" required>
        
            <input type="hidden" class="form-control" value="{{ $payment->id }}" name="order_id" required>

            <input type="hidden" id="invoice_order" class="form-control" value="{{ old('invoice_order')}}" name="invoice_order" required>

            <input type="hidden" id="transaction_id" class="form-control" value="{{ old('transaction_id') }}" name="transaction_id" required>

            <input type="hidden" id="payment_type" class="form-control" value="{{ old('payment_type') }}" name="payment_type" required>

            <input type="hidden" id="payment_code" class="form-control" value="{{ old('payment_code') }}" name="payment_code" required>
            <input type="hidden" id="pdf_url"  name="pdf_url" class="form-control" value="{{ old('pdf_url') }}" required>

            <input type="hidden" id="total" name="total" class="form-control" value="{{ old('total') }}" required>

            <input type="hidden" id="status"  name="status" class="form-control" value="{{ old('status') }}" required>

            <input type="hidden" id="transaction_time"  name="transaction_time" class="form-control" value="{{ old('transaction_time') }}" required >
        </form>
    </div>
</section>

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

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-GTn6T8XHx7EujKPz"></script>

    <script type="text/javascript">
        
        function paySubmit() {
            document.getElementById("form-submit").submit();
        }
        
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('<?php echo  $snapToken?? '' ?>', {
                    // Optional
                    onSuccess: function (result){
                         //merubah file json menjadi string
                         var comJson = JSON.stringify(result, null, 2);
                            //merubah file string menjadi object
                            var objJson = JSON.parse(comJson);

                        if(objJson.payment_type == "bank_transfer"){
                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                            document.getElementById('payment_type').value = objJson.payment_type;

                            document.getElementById('payment_code').value = y;
                            document.getElementById('pdf_url').value = objJson.pdf_url;
                            document.getElementById('transaction_id').value = objJson.transaction_id;

                            document.getElementById('invoice_order').value = objJson.order_id;
                            document.getElementById('transaction_time').value = objJson.transaction_time;

                            document.getElementById('total').value = objJson.gross_amount;

                            document.getElementById('status').value = objJson.transaction_status;

                            document.getElementById("form-submit").onfocus();



                        }else{
                        document.getElementById('payment_type').value = objJson.payment_type;
                        document.getElementById('payment_code').value = objJson.payment_code;
                        document.getElementById('pdf_url').value = objJson.pdf_url;
                        document.getElementById('transaction_id').value = objJson.transaction_id;
                        document.getElementById('invoice_order').value = objJson.order_id;
                        document.getElementById('transaction_time').value = objJson.transaction_time;

                        document.getElementById('total').value = objJson.gross_amount;
                        document.getElementById('status').value = objJson.transaction_status;
                        document.getElementById("form-submit").onfocus();

                        }  
                        
                        
                    },
                    // Optional
                    onPending: function(result){
                            //merubah file json menjadi string
                            var comJson = JSON.stringify(result, null, 2);
                            //merubah file string menjadi object
                            var objJson = JSON.parse(comJson);

                        if(objJson.payment_type == "bank_transfer"){
                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                                document.getElementById('payment_type').value = objJson.payment_type;
                                document.getElementById('payment_code').value = y;
                                document.getElementById('pdf_url').value = objJson.pdf_url;
                                document.getElementById('transaction_id').value = objJson.transaction_id;

                                document.getElementById('invoice_order').value = objJson.order_id;

                                document.getElementById('transaction_time').value = objJson.transaction_time;

                                document.getElementById('total').value = objJson.gross_amount;
                                document.getElementById('status').value = objJson.transaction_status;

                                document.getElementById("form-submit").onfocus();



                        }else{
                            document.getElementById('payment_type').value = objJson.payment_type;

                            document.getElementById('payment_code').value = objJson.payment_code;

                            document.getElementById('pdf_url').value = objJson.pdf_url;
                            document.getElementById('transaction_id').value = objJson.transaction_id;

                            document.getElementById('invoice_order').value = objJson.order_id;
                            document.getElementById('transaction_time').value = objJson.transaction_time;

                            document.getElementById('total').value = objJson.gross_amount;
                            document.getElementById('status').value = objJson.transaction_status;

                            document.getElementById("form-submit").onfocus();

                        }  
                    },
                    // Optional
                    onError: function(result){
                         //merubah file json menjadi string
                        var comJson = JSON.stringify(result, null, 2);
                        //merubah file string menjadi object
                        var objJson = JSON.parse(comJson);

                        if(objJson.payment_type == "bank_transfer"){
                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                                document.getElementById('payment_type').value = objJson.payment_type;

                                document.getElementById('payment_code').value = y;
                                document.getElementById('pdf_url').value = objJson.pdf_url;
                                document.getElementById('transaction_id').value = objJson.transaction_id;

                                document.getElementById('invoice_order').value = objJson.order_id;

                                document.getElementById('transaction_time').value = objJson.transaction_time;

                                document.getElementById('total').value = objJson.gross_amount;
                                document.getElementById('status').value = objJson.transaction_status;

                                document.getElementById("form-submit").onfocus();



                        }else{
                            document.getElementById('payment_type').value = objJson.payment_type;

                            document.getElementById('payment_code').value = objJson.payment_code;

                            document.getElementById('pdf_url').value = objJson.pdf_url;
                            document.getElementById('transaction_id').value = objJson.transaction_id;

                            document.getElementById('invoice_order').value = objJson.order_id;
                            document.getElementById('transaction_time').value = objJson.transaction_time;

                            document.getElementById('total').value = objJson.gross_amount;
                            document.getElementById('status').value = objJson.transaction_status;

                            document.getElementById("form-submit").onfocus();

                        }  
                    }
            });
        };

    </script>

<script src="{{ asset('bootstrap-4.5.0-dist/js/jquery.js') }}"></script>
</body>

</html>