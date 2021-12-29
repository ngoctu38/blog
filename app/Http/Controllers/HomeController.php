<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->get('name'))){
            $name = $request->get('name');
            $product = Product::where('name', 'LIKE', "%$name%")->orderBy('name')->paginate(6);
//            if ($product['total'] == null) {
//                session('error', 'Không có sản phẩm bạn muốn tìm');
//                dd($product);
//            }
        }else{
            $product = Product::orderBy('id', 'DESC')->paginate(6);
        }
        $detail = ProductDetail::all();

        return view('home', compact( 'product','detail'));
    }
    public function priceT(){
        $product = Product::orderBy('price', 'ASC')->paginate(6);
        $detail = ProductDetail::all();
        return view('home', compact( 'product','detail'));
    }
    public function priceC(){
        $product = Product::orderBy('price', 'DESC')->paginate(6);
        $detail = ProductDetail::all();
        return view('home', compact( 'product','detail'));
    }
    public function sale(){
        $product = Product::orderBy('sale', 'DESC')->paginate(6);
        $detail = ProductDetail::all();
        return view('home', compact( 'product','detail'));
    }
    public function  getType($type)
    {
        $product = Product::where('id_type_details', $type)->orderBy('id', 'DESC')->paginate(6);
        $type = Product::where('id_type_details', $type)->first();
        return view('type_product', compact('product','type'));
    }
}
