@extends('layouts.admin')
@section('content')
    <div class="container" >
        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm Loại</button>
        </div>
        <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID Sản phẩm</th>
                <th scope="col">Màu</th>
                <th scope="col">Size</th>
                <th scope="col">số lượng</th>
                <th scope="col">Ảnh</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detail as $sp)
                <tr>
                    <th scope="row">{{$sp->id_product}}</th>
                    <td>{{$sp->color}}</td>
                    <td>{{$sp->size}}</td>
                    <td>{{$sp->quantity}}</td>
                    <td>{{$sp->image}}</td>
                    <td>
                        <button type="button" class="btn btn-warning">Sửa</button>
                        <button type="button" class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
        </div>
            <div class="container">
                <a href="{{route('product.index')}}" class="btn btn-warning">Quay lại</a>
            </div>

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
                                    <form method="post" action="{{url('admin/product/update/'.$id)}}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group" style="display: none" >
                                            <label >Id Sản Phẩm </label>
                                            <input type="text" class="form-control" name="id_product" id="id_product" value="{{$id}}" >
                                        </div>
                                        <div class="form-group">
                                            <label >Màu </label>
                                            <input type="text" class="form-control" value="{{old('color')}}" name="color" id="color" placeholder="color..">
                                        </div>
                                        <div class="form-group">
                                            <label >Size</label>
                                            <input type="text" class="form-control" value="{{old('size')}}" name="size" id="size" placeholder="size..">
                                        </div>
                                        <div class="form-group">
                                            <label >số lượng</label>
                                            <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}"  id="quantity" placeholder="số lượng..">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Chọn ảnh</label>
                                            <input type="file" name="image" value="{{old('image')}}" class="form-control-file" id="exampleFormControlFile1">
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
