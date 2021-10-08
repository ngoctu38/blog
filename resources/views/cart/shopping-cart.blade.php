@extends('layouts.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    @if(session('cart') != null)
                    <div class="cart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Save</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(session('cart')->products as $sp)
                                    <tr>
                                        <td class="cart-pic first-row"><img src="images/{{$sp['productInfo']->avatar}}" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5>{{$sp['productInfo']->name}}</h5>
                                        </td>
                                        <td style="display: flex ; padding: 47px 0">
                                            <select name="id_type_details" class="form-control" id="exampleFormControlSelect1">
                                                <option>-size-</option>
                                            </select>
                                            <select name="id_type_details" class="form-control" id="exampleFormControlSelect1">
                                                <option>-color-</option>
                                            </select>
                                        </td>
                                        <td class="p-price first-row">{{number_format($sp['productInfo']->price - $sp['productInfo']->price * $sp['productInfo']->sale / 100)}}đ</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" id="quantity-iteam-{{$sp['productInfo']->id}}"  value="{{$sp['quantity']}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">{{number_format($sp['price'])}}</td>
                                        <td class="close-td first-row" onclick="SaveListCart({{$sp['productInfo']->id}})" ><i class="ti-save"></i></td>
                                        <td class="close-td first-row"  onclick="DeleteList({{$sp['productInfo']->id}})"><i class="ti-close"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                                                    <div class="col-lg-4 offset-lg-8">
                                                        <div class="proceed-checkout">
                                                            <ul>
                                                                <li class="cart-total">Total <span>{{number_format(session('cart')->totalPrice)}}đ</span></li>
                                                            </ul>
                                                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                                        </div>
                                                    </div>
                                                </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    <script>
        function DeleteList(id) {
            $.ajax({
                url : 'delete-list-cart/'+ id,
                type : 'GET',
            }).done(function (response) {
                RenderListCart(response);
                alertify.success('Xóa thành công !');
            });
        }
        function RenderListCart(responseList) {
            $("#list-cart").empty();
            $("#list-cart").html(responseList);
        }

    </script>

@stop
