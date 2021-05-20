<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('sb-admin-2/vendor/font-aws-4.7/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}
    <!-- Custom styles for this template-->
    <link href="{{asset('sb-admin-2/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <a href="{{url('/')}}" >
                            <i class="fa fa-arrow-left"></i>
                            <span>Back Home</span>
                        </a>
                    </div>

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                {{-- <img src="" alt="" class="fa fa-user" style="height:100%" > --}}
                                {{-- <img src="{{ asset('icon/user-img.png') }}" alt=""  class="img-fluid"> --}}
                                <img src="{{ asset('icon/users5.png') }}" alt=""  class="img-fluid" >
                                {{-- <i class="fa fa-user-o" aria-hidden="true"></i> --}}
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back Admin!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address...">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input class="custom-control-input" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login Admin
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        {{-- <a class="small" href="{{route('customer.register') }}">Create an Account!</a> --}}
                                    </div>
                                </div>
                            </div><!-- end col-lg-6 -->
                        </div><!-- end Row -->
                    </div>
                </div>

            </div>
        </div>
    </div><!-- end Container -->


<!-- Bootstrap core JavaScript-->
<script src="{{asset('sb-admin-2/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('sb-admin-2/js/sb-admin-2.min.js')}}"></script>

</body>

</html>