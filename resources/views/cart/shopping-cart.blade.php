@extends('layouts.master')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/home"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    @if(session()->has('error'))
        <div class="container" style="background-color: #e9605c;width: 30%; text-align: center; padding: 10px;color: white"> Đặt hàng thất bại hất bại !</div>
    @elseif(session()->has('success'))
        <div class="container" style="background-color: #2d995b;width: 30%; text-align: center; padding: 10px;color: white">
            Đặt hàng Thàng công !
            <br>
            Cảm ơn bạn đã quan tâm, chúng tôi sẽ sớm liên hệ với bạn.
        </div>
    @endif
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
                                        <td class="cart-pic first-row"><a href="{{url("/product/detail/".$sp['productInfo']->id)}}"><img src="images/{{$sp['productInfo']->avatar}}" alt=""></a></td>
                                        <td class="cart-title first-row">
                                            <h5><a href="{{url("/product/detail/".$sp['productInfo']->id)}}">{{$sp['productInfo']->name}}</a></h5>
                                        </td>
                                        <td class="p-price first-row">{{number_format($sp['productInfo']->price - $sp['productInfo']->price * $sp['productInfo']->sale / 100)}}đ</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" id="quantity-item-{{$sp['productInfo']->id}}"  value="{{$sp['quantity']}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">{{number_format($sp['price'])}}đ</td>
                                        <td class="close-td first-row" data-id="{{$sp['productInfo']->id}}" onclick="SaveList({{$sp['productInfo']->id}})" id="save-cart-item{{$sp['productInfo']->id}}"><i class="ti-save"></i></td>
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
                                                            <div id="paypal-button"></div>
                                                            <button type="button"   data-bs-toggle="modal" data-bs-target="#exampleModal" class="proceed-btn" style="width: 100%">PROCEED TO CHECK OUT</button>
                                                        </div>
                                                    </div>
                                                </div>
                    @endif
                </div>
            </div>
    </section>
    <!-- Shopping Cart Section End -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin nhận hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div   id="form-size"  >
                            <form method="post" action="{{route('order')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group"  >
                                    <label >Tên người mua hàng </label>
                                    <input type="text" class="form-control" name="name" id="id_product"  >
                                </div>
                                <div class="form-group"  >
                                    <label >Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" id="id_product"  >
                                </div>
                                <div class="form-group"  >
                                    <label >Địa chỉ </label>
                                    <input type="text" class="form-control" name="address" id="id_product"  >
                                </div>
                                <div class="form-group"  >
                                    <label >Ghi chú </label>
                                    <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
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

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js" >
        function DeleteList(id) {
            $.ajax({
                url : 'delete-list-cart/'+ id,
                type : 'GET',
            }).done(function (response) {
                RenderListCart(response);
                alertify.success('Xóa thành công !');
            });
        }
        function SaveList(id) {
            $.ajax({
                url : 'save-list-cart/'+ id+'/'+$('#quantity-item-'+id).val() ,
                type : 'GET',
            }).done(function (response) {
                RenderListCart(response);
                alertify.success('Cập nhật thành công !');
            });
        }
        function RenderListCart(responseList) {
            $("#list-cart").empty();
            $("#list-cart").html(responseList);

        }


        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'demo_sandbox_client_id',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: '0.01',
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');
                });
            }
        }, '#paypal-button');

    </script>

    <script language="javascript">

{{--        string = "Welcome, freetuts.net ,fffh,yyy";--}}

{{--        for (var i = 0; i < string.split(",").length; i++){--}}
{{--            $ss =  string.split(',')[i] ;--}}
{{--        }--}}
{{--    </script>--}}

@stop
