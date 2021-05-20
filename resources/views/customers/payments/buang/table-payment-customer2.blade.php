<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> --}}

    <link rel="stylesheet" href="{{asset('DataTables/media/css/dataTables.bootstrap4.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('')}}"> --}}
    
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

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Home Customer</h2>
                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Table-Payment</li>
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


    <section id="more-services" class="more-services">
        <div class="container">
                <div class="section-title" data-aos="fade-up">
                <h2>Table Payment</h2>
                </div>
        
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Invoice-Order</th>
                            <th>transaction Id</th>
                            <th>Payment Code</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Total Payment</th>
                            <th>Link PDF</th>
                            {{-- <th>Tools</th> --}}
                        </tr>
                    </thead>
        
                    <tfoot class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Invoice-Order</th>
                            <th>transaction Id</th>
                            <th>Payment Code</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Total Payment</th>
                            <th>Link PDF</th>
                            {{-- <th>Tools</th> --}}
                        </tr>
                    </tfoot>
        
        
                    <tbody>
                    @php $no = 1; @endphp
                    @forelse ($paymentcus as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$row->invoice_order}}</td>
                            <td>{{$row->transaction_id}}</td>
                            <td>{{ $row->payment_code}}</td>
                            <td>{{ $row->payment_type}}</td>
                            <td>{!! $row->status_payment !!}</td>
                            <td>Rp {{number_format($row->total)}}</td>
                            <td><a href="{{$row->pdf_url}}" class="btn btn-outline-info">Link-pdf</a></td>
                            
                            {{-- <td class="form-inline">
                                <a href="" class="btn btn-primary">Details</a>
                            </td> --}}
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

    {{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> --}}

    <script src="{{asset('DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('DataTables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
    $(document).ready(function() {
    $('.table').DataTable();
    } );
    </script>
</body>
</html>