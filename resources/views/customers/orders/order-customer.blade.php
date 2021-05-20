@extends('customers.layouts-customer.layouts-order')

@section('title')
    <title>Form Order Customer</title>
@endsection

@section('breadcrumbs')
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Form Order</h2>
            <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Form-Order</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->
@endsection

@section('content')
<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <form action="{{route('order.input')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- start -->
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" class="form-control" value="{{ auth()->guard('customer')->user()->id }}" name="customer_id" required>
    
                            <div class="form-group">
                                <label for="">Nama Pemesan</label>
                                <input type="text" name="customer_nama" class="form-control" value="{{ auth()->guard('customer')->user()->nama }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                <p class="text-danger">{{ $errors->first('customer_nama') }}</p>
                            </div>
    
                            <div class="form-group">
                                <label for="">email</label>
                                <input type="email" name="customer_email" class="form-control" value="{{ auth()->guard('customer')->user()->email }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                <p class="text-danger">{{ $errors->first('customer_email') }}</p>
                            </div>
    
                            <div class="form-group">
                                <label for="">No Tlp</label>
                                <input type="text" name="customer_notlp" class="form-control" value="{{ auth()->guard('customer')->user()->no_tlp }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                <p class="text-danger">{{ $errors->first('customer_notlp') }}</p>
                            </div>
    
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="customer_alamat" class="form-control" value="{{ auth()->guard('customer')->user()->alamat }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                                <p class="text-danger">{{ $errors->first('customer_alamat') }}</p>
                            </div>
    
                        </div>
                    </div>
                </div><!-- end card-->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
        
                                <input type="hidden" class="form-control" value="{{ $paketw->id }}" name="paket_id" required>
        
                                <div class="form-group">
                                    <label for="">Nama Paket Wisata</label>
                                    <input type="text" class="form-control" name="paket_nama" value="{{ $paketw->nama }}" required readonly>
                                </div>
        
                                <div class="form-group">
                                    <label for="">Jumlah Pengunjung</label>
                                    <select name="jumlah" class="form-control jml_orang">
                                        <option value="">Pilih</option>
                                        @for ($i = $paketw->min; $i <= $paketw->max; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                                </div>
        
                                <div class="form-group" data-provide="datepicker">
                                    <label for="">Tanggal Tour <i class="fa fa-calendar-day"></i></label>
                                    <input type="text" class="form-control" name="tgl_datang" id="tgl_datang" required>
                                    <p class="text-danger">{{ $errors->first('tgl_datang') }}</p>
                                </div>
        
                                <div class="form-group">
                                    <label for="">Harga Total :</label>
                                    <input type="hidden" name="harga" class="form-control harga"
                                        value="{{$paketw->harga}}"
                                        required>
                                    <br>
                                    <h5>
                                        <span class="total badge badge-secondary"></span>
                                    </h5>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Pesan Sekarang!</button>
                                </div>
        
                            </div>
                        </div>
                    </div> {{-- col-md-6 --}}
            </div>{{-- end row --}}
        </form> {{-- end form --}}
    </div>{{-- end container --}}
</section><!-- End Portfolio Details Section -->
@endsection

@section('js')

    <script>
        $('#tgl_datang').datepicker({
            "dateFormat": 'dd-mm-yy',
            "todayHighlight": true,
            "setDate": new Date(),
            "minDate": 'tomorrow',
            "autoclose": true

        })

        $(function () {
            $('.jml_orang').change(function () {
                let jml = this.value;
                let perorang = $('.harga').val();
                if (jml !== '') {
                    total = $.number(jml * perorang, 2);
                    $('.total').html("Rp. " + total);
                } else {
                    $('.total').html("Tentukan jumlah pengunjung");
                }
            })
        });
    </script>
    
@endsection