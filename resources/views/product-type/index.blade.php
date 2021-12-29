@extends('layouts.admin')

@section('content')

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tạo Mới</button>
</div>
<table class="table">
    <thead>
    <tr>
{{--        <th scope="col">STT</th>--}}
        <th scope="col">Loại sản phẩm</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Tùy chọn</th>

    </tr>
    </thead>
    <tbody>
        @foreach($product_type as $sp)
    <tr>
{{--        <th scope="row">{{$sp->id}}</th>--}}
        <td>{{$sp->name}}</td>
        @if($sp->id_type_detail == 1)
        <td> Áo Nam </td>
        @elseif($sp->id_type_detail == 2)
            <td>Quần Nam </td>
        @elseif($sp->id_type_detail == 3)
            <td>Phụ Kiện Nam </td>
        @elseif($sp->id_type_detail == 4)
            <td>Giày Dép Nam</td>
        @endif
        <td>
            <a href="{{url('admin/product-type/delete/'.$sp->id)}}" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
        @endforeach


    </tbody>
</table>
<div class="d-flex justify-content-center" style="padding-bottom: 10px">{{ $product_type->links() }}</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm chi tiết sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div   id="form-size"  >
                        <form method="post" action="{{route('product-type.create')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <select name="id_type_detail" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Chọn loại sản phẩm--</option>
                                        <option value="1">Áo Nam</option>
                                        <option value="2">Quần Nam</option>
                                        <option value="3">Phụ Kiện Nam</option>
                                        <option value="4">Giày Dép Nam</option>
                                </select>
                            </div>
                            <div class="form-group"  >
                                <label >Tên loại </label>
                                <input type="text" class="form-control" name="name" id="id_product"  >
                            </div>
                            <div class="form-group ">
                                <button  type="submit" name="submit"  class="btn btn-success" >Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
