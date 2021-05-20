@extends('admins.layouts.layout')

@section('title')
    <title>Table Paymnet Admin</title>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Payment</h1>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Payment</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice-Order</th>
                                    <th>transaction Id</th>
                                    <th>Order-id</th>
                                    <th>Cust-Id</th>
                                    <th>Pay-Code</th>
                                    <th>Pay-Type</th>
                                    <th>Status</th>
                                    <th>Total Payment</th>
                                    <th>Link PDF</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice-Order</th>
                                    <th>transaction Id</th>
                                    <th>Order-id</th>
                                    <th>Cust-Id</th>
                                    <th>Pay-Code</th>
                                    <th>Pay-Type</th>
                                    <th>Status</th>
                                    <th>Total Payment</th>
                                    <th>Link PDF</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                                @php $no = 1; @endphp

                                @forelse ($tabPaymnet as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$row->invoice_order}}</td>
                                    <td>{{$row->transaction_id}}</td>
                                    <td>{{$row->order_id}}</td>
                                    <td>{{$row->customer_id}}</td>
                                    <td>{{$row->payment_code}}</td>
                                    <td>{{$row->payment_type}}</td>
                                    <td>{!! $row->status_payment !!}</td>
                                    <td>Rp {{number_format($row->total)}}</td>
                                    <td><a href="{{$row->pdf_url}}" class="btn btn-outline-info">Link-pdf</a></td>
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
            </div>{{-- card shadow mb-4 --}}


        </div> {{-- end row --}}
    </div>{{-- end col-lg-6 --}}
    

</div>
<!-- /.container-fluid -->
    
@endsection

@section('modal')

@endsection