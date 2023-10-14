<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use ShoppingCart;

class productController extends Controller
{
private $cartProduct;
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
    public function removeWisListhPrduct($id){


        $remove=WishlistItem::find($id);
        if ($remove) {
            $remove->delete();
            Alert::success('Removed!!', 'Removed from wish list');
            return redirect()->back();
        }
        else{
            Alert::error('Error!!', 'errrrrrrr');
            return redirect()->back();
        }


    }

    public function addToCartPrduct(Request $request, $id){

        $this->cartProduct = Product::find($id);
        ShoppingCart::add(
            $this->cartProduct->id,
            $this->cartProduct->productName,
            $request->qty,
            $this->cartProduct->productPrice,
            [
                'productImg'=>$this->cartProduct->productImg
            ]
        );
        Alert::success('Added!!', 'Product added to cart');
            return redirect()->back();
    }

    public function DisplayCartPrduct(){

        $showCart = ShoppingCart::all();

        return view('products.cartProductPage', compact('showCart'));
    }
    public function removeFromCart($id){

      ShoppingCart::remove($id);
      Alert::error('Removed!!', 'product removed from cart');
        return redirect()->back();
    }
    public function updateCartInfo($id,Request $request){

      ShoppingCart::update($id, $request->qty);
      Alert::success('Update!!', 'Cart updated');
        return redirect()->back();
    }

    public function checkOutCartPage(){
        if (Auth::check() && Auth::user()->userType === '0') {
            $chekoutCart = ShoppingCart::all();
            return view('products.checkOutProduct', compact('chekoutCart'));
        }
        else{
            return  redirect('/loginnn');
            Alert::error('Error', 'Please Login first');
        }

    }
    public function CustomerPlaceOrder($id, Request $request){
        if (Auth::check() && Auth::user()->userType === '0') {

            $request->validate([
                'division' => 'required',
                'streetAddress' => 'required',
                'homeAddress' => 'required',
                'city' => 'required',
            ]);

            $division = $request->input('deliveryCharge');
            $totalBill = $request->input('totalBill');

        // Set the default delivery charge
            $deliveryCharge = 0;

        // Check the division and add delivery charge if it's Dhaka
        if ($division === 'insideDhaka') {
            $deliveryCharge = 60;
        }
       if($division === 'outsideDhaka'){
        $deliveryCharge = 120;
        }

        // Calculate the final total bill with the delivery charge
        $finalTotalBill = $totalBill + $deliveryCharge;
        // $request->merge(['totalBill' => $finalTotalBill]);
          $order =  Order::create([
                'customerId'=>Auth::user()->id,
                'totalBill'=>$finalTotalBill,
                'customerName'=>Auth::user()->name,
                'customerDivision'=>$request->input('division'),
                'customerStreetAdress'=>$request->input('streetAddress'),
                'customerHomeAdress'=>$request->input('homeAddress'),
                'customerCity'=>$request->input('city'),
                'customerAditonalNotes'=>$request->input('addtionalInfo'),
                'customerPromoCode'=>$request->input('promoCode'),
                'deliveryCharge'=>$request->input('deliveryCharge'),
                'customerPhone'=>Auth::user()->phone,
                'customerEmail'=>Auth::user()->email,
                'orderStatus'=>'pending'

            ]);
            $cartItems = ShoppingCart::all();

            // Loop through the cart items and store them in the order_items table
            foreach ($cartItems as $cartItem) {
                $totalPrice = $cartItem->price*$cartItem->qty;
                OrderItems::create([
                    'productName' => $cartItem->name,
                    'productPrice' => $totalPrice,
                    'productQuantity' => $cartItem->qty,
                    'orderId' => $order->id,
                ]);
            }
            ShoppingCart::destroy($id);
            Alert::success('Successfull', 'Order Placed Successfully');
            return redirect()->back();
        }
        else{
            return  redirect('/loginnn');
            Alert::error('Error', 'Please Login first');
        }

    }
}
