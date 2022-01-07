<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'nama_penerima',
        'nama_pengirim',
        'total_quantity',
        'total_price',
    ];

    public function carst()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
