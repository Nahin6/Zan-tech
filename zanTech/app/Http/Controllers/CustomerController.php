<?php

namespace App\Http\Controllers;

use App\Models\CustomerQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade\Dompdf;
use PDF;
use Dompdf\Dompdf;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\OrderItems;
use App;
use App\Models\Cupons;
use App\Models\Order;
use App\Models\Product;

class CustomerController extends Controller
{
    public function trackOrderPage()
    {
        if (Auth::check() && Auth::user()->userType === '0') {

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
                    'orders.totalBill',
                    'orders.randInvoice',
                    'order_items.orderId',
                    'order_items.productName',
                    'order_items.productQuantity',
                    'order_items.productPrice',
                    'orders.deliveryCharge',
                    'orders.orderStatus'
                )->where('customerId', Auth::user()->id)
                ->orderBy('orders.id', 'desc')
                ->get();
            return view('user.orderHistory', compact('orderItems'));
        } else {
            return view('auth.login');
        }
    }
    // public function downloadOrderToPdf($id) {
    //     if (Auth::check() && Auth::user()->userType === '0') {
    //         $orderInvoice = DB::table('orders')
    //             ->join('order_items', 'orders.id', '=', 'order_items.orderId')
    //             ->select(
    //                 'orders.id',
    //                 'orders.customerName',
    //                 'orders.customerDivision',
    //                 'orders.customerCity',
    //                 'orders.customerStreetAdress',
    //                 'orders.customerHomeAdress',
    //                 'orders.customerPhone',
    //                 'orders.customerEmail',
    //                 'orders.totalBill',
    //                 'orders.deliveryCharge',
    //                 'orders.orderStatus',
    //                 'orders.randInvoice',
    //                 'orders.created_at',
    //                 'order_items.productName',
    //                 'order_items.productQuantity',
    //                 'order_items.productPrice',
    //             )
    //             ->where('orders.id', $id)
    //             ->get();

    //         if (!$orderInvoice->isEmpty()) {
    //             $pdf = PDF::loadView('user.downloadInvoice', compact('orderInvoice'));
    //             return $pdf->download('order-invoice.pdf');
    //         } else {
    //             return redirect()->back()->with('error', 'Order not found.');
    //         }
    //     } else {
    //         return view('auth.login');
    //     }
    // }

    public function downloadOrderToPdf($id)
    {
        if (Auth::check() && Auth::user()->userType === '0' || Auth::user()->userType === 'Admin') {
            $orderInvoice = DB::table('orders')
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
                    'orders.totalBill',
                    'orders.deliveryCharge',
                    'orders.orderStatus',
                    'orders.randInvoice',
                    'orders.customerPromoCode',
                    'orders.created_at',
                    'order_items.id',
                    'order_items.productName',
                    'order_items.productQuantity',
                    'order_items.productPrice',
                    'order_items.singleProductPrice',
                    'cupons.discount as customerPromoDiscount'
                )
                ->leftJoin('cupons', 'orders.customerPromoCode', '=', 'cupons.promo_code')
                ->where('orders.id', $id)
                ->get()
                ->toArray();

            if (!$orderInvoice) {
                return redirect()->back()->with('error', 'Order not found.');
            }

            // $pdf = pdf::loadView('user.downloadInvoice', compact('orderInvoice'));
            // $pdf->render();
            // return $pdf->stream();
            // return $pdf->download('orderInvoice.pdf');
            return View('user.downloadInvoice', compact('orderInvoice'));
        } else {
            return view('auth.login');
        }
    }

    public function storeCustomerQuery(Request $request)
    {
        if (Auth::check() && Auth::user()->userType === '0') {
            $request->validate([
                'subject' => 'required',
                'detailsMessage' => 'required',
            ]);

            CustomerQuery::create([
                'customerId' => Auth::user()->id,
                'customerName' => Auth::user()->name,
                'customerEmail' => Auth::user()->email,
                'customerPhone' => Auth::user()->phone,
                'customerQuerySubject' => $request->input('subject'),
                'customerDetailsMessage' => $request->input('detailsMessage'),
                'queryStatus' => 'pending',
            ]);
            Alert::success('Successfull', 'Your query submitted successfully');
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }

    public function viewcustomerQueries()
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {

            $query = CustomerQuery::all();
            return view('admin.customerQueries', compact('query'));
        } else {
            return view('auth.login');
        }
    }

    public function submitSolutionToQuery(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->userType === 'Admin') {
            $solvedQuery = CustomerQuery::find($id);
            if ($solvedQuery) {
                $solvedQuery->queryStatus = 'Solved';
                $solvedQuery->feedback = $request->input('solutionToCustomer');
                $solvedQuery->save();

                Alert::success('Successfull', 'Solution sent');
                return redirect()->back();
            }
        } else {
            return view('auth.login');
        }
    }

    public function ViewFeedback()
    {
        if (Auth::check() && Auth::user()->userType === '0') {

            $cusQuery = CustomerQuery::where('customerId', Auth::user()->id)->get();
            return view('user.viewSubmittedQueries', compact('cusQuery'));
            // $cusQuery = CustomerQuery::where('customerId',Auth::user()->id)->get();
            // $cusQuery = pdf::loadView('user.viewSubmittedQueries', compact('cusQuery'));
            // return $cusQuery->download('visiting-card.pdf');
        } else {
            return view('auth.login');
        }
    }
    public function deleteCustomerQuery($id)
    {
        if (Auth::check() && Auth::user()->userType === '0') {

            $cusQuery = CustomerQuery::find($id);
            $cusQuery->delete();
            Alert::info('Successfull', 'Complain removed');
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }

    public function filterCategoriesWiseProduct($category)
    {
        $products = Product::where('catagory', $category)->get();

        return view('products.productShop', compact('products'));
    }

    public function filterProductByPrice($minPrice, $maxPrice)
    {
        $products = Product::whereBetween('productPrice', [$minPrice, $maxPrice])->get();
        return view('products.productShop', compact('products'));
    }
    public function showStaticPage($slug)
    {

        return view("dashboard.pages.$slug");
    }
    public function trackOrderStatus($id)
    {
        if (Auth::check() && Auth::user()->userType === '0') {
            $trackStatus = DB::table('orders')
                ->join('order_items', 'orders.id', '=', 'order_items.orderId')
                ->select(
                    'orders.id',
                    'orders.orderStatus',
                    'orders.randInvoice',
                )
                ->where('orders.id', $id)
                ->get();


            if (!$trackStatus) {
                return redirect()->back()->with('error', 'Order not found.');
            }

            return view("user.trackOrder", compact('trackStatus'));
        } else {
            return view('auth.login');
        }
    }
}
