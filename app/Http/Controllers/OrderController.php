<?php

namespace App\Http\Controllers;
use App\Cart;
use App\CartDetail;
use App\Customer;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
  public function index(Request $request){
      $rules =[
          'name'=>'required',
          'phone'=>'required',
          'address'=>'required',
      ];
      $message=[
          'name.required'=>'Tên không đươc bỏ trống',
          'phone.required'=>'Số điện thoại không được bỏ trống',
          'address.required'=>'Địa chỉ không được bỏ trống',
      ];
      $validator = Validator::make($request->all(),$rules,$message);
      $request->flash();
      if ($validator->fails()){
          response()->json([
              'fail'=>true,
              'errors'=>$validator->errors()
          ]);
          session()->flash('error','Đặt hàng chưa thành công !');
          return redirect('shopping-cart')->withErrors($validator->errors());
      }
    $cart = session('cart');

    $customer = new Customer();
      $customer->name = $request->name;
      $customer->phone = $request->phone;
      $customer->address = $request->address;
      $customer->save();

    $order = new Order();
    $order->id_customer = $customer->id;
    $order->total = $cart->totalPrice;
    $order->address = $customer->address;
    $order->note = $request->note;
    $order->status = 1;
    $order->save();
    foreach ($cart->products as $key =>$value){
        $cart = new CartDetail();
        $cart->id_order = $order->id;
        $cart->id_customer = $customer->id;
        $cart->id_product = $key;
        $cart->qty = $value['quantity'];
        $cart->price = $value['price']/$cart->qty;
        $cart->total = $cart->qty * $cart->price;
        $cart->save();
    }
      $request->session('cart')->flush();
      session()->flash('success','Đặt hàng thành công !');
      return redirect('shopping-cart');
  }

    public function list()
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
        return view('customer-order.index', compact('order'));
    }

    public function detail($id)
    {
        $cart = DB::table('tb_carts')->where('id_order', $id)
            ->leftJoin('tb_products', 'tb_carts.id_product', '=', 'tb_products.id')
            ->select(
                'tb_products.name as nameProduct',
                'tb_carts.price as price',
                'tb_carts.qty as quantity',
                'tb_carts.total as total'

            )->get();

        $order = DB::table('tb_orders')->where('id', $id)->first();
        $customer = DB::table('tb_customers')->where('id', $order->id_customer)->first();


        return view('customer-order.detail', compact('cart', 'order', 'customer'));
    }

    public function status($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->status == 1) {
            $order->status++;
            $order->save();
            return redirect('order/index');
        } elseif ($order->status == 2) {
            $order->status++;
            $order->save();
            return redirect('order/index');
        } elseif ($order->status == 3) {
            $order->status -= 2;
            $order->save();
            return redirect('order/index');
        }

    }

    public function delete($id)
    {
        CartDetail::where('id_order', $id)->delete();
        Order::where('id', $id)->delete();
        session()->flash('success', 'Xóa thành công !');
        return redirect('order/index');
    }

}
