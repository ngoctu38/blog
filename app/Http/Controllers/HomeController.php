<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (!empty($request->get('name'))){
            $name = $request->get('name');
            $product = Product::where('name', 'LIKE', "%$name%")->orderBy('name')->paginate(6);
        }else{
            $product = Product::orderBy('id', 'DESC')->paginate(6);
        }
        $detail = ProductDetail::all();

        return view('home', compact( 'product','detail'));
    }
    public function  getType($type)
    {
        $product_type = Product::where('id_type_details', $type)->paginate(6);
        return view('type_product', compact('product_type'));
    }

}
