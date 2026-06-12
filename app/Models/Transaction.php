<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'barang_id',
        'barang_name',
        'harga',
        'qty',
        'total',
        'payment_method',
        'status',
        'invoice',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
