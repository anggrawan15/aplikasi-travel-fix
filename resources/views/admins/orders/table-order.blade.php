@extends('admins.layouts.layout')

@section('title')
    <title>Table Orders</title>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Order</h1>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-12">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice Order</th>
                                    <th>Nama Customer</th>
                                    <th>Email Customer</th>
                                    <th>No Tlp Customer</th>
                                    <th>Tanggal Tour</th>
                                    <th>Status</th>
                                    <th>Pengunjung</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice Order</th>
                                    <th>Nama Customer</th>
                                    <th>Email Customer</th>
                                    <th>No Tlp Customer</th>
                                    <th>Tanggal Tour</th>
                                    <th>Status</th>
                                    <th>Pengunjung</th>
                                    <th>Total</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                                @php $no = 1; @endphp

                                @forelse ($tabOrder as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$row->invoice_order}}</td>
                                    <td>{{$row->customer_nama}}</td>
                                    <td>{{$row->customer_email}}</td>
                                    <td>{{$row->customer_notlp}}</td>
                                    <td>{{ $row->tgl_datang }}</td>
                                    <td>{!! $row->status_order !!}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>Rp {{number_format($row->total)}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
        
                                    
                                    
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>{{-- card shadow mb-4 --}}


        </div> {{-- end row --}}
    </div>{{-- end col-lg-6 --}}
    

</div>
<!-- /.container-fluid -->
    
@endsection

@section('modal')
    <!-- Logout Modal-->
    @forelse($tabOrder as $row)

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Hapus" Jika Anda Yakin Ingin Penghapus data.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="#" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="#" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforelse
        
@endsection