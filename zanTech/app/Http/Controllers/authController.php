<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use ShoppingCart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
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
            // all product
            $products = Product::all();
            //last 10 uploaded product
            $latestProducts = Product::latest()->take(10)->get();
            // most ordered product
            $trendingProductCounts = DB::table('order_items')
            ->select('productName', DB::raw('COUNT(*) as order_count'))
            ->groupBy('productName')
            ->orderBy('order_count', 'asc')
            ->limit(15)
            ->pluck('productName');
        $trendingProducts = Product::whereIn('productName', $trendingProductCounts)
        ->get();

            return view('user.userDashboard', compact('latestProducts','products', 'trendingProducts'));

        } else {
            return View('auth.login');
        }
    }

    public function logoutFunction()
    {if (Auth::check()) {
        if (Auth::user()->userType == "0") {
            Auth::logout();
            ShoppingCart::destroy();
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
            // return view('profile.show');
            return view('user.updateProfile');
        } else {

            return view('auth.login');
        }

    }
    public function updateInfo(Request $request)
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $updateInfo = User::find($id);

            if (!$updateInfo) {
                return redirect()->back()->with('error', 'ID Not found');
            }
            if($updateInfo){
                $updateInfo->name = $request->input('updateName');
                $updateInfo->email = $request->input('updateEmail');
                $updateInfo->phone = $request->input('updatePhone');
                $updateInfo->save();
                Alert::success('Successfull', 'Profile updated');
                return redirect()->back();
            }

        } else {

            return view('auth.login');
        }
    }
    public function ChangePassword(Request $request)
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $updateInfo = User::find($id);

            if (!$updateInfo) {
                return redirect()->back()->with('error', 'ID Not found');
            }
            if (Hash::check($request->currentPassword, $updateInfo ->password)) {
                if($request->NewPassword== $request->ConfirmPassword){
                    // $updateInfo->password = password_hash($request->newPassword, PASSWORD_DEFAULT);
                    $updateInfo->password = Hash::make($request->input('NewPassword'));
                    $updateInfo->save();
                    Alert::success('success', 'Password changed successfully');
                    return redirect()->back();
                }
                else{
                    Alert::warning('error', 'password does not match!!');
                    return redirect()->back();
                }

            } else {
                // If the current password doesn't match, return back with an error message
                Alert::warning('error', 'Current password is incorrect');
                return redirect()->back();
            }

        } else {

            return view('auth.login');
        }
    }
}
