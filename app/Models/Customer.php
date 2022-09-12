<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'customer_img',
        'phone_number',
        'email',
        'address',
        'status',
        'created_by',
        'updated_by',
    ];
}
