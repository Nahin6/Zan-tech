<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customerId',
        'totalBill',
        'customerName',
        'customerDivision',
        'customerStreetAdress',
        'customerHomeAdress',
        'customerCity',
        'customerAditonalNotes',
        'customerPromoCode',
        'deliveryCharge',
        'customerPhone',
        'customerEmail',
        'randInvoice',
        'orderStatus',
    ];
    public function items()
{
    return $this->hasMany(OrderItems::class, 'orderId', 'id');
}
}

