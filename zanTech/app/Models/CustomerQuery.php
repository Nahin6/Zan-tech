<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerQuery extends Model
{
    use HasFactory;
    protected $fillable = [
        'customerId',
        'customerName',
        'customerEmail',
        'customerPhone',
        'customerQuerySubject',
        'customerDetailsMessage',
        'queryStatus',
        'feedback'
    ];
}

