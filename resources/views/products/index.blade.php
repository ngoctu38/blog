@extends('layouts.admin')

@section('content')
<h3>welcome to Products</h3>
<a type="button" href="{{route('product.create')}}" class="btn btn-success">Tạo mới</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá sản phẩm</th>
        <th scope="col">Tùy chọn</th>

    </tr>
    </thead>
    <tbody>
        @foreach($product as $sp)
    <tr>
        <th scope="row">{{$sp->id}}</th>
        <td>{{$sp->name}}</td>
        <td>{{$sp->price}}đ</td>
        <td>
            <a href="{{url('admin/product/update/'.$sp->id)}}" class="btn btn-primary">Chi tiết</a>
            <a type="button" class="btn btn-warning">Sửa</a>
            <a type="button" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
        @endforeach


    </tbody>
</table>
@stop
