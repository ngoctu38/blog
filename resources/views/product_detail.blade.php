@extends('layouts/master')
@section('content')
    @foreach($product_detail as $product)
    <h1>welcome to product detail id : {{$product->id}} name : {{$product->name}}</h1>
    @endforeach
@stop
