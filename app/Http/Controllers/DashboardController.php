<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Sales;
use App\Models\Detail_sales;
use Carbon\Carbon; 


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::now()->format('Y-m-d');
    
        if ($user->role === 'employee') {
            $count = Sales::whereDate('sale_date', $today)->count();
            $countMember = Sales::whereDate('sale_date', $today)->whereNotNull('customer_id')->count();
            $countNonMember = Sales::whereDate('sale_date', $today)->whereNull('customer_id')->count();
        
            return view('module.dashboard.index', [
                'count' => $count,
                'countMember' => $countMember,
                'countNonMember' => $countNonMember,
                'date' => $today
            ]);
        } else {
            $chartTransaction = Sales::selectRaw('DATE(sale_date) as date, COUNT(*) as count')
            ->groupByRaw('DATE(sale_date)')
            ->orderByRaw('DATE(sale_date) ASC')
            ->get();
        
        
            $chartProduct = Detail_sales::join('products', 'detail_sales.product_id', '=', 'products.id')
                ->selectRaw('products.name as productName, SUM(detail_sales.quantity) as productCount')
                ->groupBy('products.name')
                ->orderByDesc('productCount')
                ->get();
        
            return view('module.dashboard.index', [
                'chartTransaction' => $chartTransaction,
                'chartProduct' => $chartProduct
            ]);
        }
        
    }
}