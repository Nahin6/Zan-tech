<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            $product = Product::all();
            $category = Catagory::all();

            return view('admin.producList', compact('product','category'));
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

    // public function searchProducts(Request $request)
    // {
    //     $search = $request->input('search');

    //     $product = Product::where('productName', 'like', "%$search%")->get();

    //     return view('admin.producList', compact('product'));
    // }

    public function showMultipleViews(){
            return view('dashboard.aboutUs');
            return view('dashboard.contactPage');
    }
}
