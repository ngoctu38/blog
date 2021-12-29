<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;

class ProductDetailController extends Controller
{
    public function index($id){
        $detail = ProductDetail::where('id_product',$id)->get();
        $product = Product::where('id',$id)->get();
        return view('product-detail',compact('detail','product'));
    }
    public function selectImg($id){
        $img = ProductDetail::where('id',$id)->first();
        return view('cart.image',compact('img'));
    }


}
