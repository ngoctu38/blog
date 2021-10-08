<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('sale.sale');
    }

}
