<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'unit_id',
        'category_id',
        'purchase_num',
        'date',
        'desc',
        'buying_qty',
        'unit_price',
        'buying_price',
        'status',
        'created_by',
        'updated_by',
    ];
}
