@extends('layouts.admin')

@section('form-size')
    <form method="post" id="insert">
        @csrf
        <div class="form-group">
            <label >Màu </label>
            <input type="text" class="form-control" id="color" placeholder="color..">
            <label >Size</label>
            <input type="text" class="form-control" id="size" placeholder="size..">
            <label >số lượng</label>
            <input type="text" class="form-control" id="quantity" placeholder="số lượng..">
            <label >Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="image" placeholder="số lượng..">
        </div>
        <button type="submit" name="insert_data" id="button_insert" class="btn btn-primary">Submit</button>
    </form>
@stop
