@extends('admins.layouts.layout')

@section('title')
    <title>Edit Table Master Wisata</title>
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Wisata</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-6">

            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <form action="{{ route('wisata.update', $wisata->id) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                        @method('PUT')
                    <div class="card-body">
        
                        <div class="form-group">
                            <label for="nama">Nama Wisata</label>
                            <input type="text" name="nama" class="form-control" value="{{ $wisata->nama }}" required>
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
        
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" value="{{ $wisata->lokasi }}" required>
                            <p class="text-danger">{{ $errors->first('lokasi') }}</p>
                        </div>
        
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                            <textarea name="deskripsi" id="deskripsi" cols="5" rows="5"  class="form-control">{{ $wisata->deskripsi }}</textarea>
                            <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Foto Wisata</label>
                            <br>
                            <!--  TAMPILKAN GAMBAR SAAT INI -->
                            <img src="{{ asset('storage/wisatas/' . $wisata->gambar) }}" width="100px" height="100px" alt="{{ $wisata->nama }}">
                            <hr>
                            <input type="file" name="gambar" class="form-control">
                            <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                            <p class="text-danger">{{ $errors->first('gambar') }}</p>
                        </div>

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
                    

                </div>
            </div>
    </div>


</div>
    
@endsection
