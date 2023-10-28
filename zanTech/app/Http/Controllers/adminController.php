<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Events\ProductDeleted;
use App\Models\Cupons;

class adminController extends Controller
{

    public function addCatagory()
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {


            return view('admin.addCatagory');
        } else {
            return view('auth.login');
        }
    }
    public function addProductPage()
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $category = Catagory::all();
            return view('admin.addProduct', compact('category'));
        } else {
            return view('auth.login');
        }
    }
    public function addNewCatagory(Request $request)
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {

            $request->validate([
                'catagoryName' => 'required',

            ]);
            Catagory::create(
                [
                    'catagoryName' => $request->input('catagoryName')
                ]
            );
            Alert::success('Successfull', 'Catagory Added Successfully');
            return redirect()->back();

        } else {
            return view('auth.login');
        }
    }



    public function addNewProduct(Request $request)
    {


        $request->validate([
            'productName' => 'required',
            'catagory' => 'required',
            'shortDetails' => 'required',
            'longDetails' => 'required',
            'productImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'productPrice' => 'required',
            'productQuantity' => 'required',
        ]);
        if ($request->hasFile('productImg')) {
            $image = $request->file('productImg');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/product_images', $imageName);
        } else {
            $imageName = null;
        }
        Product::create([
            'productName' => $request->input('productName'),
            'catagory' => $request->input('catagory'),
            'shortDetails' => $request->input('shortDetails'),
            'longDetails' => $request->input('longDetails'),
            'productImg' => $imageName,
            'productPrice' => $request->input('productPrice'),
            'productQuantity' => $request->input('productQuantity'),
        ]);
        Alert::success('Successfull', 'Product Added Successfully');
        return redirect()->back();




    }
    public function ViewProductList()
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $product = Product::where('catagory','!=', 'Project')->orderby('id', 'desc')->get();
            $category = Catagory::orderby('id', 'desc')->get();

            return view('admin.producList', compact('product','category'));
        } else {
            return view('auth.login');
        }
    }
    public function ViewAllProjectList()
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $project = Product::where('catagory','=', 'Project')->orderby('id', 'desc')->get();
            return view('admin.projectList', compact('project'));
        } else {
            return view('auth.login');
        }
    }



    public function DeleteProduct($id)
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {

            $product = Product::find($id);
            if ($product->productImg) {
                if (file_exists("public/product_images/" . $product->productImg)) {
                    unlink("public/product_images/" . $product->productImg);
                }
            }
            $product->delete();
            event(new ProductDeleted($product));

            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return view('auth.login');
        }
    }
    public function editProduct($id, Request $request)

    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $editProducts = Product::find($id);

            $category = Catagory::all();
            return View('admin.editProduct', compact('editProducts','category'));

        } else {
            return view('auth.login');
        }
    }




    public function updateProduct($id, Request $request)
    {
        if (Auth::check()&& Auth::user()->userType === 'Admin') {
            $request->validate([
                'productName' => 'required',
                'catagory' => 'required',
                'shortDetails' => 'required',
                'longDetails' => 'required',
                'productImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'productPrice' => 'required',
                'productQuantity' => 'required',
            ]);

            $editProduct = Product::find($id);

            if (!$editProduct) {
                return redirect()->back()->with('error', 'Product not found');
            }

            $editProduct->productName = $request->input('productName');
            $editProduct->catagory = $request->input('catagory');
            $editProduct->shortDetails = $request->input('shortDetails');
            $editProduct->longDetails = $request->input('longDetails');
            $editProduct->productPrice = $request->input('productPrice');
            $editProduct->productQuantity = $request->input('productQuantity');

            if ($request->hasFile('productImg')) {
                $image = $request->file('productImg');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move('public/product_images', $imageName);
                $editProduct->productImg = $imageName;
            }

            $editProduct->save();
            Alert::success('Successfull', 'Product Updated Successfully');
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }

    public function editCategory($id, Request $request)

    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $editCategory = Catagory::find($id);
            return View('admin.editCategory', compact('editCategory'));

        } else {
            return view('auth.login');
        }
    }
    public function editPromoCode($id, Request $request)

    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $promos = Cupons::find($id);
            return View('admin.editPromoCodes', compact('promos'));

        } else {
            return view('auth.login');
        }
    }
    public function updateCategoryName($id, Request $request)
    {
        if (Auth::check()&& Auth::user()->userType === 'Admin') {
            $request->validate([
                'catagoryName' => 'required',

            ]);

            $editProduct = Catagory::find($id);

            if (!$editProduct) {
                return redirect()->back()->with('error', 'Product not found');
            }

            $editProduct->catagoryName = $request->input('catagoryName');

            $editProduct->save();
            Alert::success('Successfull', 'Category Name Updated Successfully');
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }
    public function updatePromoCodes($id, Request $request)
    {
        if (Auth::check()&& Auth::user()->userType === 'Admin') {
            $request->validate([
                'promoName' => 'required',
                'promoDiscount' => 'required',

            ]);

            $promos = Cupons::find($id);

            if (!$promos) {
                return redirect()->back()->with('error', 'Promo code not found');
            }

            $promos->promo_code = $request->input('promoName');
            $promos->discount = $request->input('promoDiscount');
            $promos->save();
            Alert::success('Successfull', 'Promos Updated Successfully');
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }

    public function viewUserInfo()
    {
        if (Auth::check()&& Auth::user()->userType === 'Admin') {
            $users = User::where('userType', '=', '0')->get();
            return view('admin.adminViewUserList', compact('users'));
        }
    }
    public function deleteUserInfo($id)
    {
        if (Auth::check()&& Auth::user()->userType === 'Admin') {

            $user = User::find($id);

            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully');
        }
    }
    public function deleteCategory($id)
    {
        if (Auth::check()&& Auth::user()->userType === 'Admin') {

            $category = Catagory::find($id);

            $category->delete();

            return redirect()->back()->with('success', 'Category deleted successfully');
        }
    }
    public function deletePromoCodes($id)
    {
        if (Auth::check()&& Auth::user()->userType === 'Admin') {

            $category = Cupons::find($id);

            $category->delete();

            return redirect()->back()->with('success', 'Promo Code deleted successfully');
        }
    }

    public function searchProducts(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('productName', 'like', "%$search%")->get();

        return view('products.productShop', compact('products'));
    }


    public function OrderListView(){
        if (Auth::check()&& Auth::user()->userType === 'Admin') {

            $orderItems = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.orderId')
            ->select(
                'orders.id',
                'orders.customerName',
                'orders.customerDivision',
                'orders.customerCity',
                'orders.customerStreetAdress',
                'orders.customerHomeAdress',
                'orders.customerPhone',
                'orders.customerEmail',
                'order_items.orderId',
                'order_items.productName',
                'order_items.productQuantity',
                'order_items.productPrice',
                'orders.deliveryCharge',
                'orders.randInvoice',
                'orders.orderStatus'
            )
            ->orderBy('orders.id', 'desc')
            ->get();
            return view('admin.viewOrderDetails', compact('orderItems'));
        }
        else{
            return view('auth.login');
        }
    }

    public function UpdateStatus($id, $status){
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $updateOrder = Order::find($id);
            $updateOrder->orderStatus = $status;
            $updateOrder->save();
            return back();
        } else {
            return view('auth.login');
        }
    }
    public function UpdateOrderToDelivered($id){
        return $this->UpdateStatus($id, "Delivered");
    }
    public function UpdateOrderToProcess($id){
        return $this->UpdateStatus($id, "Processing");
    }
    public function UpdateOrderToNotAvailable($id){
        return $this->UpdateStatus($id, "not available");

    }
    public function UpdateOrderToPending($id){
        return $this->UpdateStatus($id, "Pending");
    }
    public function OutForDeliveryFunction($id){
        return $this->UpdateStatus($id, "Out for delivery");
    }
    public function deleteOrder($id){
        if (Auth::check()&& Auth::user()->userType === 'Admin') {
            $updateOrder = Order::find($id);
            $updateOrder->delete();
            return back();
        }
        else{
            return view('auth.login');
        }
    }
    public function addPromoCodess(){
        if (Auth::check()&& Auth::user()->userType === 'Admin') {

            $promoCodes = Cupons::all();

           return view('admin.addCupons', compact('promoCodes'));
        }
        else{
            return view('auth.login');
        }
    }
    public function addNewPromoCodes(Request $request){
        if (Auth::check()&& Auth::user()->userType === 'Admin') {
            $request->validate([
                'promoName' => 'required',
                'promoDiscount' => 'required',

            ]);
            Cupons::create(
                [
                    'promo_code' => $request->input('promoName'),
                    'discount' => $request->input('promoDiscount')
                ]
            );
            Alert::success('Successfull', 'Promo code Added Successfully');
            return redirect()->back();
        }
        else{
            return view('auth.login');
        }
    }
}
