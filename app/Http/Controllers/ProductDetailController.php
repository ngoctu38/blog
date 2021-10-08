<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;

class ProductDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('cart.product-detail');
    }


}
