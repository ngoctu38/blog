@extends('layouts/master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="breadcrumb-text row">
                        <div class="col-10">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                    <div class="form-group col-2 select" style="padding: 0px; margin: 0px">
                        <div class="dropdown">
                            <div class="  "><a href="#">Hiển thị danh sách</a></div>
                            <div class="dropdown-content">
                                <a class="product_type"  href="{{url("home")}}">sản phẩm mới nhất</a>
                                <a class="product_type"  href="{{url("home/priceT")}}">Giá thấp đến cao</a>
                                <a class="product_type"  href="{{url("home/priceC")}}">Giá cao đến thấp</a>
                                <a class="product_type"  href="{{route("home.sale")}}">Giảm giá cao</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container" >
   <div class="row products" >
    @foreach($product as $sp)
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
                                                        <li class="quick-view"><a onclick="AddCart({{$sp->id}})" href="javascript:"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                                        </li>
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
    <div class="d-flex justify-content-center" style="padding-bottom: 10px">{{ $product->links() }}</div>
</div>
@stop
