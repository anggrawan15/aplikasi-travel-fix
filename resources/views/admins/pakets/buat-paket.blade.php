@extends('admins.layouts.layout')

@section('title')
    <title>Table Master Hotel</title>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Home Admins</h1>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-3">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Master</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <form action="{{ route('wisata.carts') }}" method="post">
                                @csrf
                                <tbody>
                                   
                                    <div class="form-group">
                                        <label for="wisata_id">Wisata</label>
                                            <select name="wisata_id" class="form-control" required>
                                                <option value="">Pilih</option>
                                                @foreach ($wisata as $row)
                                                <option value="{{ $row->id }}" >{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                                <p class="text-danger">{{ $errors->first('wisata_id') }}</p>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="">Lama digunakan</label>
                                        <input type="number" name="jumlah" value="1" class="form-control">
                                    </div> 
            
                                    <button class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-plus-circle"></i>
                                        </span>
                                        <span class="text">Tambah</span>
                                    </button>
                                </tbody>
                            </form>
                            
                                
                        </table>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <form action="{{ route('hotel.carts') }}" method="post">
                                @csrf
                                <tbody>
                                   
                                    <div class="form-group">
                                        <label for="hotel_id">Hotel</label>
                                            <select name="hotel_id" class="form-control" required>
                                                <option value="">Pilih</option>
                                                @foreach ($hotel as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{ $errors->first('hotel_id') }}</p>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="">Lama digunakan</label>
                                            <input type="number" name="jumlah" value="1" class="form-control">
                                    </div> 
                                    
                                    <button class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-plus-circle"></i>
                                        </span>
                                        <span class="text">Tambah</span>
                                    </button>
                                    
                                </tbody>
                            </form>
                            
                                
                        </table>
                    </div>
                </div>

                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <form action="{{ route('resto.carts') }}" method="post">
                                @csrf
                                <tbody>
                                    <div class="form-group">
                                        <label for="resto_id">Restourand</label>
                                            <select name="resto_id" class="form-control" required>
                                                <option value="">Pilih</option>
                                                @foreach ($resto as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{ $errors->first('resto_id') }}</p>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="">Lama digunakan</label>
                                            <input type="number" name="jumlah" value="1" class="form-control">
                                    </div> 
            
                                    <button class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-plus-circle"></i>
                                        </span>
                                        <span class="text">Tambah</span>
                                    </button>
                                </tbody>
                            </form>
                            
                                
                        </table>
                    </div>
                </div>
            </div>{{-- card shadow mb-4 --}}

        </div> {{-- end col-lg-6--}}

        

        <div class="col-lg-4">
            <div class="card shadow mb-4">
    
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Card paket</h6>
                </div>
    
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wisata</th>
                                    <th>Digunakan</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($cartsw as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$row['wisata_nama']}}</td>
                                    <td>{{$row['jumlah']}} X</td>
                                    <td>
                                        <form action="{{ route('paket.hapus.wisata', $row['wisata_id'])}}" method="post">
                                            @csrf
                                        <button class="btn btn-danger btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                </div>{{-- card-body --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Hotel</th>
                                    <th>Digunakan</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($cartsh as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$row['hotel_nama']}}</td>
                                    <td>{{$row['jumlah']}} X</td>
                                    <td>
                                        <form action="{{ route('paket.hapus.hotel', $row['hotel_id'])}}" method="post">
                                            @csrf
                                            <button class="btn btn-danger btn-icon-split btn-sm">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                </div>{{-- card-body --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Restourand</th>
                                    <th>Digunakan</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($cartsr as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$row['resto_nama']}}</td>
                                    <td>{{$row['jumlah']}} X</td>
                                    <td>
                                        <form action="{{ route('paket.hapus.resto', $row['resto_id'])}}" method="post">
                                            @csrf
                                            <button class="btn btn-danger btn-icon-split btn-sm">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                </div>{{-- card-body --}}
            </div>
        </div>{{-- end col-4 --}}
        

        <div class="col-lg-5">
            <div class="card shadow mb-4">
    
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Card paket</h6>
                </div>
                
                <form action="{{ route('paket.simpan') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Paket Wisata</label>
                                <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                                <p class="text-danger">{{ $errors->first('nama') }}</p>
                            </div>
            
                            <div class="form-group">
                                <label for="min">Jumlah Minimum Paket</label>
                                <input id="min" type="number" name="min" class="form-control" value="1" required>
                                <p class="text-danger">{{ $errors->first('min') }}</p>
                            </div>
            
                            <div class="form-group">
                                <label for="max">Jumlah Maximum Paket</label>
                                <input id="max" type="number" name="max" class="form-control" value="1" required>
                                <p class="text-danger">{{ $errors->first('max') }}</p>
                            </div>
            
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input id="harga" type="text" name="harga" class="form-control" value="{{ old('harga') }}" required>
                                <p class="text-danger">{{ $errors->first('harga') }}</p>
                            </div>
            
                            <div class="form-group">
                                <label for="gambar">Foto Paket</label>
                                <input id="gambar" type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" required>
                                <p class="text-danger">{{ $errors->first('gambar') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control"></textarea>
                                <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                            </div>

                            <button class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-floppy-o"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>
                    </div>
                </form>
                
            </div>
            
        </div>{{-- end col-lg-5 --}}




    </div>{{-- end row --}}

    



    

</div>
<!-- /.container-fluid -->
    
@endsection
        
