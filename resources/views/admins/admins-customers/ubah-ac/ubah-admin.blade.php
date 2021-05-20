@extends('admins.layouts.layout')

@section('title')
    <title>Ubah Data Admin</title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Admin</h1>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-6">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Admin</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.simpanUbah.admin', $userdt->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-user" value="{{$userdt->name}}" id="exampleFirstName" required  placeholder="Masukan Nama..">
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" value="{{$userdt->email}}" id="exampleInputEmail" placeholder="Email.." required readonly>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user" value="{{ old('password') }}"  id="exampleInputPassword" placeholder="Password">
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>

                            <div class="col-sm-6">
                                <input type="password" name="password2" class="form-control form-control-user" value="{{ old('password2') }}" id="exampleRepeatPassword" placeholder="Repeat Password">
                                <p class="text-danger">{{ $errors->first('password2') }}</p>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <button class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-refresh"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                        </div> --}}
                        <div class="form-group">
                            <button class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>{{-- end card mb-4 py-3 border-left-primary --}}
        </div>{{-- end col-md-6 --}}
    </div>{{-- end row --}}
</div>{{-- end container-fluid --}}
@endsection