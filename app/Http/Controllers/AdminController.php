<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Paket;
use App\Payment;
use App\User;
use Carbon\Carbon;
use Midtrans\Notification;
use Midtrans\Config;
use Midtrans\Transaction;

class AdminController extends Controller
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
        // $notif = new Notification();
        // $transaction = $notif->transaction_status;
        // $type = $notif->payment_type;
        // $order_id = $notif->order_id;
        // $fraud = $notif->fraud_status;
    }

    public function index(){
        $instat = Order::orderBy('created_at','DESC')->where('status', 0)->with(['paket'])->get();
        return view('admins.admin-home', compact('instat'));
    }
    
    public function tableOrder(){
        $tabOrder = Order::orderBy('created_at','DESC')->with(['paket'])->get();
        return view('admins.orders.table-order',compact('tabOrder'));
    }
    public function tablePayment(){
        $tabPaymnet = Payment::orderBy('created_at','DESC')->with(['order'])->get();
        return view('admins.payments.table-payment',compact('tabPaymnet'));
    }

    public function view($id){
        $viewOrder = Order::find($id);
        return view('admins.orders.view-order', compact('viewOrder'));
    }

    public function updateOrder(Request $request, $id){

        $this->validate($request, [
            'customer_nama' => 'required',
            'customer_alamat' => 'required',
            'tgl_datang' => 'required',
            'status' => 'required',         
        ]);

        $ubahOrder = Order::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        
        $ubahOrder->update([
            'customer_nama' => $request->customer_nama,
            'customer_alamat' => $request->customer_alamat,
            'tgl_datang' =>  Carbon::parse($request->tgl_datang)->format('Y-m-d'),
            'status' => $request->status,
        ]);

        return redirect(route('admin.index'))->with(['success' => 'Data Order Berhasil Diubah!']);
    }

    // public function daftarCustomer(){
    //     $dafCust = Customer::orderBy('nama','ASC')->paginate(50);
    //     return view('admins.daftar-customer', compact('dafCust'));
    // }

    // public function daftarCustomer(){
    //     $customers = Customer::orderBy('nama','ASC')->get();
    //     return view('admins.admins-customers.table-data-customer', compact('customers'));
    // }

    public function dataCustomer(){
        $customers = Customer::orderBy('nama','ASC')->get();
        return view('admins.admins-customers.table-data-customer', compact('customers'));
    }

    public function dataAdmin(){
        $users = User::orderBy('name','ASC')->get();
        return view('admins.admins-customers.table-data-admin', compact('users'));
    }

    public function formInputCustomer(){
        return view('admins.admins-customers.tambah-ac.tambah-customer');
    }

    public function tambahCustomer(Request $request){
        $this->validate($request, [
            'nama' =>'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:20',
            'password2' => 'required|string|min:8|max:20',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);

        try{
            $customer = Customer::where('email', $request->email)->first();
            if($request->password == $request->password2){
                $customer = Customer::create([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' =>$request->password,
                    'no_tlp' => $request->no_tlp,
                    'alamat' => $request->alamat,
                    'status' => true,
                ]);
                
                return redirect(route('admin.data.customer'))->with(['success' => 'Register Success, Silahkan Login!']);
            }  
            
            return redirect()->back()->with(['error' => 'Password tidak Sama!']);

        }catch (\Exception $e) {

            return redirect()->back()->with(['error' => 'Email Yang Didaftarkan Sudah Ada! ' ]);

        }    
    }

    public function formInputAdmin(){
        return view('admins.admins-customers.tambah-ac.tambah-admin');
    }

    public function tambahAdmin(Request $request){
        $this->validate($request, [
            'name' =>'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:20',
            'password2' => 'required|string|min:8|max:20',
        ]);

        try{
            $users = User::where('email', $request->email)->first();
            if($request->password == $request->password2){
                $users = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>bcrypt($request->password),
                ]);
                
                return redirect(route('admin.data.admin'))->with(['success' => 'Register Success, Silahkan Login!']);
            }  
            
            return redirect()->back()->with(['error' => 'Password tidak Sama!']);

        }catch (\Exception $e) {

            return redirect()->back()->with(['error' => 'Email Yang Didaftarkan Sudah Ada! ' ]);

        }    
    }

    public function formUbahCustomer($id){
        $customerdt = Customer::find($id);
        return view('admins.admins-customers.ubah-ac.ubah-customer',compact('customerdt'));
    }

    public function simpanUbahCustomer(Request $request, $id){
        $this->validate($request, [
            'nama' =>'required|string|max:100',
            'email' => 'required|email',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);

        try{
            $updateCustomer = Customer::find($id);
            if($request->password == $request->password2){
                $updateCustomer->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' =>$request->password,
                    'no_tlp' => $request->no_tlp,
                    'alamat' => $request->alamat,
                    'status' => $request->status,
                ]);
                
                return redirect(route('admin.data.customer'))->with(['success' => 'Data Customer Berhasil Diubah!']);
            }  
            return redirect()->back()->with(['error' => 'Password tidak Sama!']);
        }catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e ]);
        } 
    }

    public function formUbahAdmin($id){
        $userdt = User::find($id);
        return view('admins.admins-customers.ubah-ac.ubah-admin',compact('userdt'));
    }

    public function simpanUbahAdmin(Request $request, $id){
        $this->validate($request, [
            'name' =>'required|string|max:100',
            'email' => 'required|email',
        ]);

        try{
            $updateAdmin = User::find($id);
            if($request->password == $request->password2){
                $updateAdmin->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
                
                return redirect(route('admin.data.admin'))->with(['success' => 'Data Admin Berhasil Diubah!']);
            }  
            return redirect()->back()->with(['error' => 'Password tidak Sama!']);
        }catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e ]);
        } 
    }
    


    // public function daftarOrder(){
    //     // $dafOrder = Order::orderBy('created_at','DESC')->with(['paket'])->paginate(50);
    //     $dafpay = Order::orderBy('created_at','DESC')->with(['payment'])->where('status', 2)->get();
    //     $updatePay = Payment::orderBy('created_at','DESC')->get();
    //     // $payment = Payment::orderBy('created_at','DESC')->paginate(50);
    //     foreach($updatePay as $upPay){
    //         try {
    //             $status = Transaction::status($upPay->invoice_order);
    //             $dataPay = array($status);
    //             // $apa = json_encode($file);
    //             // $ini = Json_decode($apa);
    //         } catch (Exception $e) {
    //             echo $e->getMessage();
    //             die();
    //         }
    //         foreach($dataPay as $dPay){
    //             // echo "$val->order_id<br>";
    //             // echo $pay->invoice_order
    //             $ubahpay=Payment::find($upPay->id);
    //             if ($upPay->status != $dPay->transaction_status){
    //                 $ubahpay->update([
    //                     'status' => $dPay->transaction_status,
    //                 ]);
    //             }
    //         }
            
    //     }

    //     foreach($dafpay as $dataOrd){
    //         $ubahOrder= Order::find($dataOrd->id);
    //         foreach($dataOrd->payment as $dtorPay){
    //             // echo $row->status;
    //             if($dtorPay->status == 'pending'){
    //                 $ubahOrder->update([
    //                     'status' => 2,
    //                 ]);
    //             }elseif($dtorPay->status == 'expire'){
    //                 $ubahOrder->update([
    //                     'status' => 3,
    //                 ]);
    //             }elseif($dtorPay->status == 'cancel'){
    //                 $ubahOrder->update([
    //                     'status' => 3,
    //                 ]);
    //             }elseif($dtorPay->status == 'deny'){
    //                 $ubahOrder->update([
    //                     'status' => 3,
    //                 ]);
    //             }elseif($dtorPay->status == 'capture'){
    //                 $ubahOrder->update([
    //                     'status' => 'terbayar',
    //                 ]);
    //             }
    //         }
    //     }
    //     $dtOrderpay = Order::orderBy('created_at','DESC')->paginate(50);
    //     return view('admins.daftar-order', compact('dtOrderpay'));
    // }


    // public function orderMemesan(){
    //     $orderPesan = Order::orderBy('created_at','DESC')->where('status', 0)->with(['paket'])->paginate(50);
    //     return view('admins.order-memesan', compact('orderPesan'));
    // }
    

    // public function orderMenunggu(){
    //     $orderTunggu = Order::orderBy('created_at','DESC')->where('status', 1)->with(['paket'])->paginate(50);
    //     return view('admins.order-menunggu', compact('orderTunggu'));
    // }

    // public function orderMenungguBayar(){
    //     $orderMenBayar = Order::orderBy('created_at','DESC')->where('status', 2)->with(['paket'])->paginate(50);
    //     return view('admins.order-menungguPembayaran', compact('orderMenBayar'));
    // }

    // public function orderDibatalkan(){
    //     $orderDibatalkan = Order::orderBy('created_at','DESC')->where('status', 3)->with(['paket'])->paginate(50);
    //     return view('admins.order-dibatalkan', compact('orderDibatalkan'));
    // }

    // public function orderTelahDibayar(){
    //     $orderTelahDibayar = Order::orderBy('created_at','DESC')->where('status', 4)->with(['paket'])->paginate(50);
    //     return view('admins.order-telahDibayar', compact('orderTelahDibayar'));
    // }

    // public function orderSelesai(){
    //     $orderSelesai = Order::orderBy('created_at','DESC')->where('status', 5)->with(['paket'])->paginate(50);
    //     return view('admins.order-selesai', compact('orderSelesai'));
    // }

    

    public function viewPayment($payid){
        // $transaction = $notif->transaction_status;
        // $type = $notif->payment_type;
        // $order_id = $notif->order_id;
        // $fraud = $notif->fraud_status;
        // $viewPay = Payment::orderBy('created_at','DESC')->where('order_id',$payid)->get();
        $viewpay = Payment::where('order_id',$payid)->value('invoice_order');
        // $pay = $viewpay->invoice_order;
        // $orderId = $viewPay;
        // Get transaction status to Midtrans API
        try {
            $status = Transaction::status($viewpay);
            $file = array($status);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        // $lihat1 = Payment::where('invoice_order',$order_id);
        dd($file);
        // return view('admins.test-payment', compact('file'));
    }







    
}
