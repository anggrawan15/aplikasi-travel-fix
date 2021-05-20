<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Payment;

class CustomerController extends Controller
{
    //
    public function index(){
        $orderc = Order::orderBy('created_at','DESC')->where([
            ['customer_id', auth()->guard('customer')->user()->id],
            ])->get();
        return view('customers.home-customer', compact('orderc'));
    }


    public function loginForm(){
        if (auth()->guard('customer')->check()) return redirect(route('customer.home'));
        
        // return view('customers.auth.login-customer');
        return view('customers.auth.customer-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
        ]);


        $auth = $request->only('email', 'password');
        $auth['status'] = 1;

        if (auth()->guard('customer')->attempt($auth)){

            return redirect()->intended(route('customer.home'));
        }
        // dd($status);
        return redirect()->back()->with(['error' => 'Email / Password Salah']);

        // dd(auth()->guard('customer')->attempt($auth));
    }

    public function logout(){
        auth()->guard('customer')->logout(); //JADI KITA LOGOUT SESSION DARI GUARD CUSTOMER
        return redirect(route('customer.loginForm'));
    }

    public function registerForm(){
        // return view('customers.auth.register-customer');
        if (auth()->guard('customer')->check()) return redirect(route('customer.home'));
        return view('customers.auth.customer-register');
    }

    public function register(Request $request){
        $this->validate($request, [
            'nama' =>'required|string|max:50',
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
                
                return redirect(route('customer.loginForm'))->with(['success' => 'Register Success, Silahkan Login!']);
            }  
            
            return redirect()->back()->with(['error' => 'Password tidak Sama!']);

        }catch (\Exception $e) {

            return redirect()->back()->with(['error' => 'Email Yang Didaftarkan Sudah Ada! ' ]);

        }    

    }

    public function profilCustomer($id){
        $profil = Customer::find($id);
        return view('customers.profils.profile-customer',compact('profil'));
    }

    public function tableOrderCustomer(){
        $ordercus = Order::orderBy('created_at','DESC')->where([
            ['customer_id', auth()->guard('customer')->user()->id],
            ])->get();
            return view('customers.orders.table-order-customer', compact('ordercus'));
    } 
    public function tablePaymentCustomer(){
        // $orderp = Order::orderBy('created_at','DESC')->where([['customer_id', auth()->guard('customer')->user()->id],])->get();

        $paymentcus = Payment::orderBy('created_at','DESC')->where([['customer_id',auth()->guard('customer')->user()->id],])->get();

            return view('customers.payments.table-payment-customer', compact('paymentcus'));

        // dd($orderp);
        // dd($ordercus);
    
        
    } 

}
