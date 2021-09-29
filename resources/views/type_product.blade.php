@extends('layouts/master')
@section('content')
    <div class="container" >
        @foreach($product_type as $product)
        <div class="row products" >
            <div class="col-md-4">
                <div> <img src="images/1632711391.jpg" alt="Sản phẩm 1" class="img-circle img-thumbnail">
                    <h2>{{$product->name}}</h2>
                    <dl class="dl-horizontal">
                        <dt>Giá:</dt>
                        <dd>{{$product->price}}$</dd>
                        <dt>Bảo hành:</dt>
                        <dd> 12 tháng</dd>
                        <dt>Tình trạng:</dt>
                        <dd> Còn hàng</dd>
                    </dl> <a href="{{url('type/detail/'.$product->id)}}" class="btn btn-primary" title="Chi tiết">Chi tiết »</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop
