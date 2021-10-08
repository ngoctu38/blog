<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>
    <!--css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url("Template/css/bootstrap.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/font-awesome.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/themify-icons.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/elegant-icons.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/owl.carousel.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/nice-select.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/jquery-ui.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/slicknav.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("Template/css/style.css")}}" type="text/css">
    <link rel="stylesheet" href="{{url("css/layout.css")}}" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="col-12 text-center tx">
        Hotline Mua Hàng: 0969647473 | Hotline CSKH: 1900 100có - Ext 1 | Email CSKH: web@tunguyen.vn
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-3 col-md-3"  >
                    <div class="logo">
                        <a href="{{route('home')}}"><img style=" margin-left: 10px; width: 30%; " src="https://360boutique.vn/wp-content/uploads/2020/12/logo-co-moi-360-den-e1607590785505.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="advanced-search">
                        <form method="post" action="{{route('home')}}" class="input-group">
                            @csrf
                            <input type="text" name="name" placeholder="Tìm kiếm sản phẩm theo tên...">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon"><a href="#"><i class="icon_profile"></i> </a>
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </li>
                        <li class="cart-icon navbar-brand"><a href="{{route("shopping-cart")}}">
                                <i class="icon_bag_alt "></i>
                                @if(session('cart') != null)
                                <span id="total-quantity-show">{{session('cart')->totalQuantity}}</span>
                                @else
                                <span id="total-quantity-show">0</span>
                                @endif
                            </a>
                            <div class="cart-hover">
                                <div id="change-item-cart">
                                    @if(session('cart') != null)
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                @foreach(session('cart')->products as $sp)
                                                    <tr>
                                                        <td class="si-pic"><img src="images/{{$sp['productInfo']->avatar}}" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{number_format($sp['productInfo']->price - $sp['productInfo']->price * $sp['productInfo']->sale / 100)}}đ x {{$sp['quantity']}}</p>
                                                                <h6>{{$sp['productInfo']->name}}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <a  onclick="DeleteCart({{$sp['productInfo']->id}})" href="javascript:"><i class="ti-close"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>{{number_format(session('cart')->totalPrice)}}</h5>
                                        </div>
                                    @endif

                                </div>
                                <div class="select-button">
                                    <a href="{{route("shopping-cart")}}" class="primary-btn view-card">VIEW CART</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center" id="item-menu"  >
        <div class="btn btn-default menu "   >
            <div class="dropdown">
                <div class="menu-item "><a href="">Giới thiệu</a></div>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="dropdown">
                <div class="menu-item "><a href="">Bộ sưu tập</a></div>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
                            <div class="dropdown " >
                                <div class="menu-item "><a href="">sản phẩm</a></div>
                                <div class="dropdown-content sp" >
                                    <div class="dropdown">
                                        <div class="menu-item "><a href=""><b>Áo Nam</b></a><br><hr class="hr_type"></div>
                                        <div class="">
                                            @foreach($type_product as $type)
                                                @if($type->id_type_detail == 1)
                                                    <a class="product_type" href="{{url('product-type/'.$type->id)}}">{{$type->name}}</a>
                                                @endif
                                            @endforeach

                                        </div></div>
                                    <div class="dropdown">
                                        <div class="menu-item "><a href=""><b>Quần Nam</b></a></div>
                                        <div class="product_type">
                                            @foreach($type_product as $type)
                                                @if($type->id_type_detail == 2)
                                                    <a href="{{url('product-type/'.$type->id)}}">{{$type->name}}</a>
                                                @endif
                                            @endforeach
                                        </div></div>
                                    <div class="dropdown">
                                        <div class="menu-item "><a href=""><b>Phụ Kiện Nam</b></a></div>
                                        <div class="product_type">
                                            @foreach($type_product as $type)
                                                @if($type->id_type_detail == 3)
                                                    <a href="{{url('product-type/'.$type->id)}}">{{$type->name}}</a>
                                                @endif
                                            @endforeach
                                        </div></div>
                                    <div class="dropdown">
                                        <div class="menu-item "><a href=""><b>Dày Dép Nam</b></a></div>
                                        <div class="product_type" >
                                            @foreach($type_product as $type)
                                                @if($type->id_type_detail == 4)
                                                    <a href="{{url('product-type/'.$type->id)}}">{{$type->name}}</a>
                                                @endif
                                            @endforeach
                                        </div></div>
                                </div>
                            </div>
            <div class="dropdown">
                <div class="menu-item "><a href="">khuyến mãi</a></div>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="dropdown">
                <div class="menu-item "><a href="">tin tức</a></div>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="dropdown">
                <div class="menu-item "><a href="">tuyển dụng</a></div>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="dropdown">
                <div class="menu-item "><a href="">hệ thống cửa hàng</a></div>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="dropdown">
                <div class="menu-item "><a href="">Giới thiệu</a></div>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
<div>
    @yield('content')
</div>
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <ul>
                        <li>Address: Nam Từ Liêm - Hà Nội</li>
                        <li>Phone: 0969647473</li>
                        <li style="position: absolute;">Email: ngoctu12.10.2000@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/tu.nuyen.96/"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Serivius</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>My Account</h5>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Mail">
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/tu.nuyen.96/" target="_blank">Nguyễn Ngọc Tú</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="payment-pic">
                        <img src="../../public/Template/img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{url("Template/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{url("Template/js/jquery-ui.min.j")}}"></script>
<script src="{{url("Template/js/bootstrap.min.js")}}"></script>
<script src="{{url("Template/js/jquery.countdown.min.js")}}"></script>
<script src="{{url("Template/js/jquery.nice-select.min.js")}}"></script>
<script src="{{url("Template/js/jquery.zoom.min.js")}}"></script>
<script src="{{url("Template/js/jquery.dd.min.js")}}"></script>
<script src="{{url("Template/js/jquery.slicknav.js")}}"></script>
<script src="{{url("Template/js/owl.carousel.min.js")}}"></script>
<script src="{{url("Template/js/main.js")}}"></script>

<script>
    function AddCart(id) {
        $.ajax({
            url : 'add-cart/'+ id,
            type : 'GET',
        }).done(function (response) {
            RenderCart(response);
            alertify.success('Thêm sản phẩm thành công !');
        });
    }
    function DeleteCart(id) {
        $.ajax({
            url : 'delete-cart/'+ id,
            type : 'GET',
        }).done(function (response) {
            RenderCart(response);
            alertify.success('Xóa thành công !');
        });
    }
    function RenderCart(response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quantity-show").text($("#total-quantity").val())
    }
    // tạo biến xác định vị trí hiện tại của menu so với top
    pos = $("#item-menu").position();
    // cuộn menu
    $(window).scroll(function() {
        var posScroll = $(document).scrollTop();
        if (parseInt(posScroll) > parseInt(pos.top)){
            $("#item-menu").addClass('fixed');
        }  else
            $("#item-menu").removeClass('fixed');
    });

</script>

</body>

</html>
