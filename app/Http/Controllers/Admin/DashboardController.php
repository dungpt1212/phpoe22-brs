<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access-dashboard');
    }

    public function index()
    {
        $numberUser = User::count();
        $numberBook = Book::count();
        return view('admin.home', compact('numberBook', 'numberUser'));
    }

    public function getBookData(Request $request)
    {
        $books = DB::table('books')
        ->select(DB::raw('month(created_at) as month'), DB::raw('COUNT(*) as numberBook'))
        ->whereYear('created_at', $request->year)
        ->groupBy('month')
        ->orderBy('month', 'ASC')
        ->get();

        $data = [];
        foreach ($books as $book){
            $data[$book->month] = [
                'month' => $book->month,
                'numberBook' => $book->numberBook,
            ];
        }

        $formatData = [];
        for($i = 1; $i <= 12; $i++){
            $formatData[$i] = [
                'month' => $i,
                'numberBook' => 0,
            ];
        }

        return response()->json(array_replace($formatData, $data));
    }

    public function chartBook()
    {
        $years = DB::table('books')
        ->select(DB::raw('DISTINCT year(created_at) as year'))
        ->orderBy('year', 'DESC')
        ->get();
        $years = $years->toArray();

        return view('admin.chart.chart-book', compact('years'));
    }
}
