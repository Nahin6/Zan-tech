<?php

namespace App\Http\Middleware;

use App\Models\Catagory;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use ShoppingCart;
class LoadProductData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $products = Product::all();
        // $bestProducts = Product::whereBetween('productPrice', [0, 200])->get();
        $latestProducts = Product::latest()->take(10)->get();
        $showCart= ShoppingCart::all();
        $categories= Catagory::all();

       $trendingProductCounts = DB::table('order_items')
            ->select('productName', DB::raw('COUNT(*) as order_count'))
            ->groupBy('productName')
            ->orderBy('order_count', 'asc')
            ->limit(15)
            ->pluck('productName');
        $trendingProducts = Product::whereIn('productName', $trendingProductCounts)
        ->get();



        View::share('products', $products);
        View::share('bestProducts', $latestProducts);
        View::share('showCart', $showCart);
        View::share('categories', $categories);
        View::share('trendingProducts', $trendingProducts);

        return $next($request);
    }
}
