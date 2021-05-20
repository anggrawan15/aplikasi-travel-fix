<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded = [];

    protected $appends = ['status_payment'];

    public function getStatusPaymentAttribute(){

        if($this->status == 'pending') {
            return '<span class="badge badge-secondary">Pending</span>';
        }elseif ($this->status == 'deny') {
            return '<span class="badge badge-danger">Deny</span>';
        }elseif ($this->status == 'cancel') {
            return '<span class="badge badge-danger">Cancel</span>';
        }elseif ($this->status == 'expire') {
            return '<span class="badge badge-danger">Expired</span>';
        }elseif ($this->status == 'settlement') {
            return '<span class="badge badge-success">Settlement</span>';
        }elseif($this->status == 'capture'){
            return '<span class="badge badge-success">Capture</span>';
        }
        
        
    }

    //menggunakan data Order
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
