<?php

namespace Database\Seeders;

use App\Models\Stock;
use Carbon\CarbonPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Supply;
use App\Models\Preorder;
use Carbon\Carbon;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        $period = CarbonPeriod::create('2021-01-01', '2021-02-06');
        $stocks = [];
        for ($product = 1; $product <= 3; $product++)
        {
            $result = [];

            foreach($period as $date)
            {
                $supplies = Supply::where('product_id', '=', $product)->whereDate('supply_date', '<=', $date);
                $preorders = Preorder::where('product_id', '=', $product)->whereDate('preorder_date', '<=', $date);

                $amount = $supplies->sum('amount') - $preorders->sum('amount');

                if($amount <= 0)
                {
                    continue;
                }

                if($supplies->sum('amount') == 0)
                {
                    $price = $supplies->avg('price');
                } else {
                    $price = $supplies->sum('price') + $supplies->sum('price') * 0.3 / $supplies->sum('amount');
                }

                $result = [
                    'product_id' => $product,
                    'stock_date' => Carbon::parse($date),
                    'amount' => $amount,
                    'selling_price' => $price,
                ];

                $stocks[] = $result;
            }

        }

        foreach($stocks as $stock)
        {
            Stock::create($stock);
        }

    }
}
