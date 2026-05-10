<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'nama_pelanggan',
        'no_hp',
        'jenis_laundry',
        'berat',
        'total_harga',
        'status_order',
        'payment_status',
        'invoice_number'
    ];
}
