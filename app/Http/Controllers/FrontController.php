<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        $featured = Product::whereStatus(1)->orderBy('id', 'desc')->limit(12)->get();
        $trend = Product::whereStatus(1)->where('trend', 1)->orderBy('id', 'desc')->limit(8)->get();
        $best = Product::whereStatus(1)->where('best_rated', 1)->orderBy('id', 'desc')->limit(8)->get();
        $hot = Product::with('brand')
            ->where('products.status', 1)
            ->where('hot_deal', 1)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
        $product = Product::whereStatus(1)->with('category')->limit(10)->orderBy('id', 'DESC')->get();
        $budget = Product::with('brand')
            ->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $mid = Product::with(['category', 'brand'])
            ->where('products.mid_slider', 1)->orderBy('id', 'DESC')->limit(3)
            ->get();

        return view('pages.index', compact('featured', 'trend', 'best', 'hot', 'product', 'budget', 'mid'));
    }

    public function StoreNewsletter(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'email' => 'required|unique:newslaters|max:55',
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newsletters')->insert($data);
        $notification = array(
            'message' => 'Thanks for Subscribing',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function OrderTracking(Request $request)
    {
        $code = $request->code;

        $track = DB::table('orders')->where('status_code', $code)->first();
        if ($track) {
            // echo "<pre>";
            // print_r($track);
            return view('pages.tracking', compact('track'));
        } else {
            $notification = array(
                'message' => 'Status Code Invalid',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
