<?php

namespace App\Http\Controllers;
Use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('Stock');
    }

    public function store(Request $request)
    {
        $stock = new Stock([
          'stockName' => $request->get('stockName'),
          'stockPrice' => $request->get('stockPrice'),
          'stockYear' => $request->get('stockYear'),
        ]);
        $stock->save();

        return redirect('stocks');
    }

    public function chart()
    {
        $result = \DB::table('stocks')
                    ->where('stockName','=','Con chó')
                    ->orderBy('stockYear', 'ASC')
                    ->get();
        return response()->json($result);
    }
}
