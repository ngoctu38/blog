@extends('layouts.admin')

@section('content')
    <table class="table" >
        <div style="padding: 5px">
            <p ><b>Khách hàng : </b> {{$customer->name}}</p>
            <br>
            <p><b>số điện thoại : </b> {{$customer->phone}}</p>
            <br>
            <p><b>mã mua hàng : </b> {{$order->id}}</p>
            <br>
            <p><b>Địa chỉ nhận : </b> {{$order->address}}</p>
        </div>
        <table class="table" style="width: auto">
            <tr>
                <th  >sản phẩm  </th>
                <th  >Giá sản phẩm</th>
                <th  >số lượng</th>
                <th  >tổng giá</th>
            </tr>
            <tbody>
            @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->nameProduct}}</td>
                    <td style="text-align: -webkit-right;">{{number_format($cart->price)}}đ</td>
                    <td>x {{$cart->quantity}}</td>
                    <td style="text-align: -webkit-right;">{{number_format($cart->total)}}đ</td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <div style="padding: 5px">
        <p><b>Tổng tiền : </b> {{number_format($order->total)}}</p>
        </div>
    </table>
@stop
