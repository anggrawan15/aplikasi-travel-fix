@extends('customers.layouts-customer.layouts-order')

@section('title')
    <title>Table Order Customer</title>
@endsection

@section('breadcrumbs')
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Table Order</h2>
            <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Table-Order</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->
@endsection

@section('content')

<section id="more-services" class="more-services">
    <div class="container">
            <div class="section-title" data-aos="fade-up">
            <h2>Table Order</h2>
            </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Nama Paket</th>
                        <th>Status</th>
                        <th>Tanggal Tour</th>
                        <th>Jumlah Peserta</th>
                        <th>Total Pembayaran</th>
                        <th>Tools</th>
                    </tr>
                </thead>
    
                <tfoot class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Invoice Order</th>
                        <th>Nama Paket</th>
                        <th>Status</th>
                        <th>Tanggal Tour</th>
                        <th>Jumlah Peserta</th>
                        <th>Total Pembayaran</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                @php $no = 1; @endphp
                @forelse ($ordercus as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$row->invoice_order}}</td>
                        <td>{{$row->paket->nama}}</td>
                        <td>{!! $row->status_order !!}</td>
                        <td>{{ $row->tgl_datang }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>Rp {{number_format($row->total)}}</td>
    
                        <td class="form-inline">
                            @if($row->status == 'memesan')
                            <form action="{{ route('order.batal', $row->id)}}" method="post">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                            </form>
    
                            @elseif($row->status == 'pesanan-diterima')
                                <div class="btn-group">
                                    <form action="{{ route('order.payment.bayar', $row->id) }}" method="get">
                                    @csrf
                                        <button class="btn btn-success">Bayar</button>
                                    </form>
                                    <form action="{{ route('order.batal', $row->id)}}" method="post">
                                    @csrf
                                        <button class="btn btn-danger"onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                    </form>
                                </div>
    
                            @elseif($row->status == 'menunggu-pembayaran')
                                <div class="mb-2">
                                    <form action="{{ route('order.payment.view', $row->id)}}" method="GET">
                                    @csrf
                                        <button class="btn btn-info">Link-pembayaran</button>
                                    </form>
                                    {{-- <a href="{{ route('order.payment.view', $row->id)}}" class="btn btn-info">Link-pembayaran</a> --}}

                                    <form action="{{ route('order.batal', $row->id)}}" method="post" class="text-center">
                                    @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                    </form>
                                </div>
                                
                                @elseif($row->status == "dibatalkan")
                                    <p class="text-danger">Maaf Order Ini Dibatalkan!</p>
    
                                @elseif($row->status == "terbayar")
                                    <p class="text-success"><strong>Silahakan Tour Pada Tanggal : {{$row->tgl_datang}}</strong></p>
                            
                                @else
                                    <p class="text-success">Order Ini Telah Selesai,Terimakasih!</p>
                                @endif
                        </td>
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