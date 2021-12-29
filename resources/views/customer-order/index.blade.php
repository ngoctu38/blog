@extends('layouts.master')

@section('content')
    <!-- Button trigger modal -->
{{--    <div class="container">--}}
{{--        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tạo Mới</button>--}}
{{--    </div>--}}
    <div class="container">
        <div class="breadcrumb-text row">
            <div class="col-10">
                <a href="/home"><i class="fa fa-home"></i> Home</a>
                <span>Đơn Hàng</span>
            </div>
        </div>
     <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Khách hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Tùy chọn</th>

        </tr>
        </thead>
        <tbody>
        @foreach($order as $sp)
            <tr>
                <td>{{$sp->name}}</td>
                <td>{{$sp->phone}}</td>
                <td>{{$sp->address}}</td>
                <td>{{$sp->note}}</td>
                <td>{{number_format($sp->total)}}đ</td>
                <td id="button" class="disabled">
                @if($sp->status == 1)
                <button class="btn btn-primary disabled" >Đang duyệt</button>
                @elseif($sp->status == 2)
                <button class="btn btn-warning disabled">Đang giao</button>
                @elseif($sp->status == 3)
                <button class="btn btn-success disabled" >Hoàn thành</button>
                @endif
                </td>
                <td>
                    <a href="{{url('order/detail/'.$sp->id)}}" class="btn btn-light">Chi Tiết</a>
                </td>
        @endforeach


        </tbody>
    </table>
        <button class="row justify-content-between" >Hoàn thành</button>
    </div>

@stop
