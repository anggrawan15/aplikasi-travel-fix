<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Customer;
use App\Order;
use App\Payment;
use App\payment_details;
use App\PaymentDetail;
use Illuminate\Support\Str;
use Cookie;
use DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Config;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        //Set Your server key
        Config::$serverKey = 'SB-Mid-server-XxYwNG3zWDPA4eWpHoXqGcka';

        // Uncomment for production environment
        Config::$isProduction = false;

        // Enable sanitization
        Config::$isSanitized = true;

        // Enable 3D-Secure
        Config::$is3ds = true;

    }


    private function getOrders(){
        $carto = json_decode(request()->cookie('order-sl'), true);

        $carto = $carto != '' ? $carto:[];
        return $carto;
    }

    public function index($id){
        $paketw = Paket::find($id);
        return view('customers.orders.order-customer', compact('paketw'));
        // dd($paketw);
    }

    public function inputOrder(Request $request){
        
        $this->validate($request, [
            'customer_nama' => 'required|exists:customers,nama',
            'customer_email' => 'required|exists:customers,email',
            'jumlah' => 'required|integer',
            'paket_id' => 'required',
            'tgl_datang' => 'required',
        ]);

        DB::beginTransaction();

        try{
                $pakett = Paket::find($request->paket_id);
                $customers = Customer::where('email', $request->customer_email)->first();
                $total = $request->jumlah * $request->harga ;

                $cusOrder = Order::create([
                    'customer_id' => $customers->id,
                    'customer_nama' => $customers->nama,
                    'customer_email'=> $customers->email,
                    'customer_alamat'=> $customers->alamat,
                    'customer_notlp' => $customers->no_tlp,
                    'paket_id' => $pakett->id,
                    'jumlah' => $request->jumlah,
                    'status'=> 'memesan',
                    'total'=> $total,
                    'tgl_datang' =>  Carbon::parse($request->tgl_datang)->format('Y-m-d'),
                    'invoice_order'=> Str::random(4) . '-' . time()
                ]);

            DB::commit();

            return redirect(route('customer.home'))->with(['success' => 'Order Sudah Dikirim Dan Sedang Diproses']);

        }catch(\Exception $e){
            // return redirect()->back()->with(['error' => $e->getMessage()]);
            return redirect()->back()->with(['error' => 'Format Tanggal Yang Dimasukan Salah!']);
        }
    }


    // ini tidak di pakai------------------------------------------------------>
    public function cartOrder(Request $request){
        $this->validate($request, [
            'customer_nama' => 'required|exists:customers,nama',
            'customer_email' => 'required|exists:customers,email',
            'jumlah' => 'required|integer',
            'paket_id' => 'required'
        ]);
        try{
            $carto = $this->getOrders();
            
            if($carto && array_key_exists($request->customer_id, $carto)){
                unset($carto[$request->customer_id]);
                return redirect()->back()->with(['error' => 'Paket Sudah Di Cookie! Silahkan Selesaikan Transaksi ']);
            }else{

                $pakett = Paket::find($request->paket_id);
        
                $customers = Customer::where('email', $request->customer_email)->first();

                $total = $request->jumlah * $request->harga ;

                $carto[$request->customer_id]=[
                    'customer_id' => $customers->id,
                    'customer_nama' => $customers->nama,
                    'customer_email'=> $customers->email,
                    'customer_alamat'=> $customers->alamat,
                    'customer_notlp' => $customers->no_tlp,
                    'paket_id' => $pakett->id,
                    'paket_nama' => $pakett->nama,
                    'jumlah' => $request->jumlah,
                    'status'=> 0,
                    'total'=> $total,
                    'tgl_datang' =>  Carbon::parse($request->tgl_datang)->format('d-m-Y'),
                    'invoice'=> Str::random(4) . '-' . time()
                ];

            }
        
        $cookie = cookie('order-sl', json_encode($carto), 2880);
        return redirect(route('order.list'))->cookie($cookie);
            
        }catch(\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        
    }

    public function simpanOrder(Request $request){
        
        DB::beginTransaction();
        try {
            $carto = $this->getOrders();
            foreach($carto as $rowo){
                $orders = Order::create([
                    'invoice' =>$rowo['invoice'],
                    'customer_nama' => $rowo['customer_nama'],
                    'customer_email' => $rowo['customer_email'],
                    'customer_alamat' => $rowo['customer_alamat'],
                    'customer_notlp' => $rowo['customer_notlp'],

                    'jumlah' => $rowo['jumlah'],
                    'total' => $rowo['total'],

                    'tgl_datang' =>  Carbon::parse($rowo['tgl_datang'])->format('Y-m-d'),
                    'status' => $rowo['status'],

                    'customer_id' => $rowo['customer_id'],
                    'paket_id' => $rowo['paket_id'],

                ]);
            }
            DB::commit();

            $carto = [];

            $cookie = cookie('order-sl', json_encode($carto), 2880);
            return redirect()->back()->cookie($cookie)->with(['success' => 'Order Sudah Dikirim Dan Sedang Diproses']);
            
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        
    }
    //end tidak di pakai--------------------------------->


    //ini juga tdk di pakai----------------------------->>
    public function list(){
        $list = $this->getOrders();
        return view('orders.form-order', compact('list'));
        // dd($list);
    }
    public function hapusCart($id){
        $carto = $this->getOrders();
        unset($carto[$id]);
         // set kembali cookie-nya seperti sebelumnya
        $cookie = cookie('order-sl', json_encode($carto), 2880);
         // dan store ke browser
        return redirect()->back()->cookie($cookie)->with(['success' => 'Order Berhasil Di Hapus']);
    }
    //end ini juga tdk di pakai-------------------------->>


    // public function test(){
    //     $test = $this->getOrders();
    //     return view('orders.checkout',compact('test'));
    //     // dd($test);
    // }

    

    public function order(){
        $orderp = Order::orderBy('created_at','DESC')->with(['paket'])->where([
            ['customer_id', auth()->guard('customer')->user()->id],
            ])->paginate(5);

        return view('orders.order', compact('orderp'));
        // dd($orderp);
    }

    public function batal($id){
        $orderb = Order::find($id);

        $orderb->update(['status' => 'dibatalkan']);
        return redirect()->back()->with(['success' => 'Order Berhasil Di Batalkan']);
    }

    public function viewPayment($id){
        
        $viewpay = Payment::orderBy('created_at','DESC')->where('order_id',$id)->get();

        return view('customers.payments.link-payment', compact('viewpay'));
    }


    public function Payment($id){
        
        $payment = Order::find($id);

        try {
            $transaction_details = array(
                'order_id' => $payment->invoice_order,
                'gross_amount' => $payment->total, 
            );

            $customer_details = array(
                'first_name'    => $payment->customer_nama,
                'email'         => $payment->customer_email,
                'phone'         => $payment->customer_notlp,
                
            );
    
            $enable_payments = array('bca_va','bni_va','bri_va','bca_klikbca','mandiri_clickpay','cimb_clicks','indomaret','alfamart');
    
           
            $transaction = array(
                'enabled_payments' => $enable_payments,
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
            );
    
            $snapToken = Snap::getSnapToken($transaction); 

            return view('customers.payments.payment',compact('payment','snapToken'));
            dd($snapToken);

        } catch (\Exception $e) {
            
            return view('customers.payments.payment',compact('payment'))->with(['success'=>'Sedang Menunggu Pembayaran!']);
        }

       
        
        
        // dd($snapToken);
        // return redirect(route('lihatdata'))->with('nama', $snapToken);

        // dd(['status', $snapToken]);
        
    }

    // public function lihatdata(){
    //     return view('orders.payments.payment');
    // }

    

    // public function payment(Request $request){

    //     DB::beginTransaction();
    //     try{
    //         $payment = Payment::create([
    //             'invoice_order' => $request->invoice_order,
    //             'order_id' => $request->order_id,

    //             'total' => $request->total,
    //             'status' => 0,
    //         ]);

    //         DB::commit();


    //     }catch(\Exception $e){
    //         DB::rollback();
    //         return redirect()->back()->with(['error' => $e->getMessage()]);
    //     }

    // }

    public function simpanPayment(Request $request){
        $this->validate($request, [
            'invoice_order' => 'required|string|max:255',
            'transaction_id' => 'required|string|max:255',
            'payment_type' => 'required|string|max:255',
            'payment_code' => 'required|string|max:255',
            'pdf_url' => 'required|string|max:255',
            'transaction_time' => 'required|string|max:255'
            //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
        ]);

        $simpanPay = Payment::create([
            'order_id' => $request->order_id,
            'customer_id'=>$request->customer_id,
            'invoice_order' => $request->invoice_order,
            'transaction_id'  => $request->transaction_id,
            'payment_type' => $request->payment_type,
            'payment_code' => $request->payment_code,
            'pdf_url' => $request->pdf_url,
            'transaction_time' => $request->transaction_time,
            'total' => $request->total,
            'status' => $request->status,
        ]);

        $simstatus = Order::find($request->order_id);

        $simstatus->update(['status' => 'menunggu-pembayaran']);
    

        return redirect(route('customer.home'))->with(['success' => 'Silahkan Melakukan Pembayaran']);
    }

    function paymentDetail(Request $request){

        $contents = $request->getContent();
        $arr = json_decode($contents);
        if (PaymentDetail::where('order_id', '=', $arr->order_id)->count() > 0) {

            $payment = Payment::where('invoice_order', $arr->order_id)->first();
            $payment->update([
                'status' => $arr->transaction_status
            ]);

            $ubahOrder = Order::where('invoice_order', $arr->order_id)->first();
            if($arr->transaction_status == 'pending'){
                $ubahOrder->update([
                    'status' => 'menunggu-pembayaran',
                ]);
            }elseif($arr->transaction_status == 'expire'){
                $ubahOrder->update([
                    'status' => 'dibatalkan',
                ]);
            }elseif($arr->transaction_status == 'cancel'){
                $ubahOrder->update([
                    'status' => 'dibatalkan',
                ]);
            }elseif($arr->transaction_status == 'deny'){
                $ubahOrder->update([
                    'status' => 'dibatalkan',
                ]);
            }elseif($arr->transaction_status == 'capture'){
                $ubahOrder->update([
                    'status' => 'terbayar',
                ]);
            }elseif($arr->transaction_status == 'settlement'){
                $ubahOrder->update([
                    'status' => 'terbayar',
                ]);
            }
         }
            
         PaymentDetail::create([
            'status_code' => $arr->status_code,
            'status_message' => $arr->status_message,
            'bank' => (isset($arr->bank) ? $arr->bank : '-'),
            'transaction_id' => $arr->transaction_id,
            'order_id' => $arr->order_id,
            'gross_amount' => $arr->gross_amount,
            'payment_type' => $arr->payment_type,
            'transaction_time' => $arr->transaction_time,
            'transaction_status' => $arr->transaction_status,
            'fraud_status' => (isset($arr->fraud_status) ? $arr->fraud_status : '-'),
            'masked_card' => (isset($arr->masked_card) ? $arr->masked_card : '-'),
            'card_type' => (isset($arr->card_type) ? $arr->card_type : '-'),
            'store' => (isset($arr->store) ? $arr->store : '-'),
        ]);
    }

    




}
