<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['selling_price' ,'amount', 'stock_date', 'product_id'];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
