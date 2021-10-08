@extends('layouts.master')
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12" id="list-cart" style="display: flex">--}}
{{--                    <div ><td class="cart-pic first-row"><img style="width: 390px; height: 500px" src="images/1632711391.jpg" alt=""></td></div>--}}
{{--                    <div class="cart-table" style="padding: 0 20px">--}}
{{--                        <tr>--}}
{{--                            <td class="cart-title first-row">--}}
{{--                                <h5 style="padding: 10px 0; font-size: 35px;">Áo khoác DKH8S0</h5>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div style="display: flex">--}}
{{--                                    @foreach($detail as $sp)--}}
{{--                                            <img id="{{$sp->id}}"  style="width: 90px; height: 120px; padding: 2px;" src="images/details/{{$sp->image}}" alt="">--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td style="display: flex ; padding: 47px 0" S>--}}
{{--                                <h5 style="padding: 10px 0; font-size: 30px;">Chọn Loại sản phẩm</h5>--}}
{{--                                <div class="form-group">--}}
{{--                                    <select style="width: auto" name="id_type_details"  class="form-control" id="exampleFormControlSelect1">--}}
{{--                                        <option>--Chọn loại--</option>--}}
{{--                                        @foreach($detail as $sp)--}}
{{--                                                <option value="{{$sp->id}}">Màu : {{$sp->color}} & Size : {{$sp->size}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td class="total-price first-row">--}}
{{--                                <h5 style="padding: 5px 0; font-size: 30px;">Giá : 190.000đ</h5>--}}
{{--                            </td>--}}
{{--                            <td class="qua-col first-row" >--}}
{{--                                <div class="quantity">--}}
{{--                                    <h5 style="padding: 10px 0; font-size: 30px;">Số lượng</h5>--}}
{{--                                    <div class="pro-qty">--}}
{{--                                        <input style="width: 30px" type="text"  placeholder="0"  >--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <button style=" margin-top: 28px; height: 50px; width: auto" type="button" class="btn btn-primary">Thêm vào giỏ hàng</button>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>
    <!-- Shopping Cart Section End -->
@stop
