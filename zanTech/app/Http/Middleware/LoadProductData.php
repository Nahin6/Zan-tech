<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;
use Illuminate\Support\Facades\View;
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

        View::share('products', $products);
        View::share('bestProducts', $latestProducts);
      
        return $next($request);
    }
}
