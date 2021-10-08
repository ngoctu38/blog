<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
//    protected  $table = 'tb_carts';
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
         if($cart){
             $this->products = $cart->products;
             $this->totalPrice = $cart->totalPrice;
             $this->totalQuantity = $cart->totalQuantity;

         }
    }

    public function AddCart($product, $id){
        $newProduct = ['quantity' => 0 , 'price' => ($product->price - ($product->price * $product->sale / 100)), 'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id , $this->products)){
                $newProduct= $this->products[$id];
            }
        }
        $newProduct['quantity'] ++;
        $newProduct['price'] = $newProduct['quantity'] * ($product->price - ($product->price * $product->sale / 100));
        $this->products[$id] = $newProduct;
        $this->totalPrice += ($product->price - ($product->price * $product->sale / 100)) ;
        $this->totalQuantity ++;
    }
    public function DeleteItemCart($id){
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
