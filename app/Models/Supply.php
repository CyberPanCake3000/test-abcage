<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'amount', 'price', 'cost_price', 'selling_price', 'supply_name', 'supply_date'];
}
