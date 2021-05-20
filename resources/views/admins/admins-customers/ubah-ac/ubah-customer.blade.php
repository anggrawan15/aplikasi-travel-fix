@extends('admins.layouts.layout')

@section('title')
    <title>Ubah Data Customer</title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Customer</h1>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-6">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Customer</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.simpanUbah.customer', $customerdt->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control form-control-user" value="{{$customerdt->nama}}" id="exampleFirstName" required  placeholder="Masukan Nama..">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" value="{{$customerdt->email}}" id="exampleInputEmail" placeholder="Email.." required readonly>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="no_tlp" class="form-control form-control-user" value="{{$customerdt->no_tlp}}" placeholder="No Telephone.."  required>
                            <p class="text-danger">{{ $errors->first('no_tlp') }}</p>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat Rumah.." required>{{$customerdt->alamat}}</textarea>
                            <p class="text-danger">{{ $errors->first('alamat') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                                @if($customerdt->status == "1")
                                    <span class="badge badge-success">Aktif</span>
                                @elseif($customerdt->status == "0")
                                    <span class="badge badge-warning">Non-Aktif</span>
                                @endif
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="status">
                                        <option selected value="{{ $customerdt->status }}">Pilih..</option>
                                        <option value="1" class="alert alert-success">Aktif</option>
                                        <option value="0" class="alert alert-warning">Non-Aktif</option>
                                    </select>
                                </div>

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