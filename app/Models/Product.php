<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount'];

    public function getCurrentPriceAttribute()
    {
        return 100;
    }

    public function getAmount($date)
    {
        $suppliesAmount = $this->hasMany(Supply::class, 'product_id')->whereDate('supply_date', '=', $date)->sum('amount');
        $preordersAmount = $this->hasMany(Preorder::class, 'product_id')->whereDate('preorder_date', '=', $date)->sum('amount');
        $amount = $suppliesAmount - $preordersAmount;
        return $amount;
    }
}
