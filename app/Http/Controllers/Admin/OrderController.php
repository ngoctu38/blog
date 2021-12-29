<?php

namespace App\Http\Controllers\Admin;

use App\CartDetail;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
            $order = DB::table('tb_orders')
            ->leftJoin('tb_customers', 'tb_customers.id', '=', 'tb_orders.id_customer')
            ->select(
                'tb_customers.name as name',
                'tb_customers.phone as phone',
                'tb_orders.id as id',
                'tb_orders.address as address',
                'tb_orders.note as note',
                'tb_orders.status as status',
                'tb_orders.total as total'
            )->get();
      return view('order.index',compact('order'));
    }
    public function detail($id){
        $cart = DB::table('tb_carts')->where('id_order',$id)
            ->leftJoin('tb_products', 'tb_carts.id_product', '=', 'tb_products.id')
            ->select(
                'tb_products.name as nameProduct',
                'tb_carts.price as price',
                'tb_carts.qty as quantity',
                'tb_carts.total as total'

            )->get();

        $order = DB::table('tb_orders')->where('id',$id )->first();
        $customer = DB::table('tb_customers')->where('id',$order->id_customer )->first();


        return view('order.detail',compact('cart','order','customer'));
    }
    public function status($id){
        $order = Order::where('id',$id)->first();
        if ($order->status == 1 ){
            $order->status ++;
            $order->save();
            return redirect('admin/order');
        }
        elseif ($order->status == 2){
            $order->status ++;
            $order->save();
            return redirect('admin/order');
        }
        elseif ($order->status  == 3){
            $order->status -= 2;
            $order->save();
            return redirect('admin/order');
        }

    }
    public function delete($id){
        CartDetail::where('id_order',$id)->delete();
        Order::where('id',$id)->delete();
        session()->flash('success','Xóa thành công !');
        return redirect('admin/order');
    }
}
