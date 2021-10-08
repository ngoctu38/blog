@extends('layouts/master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Loại sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" >
        <div class="row products" >
            @foreach($product_type as $sp)
                <div class="col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img style="height: 510px;" src="{{url("images/".$sp->avatar)}}" alt="">
                            <div class="sale pp-sale">sale {{$sp->sale}}%</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="w-icon"><a href="{{url("/product/detail/$sp->id")}}"><i class="fa fa-random"></i> Chi Tiết</a></li>
                                <li class="quick-view"><a onclick="AddCart({{$sp->id}})" href="javascript:"><i class="fa fa-cart-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>{{$sp->name}}</h5>
                            </a>
                            <div class="product-price" style="display: flex; padding: 0 85px">
                                <div style="text-decoration: line-through; font-size: 15px; color: black; padding: 5px">
                                    {{number_format($sp->price)}}đ
                                </div>
                                <div >
                                    {{number_format($sp->price - $sp->price * $sp->sale / 100)}}đ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center" style="padding-bottom: 10px">{{ $product_type->links() }}</div>
    </div>
@stop
