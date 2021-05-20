<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Customer</title>

   <!-- Custom fonts for this template-->
   <link href="{{asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{asset('sb-admin-2/vendor/font-aws-4.7/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
   <link
       href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
       rel="stylesheet">

   <!-- Custom styles for this template-->
   {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}
   <!-- Custom styles for this template-->
   <link href="{{asset('sb-admin-2/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-header">
                <a href="{{url('/')}}" >
                    <i class="fa fa-arrow-left"></i>
                    <span>Back Home</span>
                </a>
            </div>
            <div class="card-body p-0">
                @if (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="{{ asset('icon/registers.jpg') }}" alt=""  class="img-fluid" ></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('customer.register') }}" method="post">
                                @csrf
                                {{-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control form-control-user" value="{{ old('nama') }}" id="exampleFirstName" required  placeholder="Masukan Nama..">
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>
                            
                                <div class="form-group">
                                    {{-- <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address"> --}}
                                    <input type="email" name="email" class="form-control form-control-user" value="{{ old('email') }}" id="exampleInputEmail" placeholder="Alamat Email.." required>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="no_tlp" class="form-control form-control-user" value="{{ old('no_tlp') }}" placeholder="No Telephone.."  required>
                                    <p class="text-danger">{{ $errors->first('no_tlp') }}</p>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat Rumah.." required>{{ old('alamat') }}</textarea>
                                    <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        {{-- <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password"> --}}
                                        <input type="password" name="password" class="form-control form-control-user" value="{{ old('password') }}"  id="exampleInputPassword" placeholder="Password"required>
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    </div>

                                    <div class="col-sm-6">
                                        {{-- <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password"> --}}
                                        <input type="password" name="password2" class="form-control form-control-user" value="{{ old('password2') }}" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                        <p class="text-danger">{{ $errors->first('password2') }}</p>
                                    </div>
                                </div>

                                {{-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> --}}

                                <div class="form-group">
                                    <button class="btn btn-primary btn-user btn-block">Register Account</button>
                                </div>

                                {{-- <hr> --}}
                                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>
                            <hr>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center">
                                <a class="small" href="{{ route('customer.loginForm') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sb-admin-2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('sb-admin-2/js/sb-admin-2.min.js')}}"></script>

</body>

</html>