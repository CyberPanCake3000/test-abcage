<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Supply;
use Carbon\Carbon;
use App\Models\Stock;
class PagesController extends Controller
{
    public function index()
    {
        $date = Supply::orderBy('supply_date')->first()->supply_date;
        $stocks = Stock::where('stock_date', $date)->get();
        return view('index', ['stocks' => $stocks, 'date' => $date]);
    }

    public function getProducts(Request $request)
    {
        $date = $request->get('date');
        $stocks = Stock::where('stock_date', $date)->get();
        return view('index', ['stocks' => $stocks, 'date' => $date]);
    }
}
