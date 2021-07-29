<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('getSalesBetweenDate');
    }

    public function index()
    {
        // continue with current method
        return view('welcome');
    }


    public function getSalesBetweenDate(Request $request)
    {

        $sales = DB::table('sales')
            ->select('salesDate', DB::raw("sum(TotalQuantitySold) as totalSales"));
        // testing in browser
        // $startDate = '2021-07-15';
        // $endDate = '2021-07-18';

        // assuming date from frontend Y-m-d
        if ($request->filled('startDate') && $request->filled('endDate')) {
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $sales = $sales->whereDate('SalesDate', '>=', $startDate)
                ->whereDate('SalesDate', '<=', $endDate);
        }

        $sales = $sales->groupBy('salesDate')
            ->orderBy('salesDate')
            ->get();

        $result = [
            'xData' => $sales->pluck('salesDate'),
            'data' => $sales->pluck('totalSales'),
        ];
        return $result;
    }
}
