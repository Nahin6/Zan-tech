<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{

    public function showProductsInPriceRange()
    {
        $products = Product::all();

        // $bestProducts = Product::whereBetween('productPrice', [0, 200])->get();
        $latestProducts = Product::latest()->take(10)->get();
        return view('dashboard.dashboard', compact('latestProducts', 'products'));
    }
    public function viewProductDetailInformation($id, Request $request)
    {
        $productDetails = Product::find($id);

        return view('products.productDetails', compact('productDetails'));
    }
    public function viewProductDetailInformationNew($id, Request $request)
    {

        if (Auth::check()) {

            $list = WishlistItem::where('product_id', $id)->where('user_id', Auth::id())->first();
            if (isset($list)) {
                return redirect()->back()->with('success', 'Product already added to wish list.');
            } else {
                WishlistItem::create(
                    [
                        'user_id' => Auth::user()->id,
                        'product_id' => $id,
                    ]
                );
                // Alert::error('Error', 'Please Login to add product to wish list');
                // return view('products.wishListProducts');
                return redirect()->back()->with('success', 'Product added to your wish list.');
            }
        } else {
            return  redirect('/loginnn');
            Alert::error('Error', 'Please Login to add product to wish list');
        }
    }
    public function viewWishList()
    {

        if (Auth::check()) {
            $user = Auth::user();

            if ($user) {
                $wishlistItems = WishlistItem::where('user_id', $user->id)->with('product')->take(15)->get();

                if ($wishlistItems->isEmpty()) {

                    return redirect()->back()->with('success', 'Wish List is Empty.');
                } else {
                    return view('products.wishListProducts', compact('wishlistItems'));
                }
            }
        } else {
            return  redirect('/loginnn');
            Alert::error('Error', 'Please Login first');
        }
    }

    public function totalWishListCount($id){

        $totalWish=WishlistItem::count($id);
        return view('dashboard.navBar', compact('totalWish'));
    }
}
