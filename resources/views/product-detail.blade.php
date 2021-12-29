@extends('layouts.master')
@section('content')
    <style>
        .detail{
            display: flex;
        }
        .detail li{
            list-style: none;
            padding: 0px 10px;
            border: inset;
        }
        .price{
            font-size: 30px
        }
    </style>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart" style="display: flex">
                    <div id="image" >
                        @if(empty($img))
                        <td class="cart-pic first-row">
                            @foreach($product as $sp)
                            <img style="width: 300px; height: auto" src="{{url('images/'.$sp->avatar)}}" alt="">
                            @endforeach
                        </td>
                        @endif
                    </div>
                    <div class="cart-table" style="padding: 0 20px">
                        <tr>
                            <td class="cart-title first-row">
                                @foreach($product as $sp)
                                <h5 style="padding: 10px 0; font-size: 35px;">{{$sp->name}}</h5>
                                @endforeach
                            </td>
                            <td>
                                <div style="display: flex;background-color: currentcolor; display: flex;  width: fit-content;">
                                    @foreach($detail as $sp)
                                        @if($sp->image != null)
                                            <img id="{{$sp->id}}" onclick="Select({{$sp->id}})"  style="width: auto; height: 120px; padding: 2px;" src="{{url('images/details/'.$sp->image)}}" alt="">
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td class="total-price first-row">
                                @foreach($product as $sp)
                                            <div class="price" style="color: coral;padding: 10px 0;" >
                                                {{number_format($sp->price - $sp->price * $sp->sale / 100)}}đ
                                            </div>
                                @endforeach
                            </td>
                            <td>
                                <h5 style="padding: 10px 0; font-size: 35px;">Thông tin sản phẩm : </h5>
                                @foreach($product as $sp)
                                    {{--        <p>{{explode("-",$sp->note)}}</p>--}}
                                    <p style="width: 500px;">{{$sp->note}}</p>
                                @endforeach
                            </td>
                            @foreach($product as $sp)
                            <td>
                                   <a  style=" height: 50px; width: auto"  onclick="AddCart({{$sp->id}})" href="javascript:" class="btn btn-primary">Thêm vào giỏ hàng</a>
                            </td>
                            @endforeach
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
{{--    <div class="container">--}}
{{--        <h4>Thông tin sản phẩm : </h4>--}}
{{--        @foreach($product as $sp)--}}
{{--        <p>{{explode("-",$sp->note)}}</p>--}}
{{--            <p>{{$sp->note}}</p>--}}
{{--        @endforeach--}}
{{--    </div>--}}
    <script>
        function AddCart(id) {
            $.ajax({
                url : 'product/detail/add-cart/'+ id,
                type : 'GET',
            }).done(function (response) {
                RenderCart(response);
                alertify.success('Thêm sản phẩm thành công !');
            });
        }
        function Select(id){
            $.ajax({
                url : 'select-image/'+ id,
                type : 'GET',
            }).done(function (response) {
                $("#image").empty();
                $("#image").html(response);
            });
        }
    </script>
@stop
