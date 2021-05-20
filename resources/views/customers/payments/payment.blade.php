@extends('customers.layouts-customer.layouts-payment')

@section('title')
    <title>Table Payment Customer</title>
@endsection

@section('breadcrumbs')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Payment</h2>
            <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>payment</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->
@endsection

@section('content')


<!-- ======= Services Section ======= -->
<section class="about">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Payment</h2>
            <p>Pembayaran Tour and Travel</p>
        </div>
        <div class="jumbotron bg-dark">
            <h1 class="display-4 text-white" ><span> <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" style="fill:rgba(255, 255, 0, 255);transform:;-ms-filter:"><path d="M11.001 10H13.001V15H11.001zM11 16H13V18H11z"></path><path d="M13.768,4.2C13.42,3.545,12.742,3.138,12,3.138s-1.42,0.407-1.768,1.063L2.894,18.064 c-0.331,0.626-0.311,1.361,0.054,1.968C3.313,20.638,3.953,21,4.661,21h14.678c0.708,0,1.349-0.362,1.714-0.968 c0.364-0.606,0.385-1.342,0.054-1.968L13.768,4.2z M4.661,19L12,5.137L19.344,19H4.661z"></path></svg></span> Perhatian!</h1>
                
            <p class="lead text-white">Uang atau Dana Anda Tidak Dapat Di kembalikan dan Order Tidak Dapat Dibatalkan Setelah Anda Melakukan Pembayaran.</p>
            <p class="lead text-white">Membayar Berarti Anda Setuju dan Order Akan Segera DiPeroses Sesuai Dengan Tanggal Dan Ketentuan yang Di Berikan.</p>
        </div>
        {{--  --}}
    <div class="row">
        <div class="col-md-6">
            <div class ="card">
                {{-- @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif --}}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Customer</label>
                    <input type="text" class="form-control" name="customer_nama" value="{{ $payment->customer_nama }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Email Customer</label>
                    <input type="email" class="form-control" name="customer_email" value="{{ $payment->customer_email }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Kedatang</label>
                    <input type="text" class="form-control" name="tgl_datang" value="{{ $payment->tgl_datang }}" required readonly>
                </div>
            </div><!-- card body-->
            </div><!-- card-->
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">{{-- start card body--}}
                    <div class="form-group">
                        <label for="">Invoice order</label>
                        <input type="text" class="form-control" name="invoice_order" value="{{ $payment->invoice_order }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" value="{{ $payment->paket->nama}}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Peserta</label>
                        <input type="text" class="form-control" name="jumlah" value="{{ $payment->jumlah }}" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Total Bayar</label>
                        <input type="text" class="form-control" name="total" value="{{ $payment->total }}" required readonly>
                    </div>

                    {{-- <button id="pay-button" class="btn btn-success">Bayar</button> --}}
                    <button id="pay-button" class="btn btn-success btn-lg">
                        <span class="icon text-white-50">
                            <i class="fa fa-dollar"></i>
                        </span>
                    <span class="text">Bayar</span>
                </button>
                    
                </div> {{-- end card body--}}
            </div>{{-- end card--}}
        </div>{{-- end col-md-6 --}}

    </div>{{-- end row --}}
    </div>{{-- end container --}}
</section><!-- End Services Section -->




<section>
    <<div class="container">
        <form action= "{{ route('payment.simpan') }}" id="form-submit" onfocus="paySubmit()" method="post" >
            @csrf
            <input type="hidden" class="form-control" value="{{ auth()->guard('customer')->user()->id }}" name="customer_id" required>
            <input type="hidden" class="form-control" value="{{ $payment->id }}" name="order_id" required>
            <input type="hidden" id="invoice_order" class="form-control" value="{{ old('invoice_order')}}" name="invoice_order" required>
            <input type="hidden" id="transaction_id" class="form-control" value="{{ old('transaction_id') }}" name="transaction_id" required>
            <input type="hidden" id="payment_type" class="form-control" value="{{ old('payment_type') }}" name="payment_type" required>
            <input type="hidden" id="payment_code" class="form-control" value="{{ old('payment_code') }}" name="payment_code" required>
            <input type="hidden" id="pdf_url"  name="pdf_url" class="form-control" value="{{ old('pdf_url') }}" required>
            <input type="hidden" id="total" name="total" class="form-control" value="{{ old('total') }}" required>
            <input type="hidden" id="status"  name="status" class="form-control" value="{{ old('status') }}" required>
            <input type="hidden" id="transaction_time"  name="transaction_time" class="form-control" value="{{ old('transaction_time') }}" required >
        </form>
    </div>
</section>

@endsection

@section('js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-GTn6T8XHx7EujKPz"></script>

    <script type="text/javascript">
        
        function paySubmit() {
            document.getElementById("form-submit").submit();
        }
        
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('<?php echo  $snapToken?? '' ?>', {
                    // Optional
                    onSuccess: function (result){
                         //merubah file json menjadi string
                         var comJson = JSON.stringify(result, null, 2);
                            //merubah file string menjadi object
                            var objJson = JSON.parse(comJson);

                        if(objJson.payment_type == "bank_transfer"){
                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                            document.getElementById('payment_type').value = objJson.payment_type;
                            document.getElementById('payment_code').value = y;
                            document.getElementById('pdf_url').value = objJson.pdf_url;
                            document.getElementById('transaction_id').value = objJson.transaction_id;
                            document.getElementById('invoice_order').value = objJson.order_id;
                            document.getElementById('transaction_time').value = objJson.transaction_time;
                            document.getElementById('total').value = objJson.gross_amount;
                            document.getElementById('status').value = objJson.transaction_status;
                            document.getElementById("form-submit").onfocus();



                        }else{
                        document.getElementById('payment_type').value = objJson.payment_type;
                        document.getElementById('payment_code').value = objJson.payment_code;
                        document.getElementById('pdf_url').value = objJson.pdf_url;
                        document.getElementById('transaction_id').value = objJson.transaction_id;
                        document.getElementById('invoice_order').value = objJson.order_id;
                        document.getElementById('transaction_time').value = objJson.transaction_time;
                        document.getElementById('total').value = objJson.gross_amount;
                        document.getElementById('status').value = objJson.transaction_status;
                        document.getElementById("form-submit").onfocus();

                        }  
                        
                        
                    },
                    // Optional
                    onPending: function(result){
                            //merubah file json menjadi string
                            var comJson = JSON.stringify(result, null, 2);
                            //merubah file string menjadi object
                            var objJson = JSON.parse(comJson);

                        if(objJson.payment_type == "bank_transfer"){
                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                                document.getElementById('payment_type').value = objJson.payment_type;
                                document.getElementById('payment_code').value = y;
                                document.getElementById('pdf_url').value = objJson.pdf_url;
                                document.getElementById('transaction_id').value = objJson.transaction_id;
                                document.getElementById('invoice_order').value = objJson.order_id;
                                document.getElementById('transaction_time').value = objJson.transaction_time;
                                document.getElementById('total').value = objJson.gross_amount;
                                document.getElementById('status').value = objJson.transaction_status;
                                document.getElementById("form-submit").onfocus();



                        }else{
                            document.getElementById('payment_type').value = objJson.payment_type;
                            document.getElementById('payment_code').value = objJson.payment_code;
                            document.getElementById('pdf_url').value = objJson.pdf_url;
                            document.getElementById('transaction_id').value = objJson.transaction_id;
                            document.getElementById('invoice_order').value = objJson.order_id;
                            document.getElementById('transaction_time').value = objJson.transaction_time;
                            document.getElementById('total').value = objJson.gross_amount;
                            document.getElementById('status').value = objJson.transaction_status;
                            document.getElementById("form-submit").onfocus();

                        }  
                    },
                    // Optional
                    onError: function(result){
                         //merubah file json menjadi string
                        var comJson = JSON.stringify(result, null, 2);
                        //merubah file string menjadi object
                        var objJson = JSON.parse(comJson);

                        if(objJson.payment_type == "bank_transfer"){
                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                                document.getElementById('payment_type').value = objJson.payment_type;
                                document.getElementById('payment_code').value = y;
                                document.getElementById('pdf_url').value = objJson.pdf_url;
                                document.getElementById('transaction_id').value = objJson.transaction_id;
                                document.getElementById('invoice_order').value = objJson.order_id;
                                document.getElementById('transaction_time').value = objJson.transaction_time;
                                document.getElementById('total').value = objJson.gross_amount;
                                document.getElementById('status').value = objJson.transaction_status;
                                document.getElementById("form-submit").onfocus();



                        }else{
                            document.getElementById('payment_type').value = objJson.payment_type;
                            document.getElementById('payment_code').value = objJson.payment_code;
                            document.getElementById('pdf_url').value = objJson.pdf_url;
                            document.getElementById('transaction_id').value = objJson.transaction_id;
                            document.getElementById('invoice_order').value = objJson.order_id;
                            document.getElementById('transaction_time').value = objJson.transaction_time;
                            document.getElementById('total').value = objJson.gross_amount;
                            document.getElementById('status').value = objJson.transaction_status;
                            document.getElementById("form-submit").onfocus();

                        }  
                    }
            });
        };

    </script>

<script src="{{ asset('bootstrap-4.5.0-dist/js/jquery.js') }}"></script>

@endsection