<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['cost_price' ,'amount', 'stock_date'];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
