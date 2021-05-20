@extends('admins.layouts.layout')

@section('title')
    Tinjau Order
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cards</h1>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-6">
            <form action="{{route('admin.order.update', $viewOrder->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                        <div class="form-group">
                            <label for="invoice">Invoice Order</label>
                            <input type="text" name="invoice_order" class="form-control" value="{{ $viewOrder->invoice_order }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="customer_email">Email Customer</label>
                            <input type="text" name="customer_email" class="form-control" value="{{ $viewOrder->customer_email }}" required readonly>
                            <p class="text-danger">{{ $errors->first('customer_email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="customer_notlp">No Tlp Customer</label>
                            <input type="text" name="customer_notlp" class="form-control" value="{{ $viewOrder->customer_notlp }}" required readonly>
                            <p class="text-danger">{{ $errors->first('customer_notlp') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="customer_nama">Nama Customer</label>
                            <input type="text" name="customer_nama" class="form-control" value="{{ $viewOrder->customer_nama }}" required readonly>
                            <p class="text-danger">{{ $errors->first('customer_nama') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="customer_alamat">Alamat Customer</label>
                            <input type="text" name="customer_alamat" class="form-control" value="{{ $viewOrder->customer_alamat }}" required readonly>
                            <p class="text-danger">{{ $errors->first('customer_alamat') }}</p>
                        </div>
                       
                    
                </div> {{-- end card body --}}
            </div>{{-- card mb-4 py-3 border-left-primary --}}
        </div>{{-- end col-lg-6 --}}

        <div class="col-lg-6">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <div class="form-group" data-provide="datepicker">
                        <label for="tgl_datang">Tanggal Tour</label>
                        <input type="text" class="form-control" name="tgl_datang" id="tgl_datang" value="{{$viewOrder->tgl_datang}}" readonly>
                        <p class="text-danger">{{ $errors->first('tgl_datang') }}</p>
                    </div>
                    <label for="">Status</label>
                        @if($viewOrder->status == "memesan")
                            <span class="badge badge-secondary">Memesan</span>
                        @elseif($viewOrder->status == 'pesanan-diterima')
                            <span class="badge badge-info">Pesanan Diterima</span>
                        @elseif($viewOrder->status == 'menunggu-pembayaran')
                            <span class="badge badge-warning">Menunggu Pembayaran</span>
                        @elseif($viewOrder->status == 'dibatalkan')
                            <span class="badge badge-danger">Dibatalkan</span>
                        @elseif($viewOrder->status == 'terbayar')
                            <span class="badge badge-success">Telah DiBayar</span>
                        @else
                            <span class="badge badge-success">Selesai</span>
                        @endif
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="status">
                            <option selected value="{{ $viewOrder->status }}">Pilih..</option>
                            <option value="memesan">Memesan</option>
                            <option value="pesanan-diterima">Pesanan Diterima</option>
                            <option value="menunggu-pembayaran">Menunggu Pembayaran</option>
                            <option value="dibatalkan">Dibatalkan</option>
                            <option value="terbayar">Telah Di Bayar</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Pengunjung</label>
                        <input type="text" name="jumlah" class="form-control" value="{{ $viewOrder->jumlah }}" required readonly readonly>
                        <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" name="total" class="form-control" value="{{ $viewOrder->total }}" required readonly readonly>
                        <p class="text-danger">{{ $errors->first('total') }}</p>
                    </div>
                    <div class="form-group">
                        <!-- <button class="btn btn-primary btn-sm">Ubah</button> -->
                        <button class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="text">Update</span>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


    
@endsection