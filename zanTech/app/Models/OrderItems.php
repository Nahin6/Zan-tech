<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable =[
        'productName' ,
        'productPrice',
        'singleProductPrice',
        'productQuantity',
        'orderId',
    ];
    public function order()
{
    return $this->belongsTo(Order::class, 'orderId', 'id');
}
}
