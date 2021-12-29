@extends('layouts.admin')

@section('content')
    <style>
        .form-group{
            padding: 10px;
        }
        @if(session()->has('success'))
            .form_product{
            display: none;
            background-color: #e9605c;
        }
        @endif
    </style>
<div class="container form_product" >
<form  method="post" action="{{route('product.create')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <select name="id_type_details" class="form-control" id="exampleFormControlSelect1">
            <option>--Chọn loại sản phẩm--</option>
            @foreach($type as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
        @error('id_type_details')
        <label for="exampleFormControlInput1 " class="check-validation " >{{$message}}</label>
        @enderror
        </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Tên sản phẩm</label>
        <input type="text"  name="name"  value="{{old('name')}}" class="form-control" id="exampleFormControlInput1" placeholder="Tên sản phẩm....">
        @error('name')
        <label for="exampleFormControlInput1 " class="check-validation ">{{$message}}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Giá sản phẩm </label>
        <input type="text"  name="price"  value="{{old('price')}}" class="form-control" id="exampleFormControlInput1" placeholder="Giá sản phẩm....">
        @error('price')
        <label for="exampleFormControlInput1 " class="check-validation ">{{$message}}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Giảm giá </label>
        <input type="text"  name="sale"  value="{{old('sale')}}" class="form-control" id="exampleFormControlInput1" placeholder="Điền số % giảm giá....">
        @error('sale')
        <label for="exampleFormControlInput1 " class="check-validation ">{{$message}}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Miêu tả</label>
        <textarea class="form-control" name="note"  value="{{old('note')}}" id="comments" style="font-family:sans-serif; "></textarea>
        @error('note')
        <label for="exampleFormControlInput1 " class="check-validation ">{{$message}}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Chọn ảnh</label>
        <input type="file" name="avatar"  value="{{old('avatar')}}" class="form-control-file" id="exampleFormControlFile1">
        @error('avatar')
        <label for="exampleFormControlInput1 " class="check-validation ">{{$message}}</label>
        @enderror
    </div>
    <div class="form-group">
    <button style="margin-right: 10px" type="submit" name="submit"  class="btn btn-success"   >Lưu</button>
    <a type="button" style="width: 85px"  href="{{route('product.index')}}" class=" align-self-end btn btn-warning  ">Hủy tạo</a>
    </div>
</form>
</div>
    <script type="text/javascript">

        $('#button_insert').on('click',function () {
        var  id_product = $('#id_product').val();
        var color = $('#color').val();
        var size = $('#size').val();
        var quantity = $('#quantity').val();
        var image = $('#image').val();

        if (color == '' || size == '' || quantity == '' ){
        alert('Thông tin chưa đủ');
        }else {
        $.ajax({
        url:"action.php",
        method: "post",
        data:{id_product:id_product,color:color,size:size,quantity:quantity,image:image},
        success:function (data) {
        alert('insert thành công');
        fetch_data();
        }
        });
        }
        });x
    </script>

@stop
