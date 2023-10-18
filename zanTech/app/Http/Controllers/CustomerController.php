<?php

namespace App\Http\Controllers;

use App\Models\CustomerQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\OrderItems;
use App;

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
                    'order_items.orderId',
                    'order_items.productName',
                    'order_items.productQuantity',
                    'order_items.productPrice',
                    'orders.deliveryCharge',
                    'orders.orderStatus'
                )->where('customerId', Auth::user()->id)
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
                    'orders.created_at',
                    'order_items.productName',
                    'order_items.productQuantity',
                    'order_items.productPrice',
                )
                ->where('orders.id', $id)
                ->get();

            if (!$orderInvoice) {
                return redirect()->back()->with('error', 'Order not found.');
            }

            // $pdf = PDF::loadView('user.downloadInvoice', compact('orderInvoice'));
            return View('user.downloadInvoice', compact('orderInvoice'));
            // return $pdf->download('order-invoice.pdf');
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
}
