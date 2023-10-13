<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'productName',
        'catagory',
        'shortDetails',
        'longDetails',
        'productImg',
        'productPrice',
        'productQuantity',

    ] ;

    public function relatedProducts()
{
    return $this->where('catagory', $this->catagory)
                ->where('id', '!=', $this->id)
                ->latest()
                ->limit(10)// Limit the number of related products
                ->get();
}
}         
