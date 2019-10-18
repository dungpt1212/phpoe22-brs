<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Book;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access-dashboard');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function getBookData()
    {
        $start = Carbon::now()->subMonths(12);
        $now = Carbon::now();

        $books = DB::table('books')
        ->select(DB::raw('month(created_at) as month'), DB::raw('COUNT(*) as numberBook'))
        ->where([
            ['created_at', '>=', $start],
            ['created_at', '<=', $now],
        ])
        ->groupBy('month')
        ->orderBy('month', 'ASC')
        ->get();

        return response()->json($books);
    }
}
