<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $detail = ProductDetail::all();
        return view('cart.shopping-cart',compact('detail'));
    }

    public function addCart( Request  $request , $id){
        $product = Product::where('id',$id)->first();
        if ($product != null) {
            $oldCart = session('cart') ? session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);

            $request->session()->put('cart', $newCart);
            return view('cart.cart', compact('newCart'));
        }
    }

    public function DeleteCart( Request  $request , $id){
            $oldCart = session('cart') ? session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if (count($newCart->products) != 0 ){
                $request->session()->put('cart', $newCart);
            }
            else {
                $request->session()->forget('cart');
            }
        return view('cart.cart', compact('newCart'));

    }
    public function SaveList( Request  $request , $id, $quantity){
            $oldCart = session('cart') ? session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->UpdateCart( $id, $quantity);

            $request->session()->put('cart', $newCart);
            return view('cart.list-cart', compact('newCart'));
    }
    public function DeleteList( Request  $request , $id){
        $oldCart = session('cart') ? session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        $request->session()->put('cart', $newCart);

        return view('cart.list-cart', compact('newCart'));

    }




}
