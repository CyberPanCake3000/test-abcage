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
            $amount = 0;
            $suppliesPriceSum = 0;
            $suppliesPriceAvg = 0;

            foreach($period as $date)
            {
                $supplies = Supply::where('product_id', '=', $product);
                $suppliesAmount = $supplies->whereDate('supply_date', '=', $date)->sum('amount');
                $suppliesAmountAll = $supplies->whereDate('supply_date', '<=', $date)->sum('amount');

                $suppliesPriceAvg += $supplies->whereDate('supply_date', '<=', $date)->avg('price');
                $suppliesPriceSum += $supplies->whereDate('supply_date', '<=', $date)->sum('price');

                if($suppliesAmountAll == 0)
                {
                    $price = 0;
                } else {
                    $price = $suppliesPriceAvg / $suppliesAmountAll;
                }

                $preorders = Preorder::where('product_id', '=', $product)->whereDate('preorder_date', '=', $date);
                $preordersAmount = $preorders->sum('amount');

                $amount = $amount + $suppliesAmount - $preordersAmount;

                if($amount < 0) {
                    continue;
                }

                if($amount != 0){
                    $price = ($suppliesPriceSum + $suppliesPriceSum * 0.3) / $amount;
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
