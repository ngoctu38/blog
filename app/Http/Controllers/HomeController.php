<?php

namespace App\Http\Controllers;

use App\Product;
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
    public function index()
    {
        return view('home');
    }

    public function  getType($type){
        $product_type = Product::where('id_type_details',$type)->get();
        return view('type_product',compact('product_type'));
    }
    public function detail($id){
        $product_detail = Product::where('id',$id)->get();
        return view('product_detail',compact('product_detail'));
    }


}
