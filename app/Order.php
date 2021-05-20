<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];

    protected $appends = ['status_order'];

    //ini Accessor
    //dimulai dengan key -get- dan di adkhiri dengan -Attribute-
    public function getStatusOrderAttribute(){

        if($this->status == 'memesan') {
            return '<span class="badge badge-secondary">Memesan</span>';
        }elseif ($this->status == 'pesanan-diterima') {
            return '<span class="badge badge-info">Pesanan DiTerima</span>';
        }elseif ($this->status == 'menunggu-pembayaran') {
            return '<span class="badge badge-warning">Menunggu Pembayaran</span>';
        }elseif ($this->status == 'dibatalkan') {
            return '<span class="badge badge-danger">Dibatalkan</span>';
        }elseif ($this->status == 'terbayar') {
            return '<span class="badge badge-success">Telah Terbayar</span>';
        }else{
            return '<span class="badge badge-success">Selesai</span>';
        }
        
        
    }

    //menerima data dati paket
    public function paket(){
        return $this->belongsTo(Paket::class);
    }

    //menerima data dari customer
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    //menggirim data ke payment
    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
