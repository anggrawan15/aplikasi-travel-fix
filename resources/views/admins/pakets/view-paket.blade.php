@extends('admins.layouts.layout')

@section('title')
    <title>Detail Paket</title>
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Tour And Travel</h1>

    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-6">

            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Paket Tour And Travel</h6>
                </div>
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data" >
                        @csrf
                        <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="gambar">Foto</label>
                            <br>
                            <!--  TAMPILKAN GAMBAR SAAT INI -->
                            <img class="mx-auto d-block rounded" src="{{ asset('storage/pakets/' . $paketa->gambar) }}" width="250px" height="150px" alt="{{ $paketa->nama }}">
                            <hr>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Paket</label>
                            <input type="text" name="nama" class="form-control" value="{{ $paketa->nama }}" required readonly>
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
        
                        <div class="form-group">
                            <label for="code">Code Paket</label>
                            <input type="text" name="code" class="form-control" value="{{ $paketa->code }}" required readonly>
                            <p class="text-danger">{{ $errors->first('code') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="min">Minimal Pengunjung</label>
                            <input type="text" name="min" class="form-control" value="{{ $paketa->min  }}" required readonly>
                            <p class="text-danger">{{ $errors->first('min') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="max">Maximal Pengunjung</label>
                            <input type="text" name="max" class="form-control" value="{{ $paketa->max  }}" required readonly>
                            <p class="text-danger">{{ $errors->first('max') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga/Orang</label>
                            <input type="text" name="harga" class="form-control" value="Rp {{ $paketa->harga  }}" required readonly>
                            <p class="text-danger">{{ $errors->first('harga') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control" readonly required>{{ $paketa->deskripsi }}</textarea>
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>

        </div>{{-- end col-6 --}}

        <div class="col-lg-6">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Wisata, Hotel dan Resto </h6>
                </div>
                <div class="card-body">
                    <h6 class="text-secondary"><strong>Destinasi Wisata</strong></h6>
                    @foreach($paketa->wisataItem as $row)
                    <div class="form-inline">
                        <p class="mr-auto">{{ $row->wisata->nama}}</p>
                        <div>
                            <a href="{{route('wisata.detail', $row->wisata_id) }}" class="btn btn-outline-info mr-auto">
                            <i class="fa fa-info-circle"></i>
                            <span >Lihat</span>
                            </a>
                        </div>
                    </div>
                    <hr>
                    @endforeach

                    <h6 class="text-secondary"><strong>Destinasi Hotel</strong></h6>
                    @foreach($paketa->hotelItem as $row)
                    <div class="form-inline">
                        <p class="mr-auto">{{ $row->hotel->nama}}</p>
                        <div>
                            <a href="{{route('hotel.detail', $row->hotel_id) }}" class="btn btn-outline-info mr-auto">
                            <i class="fa fa-info-circle"></i>
                            <span >Lihat</span>
                            </a>
                        </div>
                    </div>
                    <hr>
                    @endforeach

                    <h6 class="text-secondary"><strong>Destinasi Kuliner</strong></h6>
                    @foreach($paketa->restoItem as $row)
                    <div class="form-inline">
                        <p class="mr-auto">{{ $row->resto->nama}}</p>
                        <div>
                            <a href="{{route('resto.detail', $row->resto_id) }}" class="btn btn-outline-info mr-auto">
                            <i class="fa fa-info-circle"></i>
                            <span >Lihat</span>
                            </a>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>{{--- end col-lg-6 --}}
            


    </div>{{--  end row--}}
    


</div>
    
@endsection
