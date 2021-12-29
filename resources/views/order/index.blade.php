@extends('layouts.admin')

@section('content')
    <!-- Button trigger modal -->
{{--    <div class="container">--}}
{{--        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tạo Mới</button>--}}
{{--    </div>--}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
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
                <td>{{$sp->id}}</td>
                <td>{{$sp->name}}</td>
                <td>{{$sp->phone}}</td>
                <td>{{$sp->address}}</td>
                <td>{{$sp->note}}</td>
                <td>{{number_format($sp->total)}}đ</td>
                <td id="button" class="disabled">
                @if($sp->status == 1)
                <a class="btn btn-primary" href="{{url('admin/order/status/'.$sp->id)}}">Đang duyệt</a>
                @elseif($sp->status == 2)
                <a class="btn btn-warning" href="{{url('admin/order/status/'.$sp->id)}}">Đang giao</a>
                @elseif($sp->status == 3)
                <a class="btn btn-success disabled" href="{{url('admin/order/status/'.$sp->id)}}">Hoàn thành</a>
                @endif
                </td>
                <td>
                    <a href="{{url('admin/order/detail/'.$sp->id)}}" class="btn btn-light">Chi Tiết</a>
                    <a href="{{url('admin/order/delete/'.$sp->id)}}" class="btn btn-danger">Xóa</a>
                </td>
        @endforeach


        </tbody>
    </table>
@stop
