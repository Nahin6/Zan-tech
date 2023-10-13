<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function ViewLogin()
    {
        return view('auth.login');
    }
    public function ViewRegister()
    {
        return view('auth.register');
    }

    public function LoginFunction()
    {

        $userType = Auth::user()->userType;

        if ($userType == 'Admin') {
            return view('admin.adminDashbaoard');
        }

        if ($userType == 0) {

            $products = Product::all();

            // $bestProducts = Product::whereBetween('productPrice', [0, 200])->get();
            $latestProducts = Product::latest()->take(10)->get();
            return view('user.userDashboard', compact('latestProducts','products'));

        } else {
            return View('auth.login');
        }
    }

    public function logoutFunction()
    {if (Auth::check()) {
        if (Auth::user()->userType == "0") {
            Auth::logout();
            
            return Redirect('/');
          
        }
        else

        Auth::logout();
        return Redirect()->route('login');
    }
    }
    public function userProfile()
    {
        if (Auth::id()) {
            return view('profile.show');
        } else {

            return view('auth.login');
        }

    }
}
