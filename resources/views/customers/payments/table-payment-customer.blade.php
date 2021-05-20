@extends('customers.layouts-customer.layouts-payment')

@section('title')
    <title>Table Payment Customer</title>
@endsection

@section('breadcrumbs')
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Table Payment</h2>
            <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Table-Payment</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->
@endsection

@section('content')

<section id="more-services" class="more-services">
    <div class="container">
            <div class="section-title" data-aos="fade-up">
            <h2>Table Payment</h2>
            </div>
    
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Invoice-Order</th>
                        <th>transaction Id</th>
                        <th>Payment Code</th>
                        <th>Payment Type</th>
                        <th>Status</th>
                        <th>Total Payment</th>
                        <th>Link PDF</th>
                        {{-- <th>Tools</th> --}}
                    </tr>
                </thead>
    
                <tfoot class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Invoice-Order</th>
                        <th>transaction Id</th>
                        <th>Payment Code</th>
                        <th>Payment Type</th>
                        <th>Status</th>
                        <th>Total Payment</th>
                        <th>Link PDF</th>
                        {{-- <th>Tools</th> --}}
                    </tr>
                </tfoot>
    
    
                <tbody>
                @php $no = 1; @endphp
                @forelse ($paymentcus as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$row->invoice_order}}</td>
                        <td>{{$row->transaction_id}}</td>
                        <td>{{ $row->payment_code}}</td>
                        <td>{{ $row->payment_type}}</td>
                        <td>{!! $row->status_payment !!}</td>
                        <td>Rp {{number_format($row->total)}}</td>
                        @if ($row->status == 'pending')
                            <td><a href="{{$row->pdf_url}}" class="btn btn-outline-info">Link-pdf</a></td>
                        @elseif($row->status == 'deny')
                        <td><strong class="text-danger">Order Telah Di Batalkan!</strong></td>
                        @elseif($row->status == 'cancel')
                        <td><strong class="text-danger">Order Telah Di Batalkan!</strong></td>
                        @elseif($row->status == 'expire')
                        <td><strong class="text-danger">Order Telah Di Expire!</strong></td>
                        @elseif($row->status == 'settlement')
                        <td><strong class="text-success">Order Telah Dibayar!</strong></td>
                        @elseif($row->status == 'capture')
                        <td><strong class="text-success">Order Telah Dibayar!</strong></td>
                        @endif
                        
                        
                        {{-- <td class="form-inline">
                            <a href="" class="btn btn-primary">Details</a>
                        </td> --}}
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
</section>

@endsection

@section('js')
<script>
    $(document).ready(function() {
    $('.table').DataTable();
    });
</script>
@endsection