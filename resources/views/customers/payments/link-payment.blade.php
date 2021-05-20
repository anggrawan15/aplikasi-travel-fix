@extends('customers.layouts-customer.layouts-payment')

@section('title')
    <title>Table Payment Customer</title>
@endsection

@section('breadcrumbs')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Link Payment</h2>
            <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Link Payment</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->
@endsection

@section('content')
<section class="about">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Payment Link</h2>
            <p>Link Pembayaran Tour and Travel</p>
        </div>
        <div class="jumbotron bg-dark">
            <h1 class="display-4 text-white" ><span> <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" style="fill:rgba(255, 255, 0, 255);transform:;-ms-filter:"><path d="M11.001 10H13.001V15H11.001zM11 16H13V18H11z"></path><path d="M13.768,4.2C13.42,3.545,12.742,3.138,12,3.138s-1.42,0.407-1.768,1.063L2.894,18.064 c-0.331,0.626-0.311,1.361,0.054,1.968C3.313,20.638,3.953,21,4.661,21h14.678c0.708,0,1.349-0.362,1.714-0.968 c0.364-0.606,0.385-1.342,0.054-1.968L13.768,4.2z M4.661,19L12,5.137L19.344,19H4.661z"></path></svg></span> Perhatian!</h1>
                
            <p class="lead text-white">Uang atau Dana Anda Tidak Dapat Di kembalikan dan Order Tidak Dapat Dibatalkan Setelah Anda Melakukan Pembayaran.</p>
            <p class="lead text-white">Membayar Berarti Anda Setuju dan Order Akan Segera DiPeroses Sesuai Dengan Tanggal Dan Ketentuan yang Di Berikan.</p>
            
        </div>
        <div class="row"><!-- start row -->
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @foreach($viewpay as $rowpay)
            <div class="col-md-6">
                <div class ="card">
                    <div class="card-body"><!-- card body start -->
                        <div class="form-group">
                            <label for="">Invoice Order</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->invoice_order }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Transaction Id</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->transaction_id }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Tipe Pembayaran</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->payment_type }}" required readonly>
                        </div>
                    </div><!-- end card body-->
                </div><!-- end card-->
            </div>

            <div class="col-md-6">
                <div class ="card">
                    <div class="card-body"><!-- card body start -->
                        <div class="form-group">
                            <label for="">Kode Pembayaran</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->payment_code }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Total Pembayaran</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->total }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Link PDF Pembayaran</label>
                            <a href="{{ $rowpay->pdf_url}}" class="btn btn-outline-info">{{ $rowpay->pdf_url}}</a>
                        </div>
                    </div><!-- card body -->
                </div><!-- card -->
            </div>
            @endforeach
        </div><!-- end row -->

    </div><!-- container -->
</section>

@endsection

@section('js')
<script>
$(document).ready(function() {
$('.table').DataTable();
} );
</script>
@endsection